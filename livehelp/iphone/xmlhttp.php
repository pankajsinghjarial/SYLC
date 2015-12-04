<?php
//===========================================================================
//* --    ~~                Crafty Syntax Live Help                ~~    -- *
//===========================================================================
//           URL:   http://www.craftysyntax.com/    EMAIL: livehelp@craftysyntax.com
//         Copyright (C) 2003-2012 Eric Gerdes   (http://www.craftysyntax.com )
// ----------------------------------------------------------------------------
// Please check http://www.craftysyntax.com/ or REGISTER your program for updates
// --------------------------------------------------------------------------
// NOTICE: Do NOT remove the copyright and/or license information any files. 
//         doing so will automatically terminate your rights to use program.
//         If you change the program you MUST clause your changes and note
//         that the original program is Crafty Syntax Live help or you will 
//         also be terminating your rights to use program and any segment 
//         of it.        
// --------------------------------------------------------------------------
// LICENSE:
//     This program is free software; you can redistribute it and/or
//     modify it under the terms of the GNU General Public License
//     as published by the Free Software Foundation; 
//     This program is distributed in the hope that it will be useful,
//     but WITHOUT ANY WARRANTY; without even the implied warranty of
//     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//     GNU General Public License for more details.
//
//     You should have received a copy of the GNU General Public License
//     along with this program in a file named LICENSE.txt .
//===========================================================================
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
require_once("..\security.php");
else
require_once("../security.php");

if(empty($UNTRUSTED['whattodo'])){ $UNTRUSTED['whattodo']=""; }
if(empty($UNTRUSTED['header'])){ $UNTRUSTED['header']=""; }
if(empty($UNTRUSTED['json'])){ $UNTRUSTED['json']=""; }
  
if($UNTRUSTED['whattodo'] == "checkurl"){	 print "SUCCESS"; exit;  }
	
	
// if this is an operator op is set.   
if(!(empty($UNTRUSTED['op']))){

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
 require_once("..\admin_common.php");
else
  require_once("../admin_common.php");

  validate_session($identity);
} else {
	
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
  require_once("..\visitor_common.php");
else	
  require_once("../visitor_common.php");
  
}

if($UNTRUSTED['header'] == "json"){
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
} else {
 $whatheader = "Content-type: text/html; charset=". $lang['charset'];
 header($whatheader);
}

  $sqlquery = "SELECT user_id,onchannel,isnamed,username,jsrn,cellphone,lastcalled FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
  $people = $mydatabase->query($sqlquery);
  $people = $people->fetchRow(DB_FETCHMODE_ORDERED);
  $myid = $people[0];
  $channel = $people[1];
  $isnamed = $people[2];
  $username = $people[3];
  $cellphone = $people[5];
  $lastcalled = $people[6];
  $jsrn = $people[4];
  $see = "";
  $hide = "";
  
if(empty($UNTRUSTED['whattodo']))
  $whattodo = "";
 
 // set to online:
 $timeof = date("YmdHis");
$query = "UPDATE livehelp_users set isonline='Y',lastaction='$timeof',status='chat' WHERE sessionid='".$identity['SESSIONID']."'";
$mydatabase->query($query);


if($UNTRUSTED['whattodo'] == "peoplestring"){	 
	
	$peoplestring = "users";
  if($CSLH_Config['admin_refresh']==10){$defaultshowvisitors=0; }
  if($CSLH_Config['admin_refresh']==15){$defaultshowvisitors=0; }
  if($CSLH_Config['admin_refresh']==20){$defaultshowvisitors=0; }
  if($CSLH_Config['admin_refresh']==25){$defaultshowvisitors=0; }
  if($CSLH_Config['admin_refresh']==30){$defaultshowvisitors=0; }
  if($CSLH_Config['admin_refresh']==35){$defaultshowvisitors=0; }

  if($defaultshowvisitors==1)
    $sqlquery = "SELECT * FROM livehelp_users ORDER by user_id DESC";
  else
    $sqlquery = "SELECT * FROM livehelp_users WHERE status='chat' ORDER by user_id DESC"; 
 
  $visitors = $mydatabase->query($sqlquery);
  while( $visitor = $visitors->fetchRow(DB_FETCHMODE_ASSOC)){
    $visitor_string = $visitor['sessionid'] . $visitor['status'];
    $pattern = '/[^A-Za-z0-9]/';  
    $replacement = '';
    $user = "_" .  preg_replace($pattern, $replacement, $visitor_string);
    $peoplestring .= str_replace(" ","",$user);
  }    
  $sqlquery = "SELECT * FROM livehelp_operator_channels ORDER by user_id DESC";        
  $visitors = $mydatabase->query($sqlquery);
  while( $visitor = $visitors->fetchRow(DB_FETCHMODE_ASSOC)){
    $visitor_string = $visitor['user_id'];
    $peoplestring .= str_replace(" ","",$visitor_string);
  }
  print $peoplestring;
  exit;
} 

if($UNTRUSTED['whattodo'] == "visitorsdetail"){	  
///--------------------------------------------------------------------------------------------------
 // get the count of active visitors in the system right now.
 $timeof = rightnowtime();
 $prev = mktime ( date("H"), date("i")-4, date("s"), date("m"), date("d"), date("Y") );
 $oldtime = date("YmdHis",$prev);
 $sqlquery = "SELECT * FROM livehelp_users WHERE lastaction>'$oldtime' AND status!='chat' AND isoperator!='Y' ";
 $DIVS = "";
 $html = "";
  // make list of ignored visitors:
 $ipadd = explode(",",$CSLH_Config['ignoreips']); 
 for($i=0;$i<count($ipadd); $i++){
 	if(!(empty($ipadd[$i])))
 	 $sqlquery .= " AND ipaddress NOT LIKE '".$ipadd[$i]."%' ";
 } 
 $sqlquery .= " ORDER by lastaction DESC";

 $visitors = $mydatabase->query($sqlquery);
 $onlinenow = $visitors->numrows();
 $hiddennow = 0; 
 $html .= "<table width=275><tr bgcolor=$color_background><td align=right><b> <font color=007700>[onlinenow] ".$lang['online']."</font> <font color=777777>[hiddennow] ".$lang['Hidden']."</font> </td></tr></table>";   
 $html .= "<table width=275>";

while($visitor = $visitors->fetchRow(DB_FETCHMODE_ASSOC)){
   $chatting = "";
    // see if we are in the same department as this user..
   $sqlquery = "SELECT * FROM livehelp_operator_departments WHERE user_id='$myid' AND department='".$visitor['department']."' ";
   $data_check = $mydatabase->query($sqlquery); 
   if( ($visitor['department']!=0) && ($data_check->numrows() == 0) ){ 
       $hiddennow++;
       $onlinenow--;
   } else {
  if(empty($visitor['user_alert'])) $visitor['user_alert'] = 0; 

  $sqlquery = "SELECT * from livehelp_visit_track WHERE sessionid='" . $visitor['sessionid'] . "'";
  $my_count = $mydatabase->query($sqlquery);
  $my_count = $my_count->numrows();
 
  $html .= "<tr><td width=10> </td><td>";    
  $html .= "<table width=265><tr><td width=160><b>" . $visitor['username'] . "</b></td>";
  
  
    $html .= "<td width=105>";


 
  switch($visitor['status']){
    case("DHTML"):
       $html .= " L:<img src=../images/invited.gif> ";
       break;
    case("request"):
       $html .= " P:<img src=../images/invited.gif> ";
       break;
    case("invited"):
       $html .= " <img src=../images/invited2.gif>  ";
       break;
     case("qna"):
       $html .= " <img src=../images/qna.gif>";
       break; 
    case("stopped"):
       $html .= "<img src=../images/stopped.gif> {<a href=layer.php?selectedwho=" . $visitor['user_id'] . " target=_blank>RE-".$lang['invite']."</a>}";

       break;    
    case("message"):
       $html .= "<img src=../images/message.gif> ";
       break;            
    default:
      $html .= "<a href=layer.php?selectedwho=" . $visitor['user_id'] . " ><img src=images/invite.jpg width=85 height=25 border=0></a> ";
      break;
    }
 
  $html .= "</td></tr></table><br>";
 
  $sqlquery = "SELECT * from livehelp_users WHERE user_id='" . $visitor['user_id'] . "'";
  $user_info = $mydatabase->query($sqlquery);
  $user_info = $user_info->fetchRow(DB_FETCHMODE_ASSOC); 

  $sqlquery = "SELECT * from livehelp_visit_track WHERE sessionid='" . $visitor['sessionid'] . "' Order by whendone DESC";
  $page_trail = $mydatabase->query($sqlquery);
  $page = $page_trail->fetchRow(DB_FETCHMODE_ASSOC);

  $sqlquery = "SELECT * from livehelp_departments WHERE recno='" . $visitor['department'] . "'";
  $tmp = $mydatabase->query($sqlquery);
  $nameof = $tmp->fetchRow(DB_FETCHMODE_ASSOC);
  $nameof = $nameof['nameof'];
  
  $query = "SELECT whendone from livehelp_visit_track WHERE sessionid='".filter_sql($visitor['sessionid'])."' Order by whendone LIMIT 1";
  $page_tmprow = $mydatabase->query($query); 
  $tmprow = $page_tmprow->fetchRow(DB_FETCHMODE_ASSOC);
  $later = $tmprow['whendone'];
  
    $html .= "<font color=#999999 size=-1><b>Referer:</b><br>" . $user_info['camefrom'] . "<br>";
if(empty($page['location'])) 
  $page['location'] ="";
 $html .= "<b>".$lang['timeonline'].":</b>". secondstoHHmmss(timediff($later,date("YmdHis"))) . "<br> 
<b>".$lang['txt43'].":</b><br>$nameof<br>
<b>url:</b><br>" . $page['location'] . "</font><br><table><tr><td width=130><b>Pages Viewed:</b><br> $my_count </td><td width=130>";
  $now = date("YmdHis");
$thediff = $now - $user_info['lastaction'];
$html .= "<b>Last-action:</b><br>$thediff ".$lang['Seconds']."</td></tr></table></td></tr><tr><td colspan=2><hr></td></tr>";
  }  
 }
 $html = str_replace("[onlinenow]",$onlinenow,$html);
 $html = str_replace("[hiddennow]",$hiddennow,$html); 
  
print $html;
 
 exit;
}
 
if($UNTRUSTED['whattodo'] == "visitors"){	  
///--------------------------------------------------------------------------------------------------
 // get the count of active visitors in the system right now.
 $timeof = rightnowtime();
 $prev = mktime ( date("H"), date("i")-4, date("s"), date("m"), date("d"), date("Y") );
 $oldtime = date("YmdHis",$prev);
 $sqlquery = "SELECT * FROM livehelp_users WHERE lastaction>'$oldtime' AND status!='chat' AND isoperator!='Y' ";
 $DIVS = "";
 $html = "";
  // make list of ignored visitors:
 $ipadd = explode(",",$CSLH_Config['ignoreips']); 
 for($i=0;$i<count($ipadd); $i++){
 	if(!(empty($ipadd[$i])))
 	 $sqlquery .= " AND ipaddress NOT LIKE '".$ipadd[$i]."%' ";
 } 
 $sqlquery .= " ORDER by lastaction DESC";

 $visitors = $mydatabase->query($sqlquery);
 $onlinenow = $visitors->numrows();
 $hiddennow = 0; 
 $html .= "<table width=100%><tr bgcolor=$color_background><td align=right><b> <font color=007700>[onlinenow] ".$lang['online']."</font> <font color=777777>[hiddennow] ".$lang['Hidden']."</font> </td></tr></table>";   
 $html .= "<table width=100%><tr bgcolor=$color_background><td>&nbsp;</td><td><b>ID</b></td><td><b>".$lang['status'].":</b></td><td><b>#</b></td></tr>";

while($visitor = $visitors->fetchRow(DB_FETCHMODE_ASSOC)){
   $chatting = "";
    // see if we are in the same department as this user..
   $sqlquery = "SELECT * FROM livehelp_operator_departments WHERE user_id='$myid' AND department='".$visitor['department']."' ";
   $data_check = $mydatabase->query($sqlquery); 
   if( ($visitor['department']!=0) && ($data_check->numrows() == 0) ){ 
       $hiddennow++;
       $onlinenow--;
   } else {
  if(empty($visitor['user_alert'])) $visitor['user_alert'] = 0; 

  $sqlquery = "SELECT * from livehelp_visit_track WHERE sessionid='" . $visitor['sessionid'] . "'";
  $my_count = $mydatabase->query($sqlquery);
  $my_count = $my_count->numrows();
 
  $html .= "<tr><td width=10> </td><td>";    
  $html .= "<a href=javascript:seepages(" . $visitor['user_id'] . ") onMouseOver=\" try { show(event, 'info-" . $visitor['username'] . "'); } catch(dam){} return true;\" onMouseOut=\"try { hide('info-" . $visitor['username'] . "'); } catch(dam){} return true;\">" . $visitor['username'] . "</a>";
 
  $sqlquery = "SELECT * from livehelp_users WHERE user_id='" . $visitor['user_id'] . "'";
  $user_info = $mydatabase->query($sqlquery);
  $user_info = $user_info->fetchRow(DB_FETCHMODE_ASSOC); 

  $sqlquery = "SELECT * from livehelp_visit_track WHERE sessionid='" . $visitor['sessionid'] . "' Order by whendone DESC";
  $page_trail = $mydatabase->query($sqlquery);
  $page = $page_trail->fetchRow(DB_FETCHMODE_ASSOC);

  $sqlquery = "SELECT * from livehelp_departments WHERE recno='" . $visitor['department'] . "'";
  $tmp = $mydatabase->query($sqlquery);
  $nameof = $tmp->fetchRow(DB_FETCHMODE_ASSOC);
  $nameof = $nameof['nameof'];
  
  $query = "SELECT whendone from livehelp_visit_track WHERE sessionid='".filter_sql($visitor['sessionid'])."' Order by whendone LIMIT 1";
  $page_tmprow = $mydatabase->query($query); 
  $tmprow = $page_tmprow->fetchRow(DB_FETCHMODE_ASSOC);
  $later = $tmprow['whendone'];
  
  $DIVS .= "<DIV ID=\"info-" . $visitor['username'] . "\" STYLE=\"position: absolute; z-index: 20; visibility: hidden; top: 0px; left: 0px;\">
<TABLE BORDER=\"0\" WIDTH=\"300\"><TR BGCOLOR=\"#000000\"><TD> 
<TABLE BORDER=\"0\" WIDTH=\"100%\" CELLPADDING=0 CELLSPACING=0 BORDER=0><TR><TD width=1 BGCOLOR=#".$color_alt2."><img src=images/blank.gif width=7 height=120></TD><TD BGCOLOR=\"#".$color_alt2."\" valign=top>
<FONT COLOR=\"#000000\">
<b>Referer:</b><br>" . $user_info['camefrom'] . "<br>";
if(empty($page['location'])) 
  $page['location'] ="";
 $DIVS .= "<b>".$lang['timeonline'].":</b>". secondstoHHmmss(timediff($later,date("YmdHis"))) . "<br> 
<b>".$lang['txt43'].":</b><br>$nameof<br>
<b>url:</b><br>" . $page['location'] . "<br>";
$now = date("YmdHis");
$thediff = $now - $user_info['lastaction'];
 $DIVS .= "<b>".$lang['lastact'].":</b><br>$thediff ".$lang['Seconds']."<br>
 </FONT></TD></TR></TABLE></TD></TR></TABLE></DIV>";  
 $html .= "</td>";
  switch($visitor['status']){
    case("DHTML"):
       $html .= "<td>L:<img src=images/invited.gif> ";
       break;
    case("request"):
       $html .= "<td>P:<img src=images/invited.gif> ";
       break;
    case("invited"):
       $html .= "<td><img src=images/invited2.gif>  ";
       break;
     case("qna"):
       $html .= "<td><img src=images/qna.gif>";
       break; 
    case("stopped"):
       $html .= "<td><img src=images/stopped.gif> {<a href=layer.php?selectedwho=" . $visitor['user_id'] . " target=_blank>RE-".$lang['invite']."</a>}";

       break;    
    case("message"):
       $html .= "<td><img src=images/message.gif> ";
       break;            
    default:
      $html .= "<td><a href=layer.php?selectedwho=" . $visitor['user_id'] . " target=_blank>".$lang['invite']."</a> ";
      break;
    }
  $html .= "</td>";
  $html .= "<td>$my_count</td></tr>";
  }  
 }
 $html = str_replace("[onlinenow]",$onlinenow,$html);
 $html = str_replace("[hiddennow]",$hiddennow,$html); 
 
 $html .= "</table>";
 $html .= "<DIV ID=\"visitorsdiv\" STYLE=\"z-index: 2;\">";
 $html .= "</DIV>"; 
print $html;
print $DIVS;
 exit;
}
 
  
if($UNTRUSTED['whattodo'] == "ping"){	  
 echo 'OK';
 exit;
}

if(!(empty($UNTRUSTED['see'])))
  $see = $UNTRUSTED['see'];
  
if(!(empty($UNTRUSTED['externalchats'])))
  $hide = $UNTRUSTED['externalchats'];  
  
if($isavisitor)
  $see = $channel;


if($UNTRUSTED['whattodo'] == "wantstochat"){

	 //update last action:
   $mytimeof = date("YmdHis");
   $sqlquery = "UPDATE livehelp_users set lastaction='$mytimeof' WHERE sessionid='".$identity['SESSIONID']."'";	
   $mydatabase->query($sqlquery);
  
   // if they have timed out:
   if($UNTRUSTED['waitTimeout'] < $mytimeof){
     print "TIMEOUT";
     exit;	
  }

   // see if someone is talking to this user on this channel if so send to 
   // chat:
   $sqlquery = "SELECT channel FROM livehelp_operator_channels WHERE channel=" . intval($channel);
   $counting = $mydatabase->query($sqlquery);
   if( $counting->numrows() != 0)
     print "CONNECTED";
   else
     print "LIGHTS-ARE-ON-BUT-NOBODY-IS-HOME";  
  
  exit;
  
}

if($UNTRUSTED['whattodo'] == "needreload"){	 
	$thisoperator = new CSLH_operator();
  $chatarray = $thisoperator->arrayofchats();

  $chatstring = "";
  for($i=0; $i<count($chatarray); $i++){   $chatstring .= $chatarray[$i][1] ."-".$chatarray[$i][2]; }  
  if ($chatstring == $UNTRUSTED['chatstring']){ print 0; } else { print 1; }
}

if($UNTRUSTED['whattodo'] == "messages"){	 
	
	// if noone is talking to this user then send exit layer:
	if (empty($UNTRUSTED['op'])){
   $sqlquery = "SELECT user_id FROM livehelp_users WHERE user_id=".intval($myid)." AND status='chat'";
   $alive = $mydatabase->query($sqlquery);
   if($alive->numrows() == 0){ 
   	   $aftertime = date("YmdHis");
       $string = "messages[0] = new Array(); messages[0][0]=$aftertime; messages[0][1]=$jsrn; messages[0][2]=\"EXIT\"; messages[0][3]=\"\"; messages[0][4]=\"\";"; 
       print $string;
       exit;
   }
	}
	
	// for Google Chrome
	$nowtime = date("YmdHis");
	$sqlquery = "UPDATE livehelp_users SET chataction='$nowtime' WHERE user_id=".intval($myid)." AND status='chat'";
  $mydatabase->query($sqlquery);
 	
	$omitself = true;
	if(!(empty($UNTRUSTED['includeself'])))
	  $omitself = false;
	print showmessagesmobile($myid,"",$UNTRUSTED['HTML'],$see,$hide,true,$omitself);
	print showmessagesmobile($myid,"writediv",$UNTRUSTED['LAYER'],$see,$hide,true,$omitself);		
}

if($UNTRUSTED['whattodo'] =="requests"){
  $onload = "";
  $DIVS = " "; 
  $lasthtml = "";
  $timeof = rightnowtime();
  $jsonarray = array();
      
  // update operators timestamp .
  $sql = "UPDATE livehelp_users set lastaction='$timeof' WHERE sessionid='".$identity['SESSIONID']."' ";
  $mydatabase->query($sql);
 
   
   $prev = mktime ( date("H"), date("i")-10, date("s"), date("m"), date("d"), date("Y") );
   $oldtime = date("YmdHis",$prev);

   $sqlquery = "SELECT * FROM livehelp_users WHERE status='chat' AND isoperator='N' ORDER by showedup";
   $chatcheck = $mydatabase->query($sqlquery);
   $numchatnow = $chatcheck->numrows();
 
   $html .= "<table width=250>";
   $chatrequests = 0;

   while($visitor = $chatcheck->fetchRow(DB_FETCHMODE_ASSOC)){
    $actionlink = "";
    $chatting ="";
    // see if we are in the same department as this user..
    $sqlquery = "SELECT * FROM livehelp_operator_departments WHERE user_id='$myid' AND department='" . $visitor['department'] . "' ";
    $data_check = $mydatabase->query($sqlquery);          
    if($data_check->numrows() == 0){ 
       // we are not in the department that this user is chatting in.. 
    } else {
       // see if anyone is chatting with this person. 
       $sqlquery = "SELECT * FROM livehelp_operator_channels WHERE channel='" . $visitor['onchannel'] . "'";
       $counting = $mydatabase->query($sqlquery);
       $showedup = substr($visitor['showedup'],8,2) . ":" . substr($visitor['showedup'],10,2);
       if($counting->numrows() == 0){
            $updated_ignore = $ignorelist . "," . $visitor['user_id'];
            $chatting = "<img src=../images/needaction.gif width=21 height=20 border=0>" . $visitor['username'];  
            $actionlink = "[<a href=live.php?hidechatters=". $hidechatters . "&ignorelist=$ignorelist&numchats=$numchatsnow&operators=$operators&action=activiate&who=" . $visitor['user_id'] . "&whatchannel=" . $visitor['onchannel'] . "&showvisitors=".$UNTRUSTED['showvisitors']."&needaction=1>".$lang['Activate']."</a>]\n";         
            $chatrequests++;
            $html .= "<tr bgcolor=#DDDDDD><td width=10> $showedup </td><td nowrap=nowrap><table><tr><td>$chatting</td><td>" . $visitor['username'] . "   $actionlink </td></tr></table></td></tr>\n";
 	          $sqlquery = "SELECT * from livehelp_users WHERE sessionid='" . $visitor['sessionid'] . "'";
            $visitorarray = array("showedup"=>$showedup,user_id=>$visitor['user_id'],username=>$visitor['username'],"onchannel"=>$visitor['onchannel']);
            array_push($jsonarray,$visitorarray);
      $user_info = $mydatabase->query($sqlquery);
      $user_info = $user_info->fetchRow(DB_FETCHMODE_ASSOC);

      $sqlquery = "SELECT * from livehelp_visit_track WHERE sessionid='".$visitor['sessionid']."' Order by whendone DESC LIMIT 1";
      $page_trail = $mydatabase->query($sqlquery);
      $page = $page_trail->fetchRow(DB_FETCHMODE_ASSOC);
  
      $sqlquery = "SELECT * from livehelp_departments WHERE recno='".$visitor['department']."'";
      $tmp = $mydatabase->query($sqlquery);
      $nameof = $tmp->fetchRow(DB_FETCHMODE_ASSOC);
       $nameof = $nameof['nameof'];
  
       $DIVS .= "<DIV ID=\"info-" . $visitor['username'] . "\" STYLE=\"position: absolute; z-index: 20; visibility: hidden; top: 0px; left: 0px;\">
      <TABLE BORDER=\"0\" WIDTH=\"250\"><TR BGCOLOR=\"#000000\"><TD> 
      <TABLE BORDER=\"0\" WIDTH=\"248\" CELLPADDING=0 CELLSPACING=0 BORDER=0><TR><TD width=1 BGCOLOR=#".$color_alt2."><img src=images/blank.gif width=7 height=120></TD><TD BGCOLOR=\"#".$color_alt2."\" valign=top>
      <FONT COLOR=\"#000000\">
      <b>".$lang['referer'].":</b><br>" . $user_info['camefrom'] . "<br>
      <b>".$lang['txt43'].":</b><br>$nameof<br>
      <b>Url:</b><br><a href=" . $page['location'] . "  target=_blank>" . $page['location'] . "</a><br>";
      $now = date("YmdHis");
      if(($user_info['lastaction'] =="") || ($user_info['lastaction'] < 20002020202020) )
         $user_info['lastaction'] = $now;
      $thediff = $now - $user_info['lastaction'];
       $DIVS .= "<b>".$lang['txt65'].":</b><br>$thediff Seconds ago<br> 
       </FONT></TD></TR></TABLE></TD></TR></TABLE></DIV>"; 
      }
     }
    }
  
    if($chatrequests == 0){
     	$html .= "<tr><td>" . $lang['txt231'] . "</td></tr>";
    }
   $html .= "</table>";


if($UNTRUSTED['json']=="Y"){
    echo json_encode($jsonarray);
   // 	print_r($jsonarray);
   	exit;
   }	else {
   		print $html;
   }
   
} 
 
 
if($UNTRUSTED['whattodo'] =="arethererequests"){

  $timeof = rightnowtime();
    
  // update operators timestamp .
  $sql = "UPDATE livehelp_users set lastaction='$timeof' WHERE sessionid='".$identity['SESSIONID']."' ";
  $mydatabase->query($sql);
 
   
   $prev = mktime ( date("H"), date("i")-10, date("s"), date("m"), date("d"), date("Y") );
   $oldtime = date("YmdHis",$prev);

   $sqlquery = "SELECT * FROM livehelp_users WHERE status='chat' AND isoperator='N' ORDER by showedup";
   $chatcheck = $mydatabase->query($sqlquery);
   $numchatnow = $chatcheck->numrows();
 
   $html .= "<table width=275>";
   $chatrequests = 0;

   while($visitor = $chatcheck->fetchRow(DB_FETCHMODE_ASSOC)){
    $actionlink = "";
    $chatting ="";
    // see if we are in the same department as this user..
    $sqlquery = "SELECT * FROM livehelp_operator_departments WHERE user_id='$myid' AND department='" . $visitor['department'] . "' ";
    $data_check = $mydatabase->query($sqlquery);          
    if($data_check->numrows() == 0){ 
       // we are not in the department that this user is chatting in.. 
    } else {
       // see if anyone is chatting with this person. 
       $sqlquery = "SELECT * FROM livehelp_operator_channels WHERE channel='" . $visitor['onchannel'] . "'";
       $counting = $mydatabase->query($sqlquery);
       $showedup = substr($visitor['showedup'],8,2) . ":" . substr($visitor['showedup'],10,2);
       if($counting->numrows() == 0){
            $updated_ignore = $ignorelist . "," . $visitor['user_id'];
            $chatting = "<img src=../images/needaction.gif width=21 height=20 border=0>" . $visitor['username'];  
            $actionlink = "[<a href=live.php?hidechatters=". $hidechatters . "&ignorelist=$ignorelist&numchats=$numchatsnow&operators=$operators&action=activiate&who=" . $visitor['user_id'] . "&whatchannel=" . $visitor['onchannel'] . "&showvisitors=".$UNTRUSTED['showvisitors']."&needaction=1>".$lang['Activate']."</a>]\n";         
            $chatrequests++;
            $html .= "<tr bgcolor=#DDDDDD><td width=10> $showedup </td><td nowrap=nowrap><table><tr><td>$chatting</td><td>" . $visitor['username'] . "   $actionlink </td></tr></table></td></tr>\n";
 	  
      $sqlquery = "SELECT * from livehelp_users WHERE sessionid='" . $visitor['sessionid'] . "'";

      $user_info = $mydatabase->query($sqlquery);
      $user_info = $user_info->fetchRow(DB_FETCHMODE_ASSOC);

      $sqlquery = "SELECT * from livehelp_visit_track WHERE sessionid='".$visitor['sessionid']."' Order by whendone DESC LIMIT 1";
      $page_trail = $mydatabase->query($sqlquery);
      $page = $page_trail->fetchRow(DB_FETCHMODE_ASSOC);
  
      $sqlquery = "SELECT * from livehelp_departments WHERE recno='".$visitor['department']."'";
      $tmp = $mydatabase->query($sqlquery);
      $nameof = $tmp->fetchRow(DB_FETCHMODE_ASSOC);
       $nameof = $nameof['nameof'];
 
      }
     }
    }
  
    if($chatrequests == 0){
     	$html .= "<tr><td>" . $lang['txt231'] . "</td></tr>";
    }
   $html .= "</table>";
   print $chatrequests;

} 
 
if($UNTRUSTED['whattodo'] == "postmessage"){	 

validate_session($identity);
  
// get the info of this user.. 
$query = "SELECT user_id,onchannel,showtype,externalchats,chattype,username FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ORDERED);
$myid = $people[0];
$channel = $people[1];
$defaultshowtype = $people[2];
$externalchats= $people[3];
$external = false;
$chattype = $people[4];
$username = $people[5];
 
if($chattype!="xmlhttp"){
	 $chattype = "xmlhttp"; 
}

$previewsetting1 = "";
$previewsetting2 = "";
$previewsetting3 = "";
$previewsetting4 = "";
if(empty($UNTRUSTED['previewsetting'])){
  $UNTRUSTED['previewsetting'] = $defaultshowtype; 
  if($CSLH_Config['show_typing']!="Y")
  	 $UNTRUSTED['previewsetting'] = 4; 
}  
if(!(empty($UNTRUSTED['previewsetting']))){
	 if($UNTRUSTED['previewsetting'] == 1)  $previewsetting1 = " SELECTED ";
	 if($UNTRUSTED['previewsetting'] == 2)  $previewsetting2 = " SELECTED ";
	 if($UNTRUSTED['previewsetting'] == 3)  $previewsetting3 = " SELECTED ";
	 if($UNTRUSTED['previewsetting'] == 4)  $previewsetting4 = " SELECTED ";	 	 
}

$externalchats_array = explode(",",$externalchats);

if(!(isset($UNTRUSTED['channelsplit']))){ $UNTRUSTED['channelsplit'] = "__"; }
if(!(isset($UNTRUSTED['starttimeof']))){ $UNTRUSTED['starttimeof'] = 0; }
$mychannelcolor = $color_background;
$myusercolor = "000000";
if(!(isset($UNTRUSTED['whattodo']))){ $UNTRUSTED['whattodo'] = ""; }


$usercolor = "";
$myuser = "";

$timeof = rightnowtime();
 

$array = explode("__",$UNTRUSTED['channelsplit']);
if(empty($array[0])){ $array[0] = ""; }
if(empty($array[1])){ $array[1] = ""; }
$saidto = intval($array[1]); 
$channel = intval($array[0]);  
if($saidto == ""){ $channel = -1; }

// alternate whattodo for keystroke return 
if(isset($UNTRUSTED['alt_what'])){ $UNTRUSTED['whattodo'] = "send";}

  
   // check to see if they are active is a chat session. 
   $query = "SELECT * FROM livehelp_users WHERE user_id=". intval($saidto);
   $check_s = $mydatabase->query($query);
   $check_s = $check_s->fetchRow(DB_FETCHMODE_ASSOC);
   if($check_s['status'] != "chat"){
    $query = "UPDATE livehelp_users set status='request' WHERE user_id=".intval($saidto);
    $mydatabase->query($query);   	   	
   }

   $query = "DELETE FROM livehelp_messages WHERE typeof='writediv'";
   $mydatabase->query($query);
   
 

   // see if we have same timestamp: a performance issue but actually done on perpose to discourage 
   // people making hosted solutions with multiple chats all using the same system.
   $query = "SELECT timeof FROM livehelp_messages WHERE timeof='$timeof'";
   $rs = $mydatabase->query($query);
   while($rs->numrows() != 0){
    if(function_exists('sleep')){  sleep(1); $timeof = date("YmdHis"); } else { $timeof++; }    
    $query = "SELECT timeof FROM livehelp_messages WHERE timeof='$timeof'";
    $rs = $mydatabase->query($query);
   }

   if(!(empty($UNTRUSTED['smilies'])))      
     $UNTRUSTED['comment'] = convert_smile($UNTRUSTED['comment']);
                          
   $query = "INSERT INTO livehelp_messages (message,channel,timeof,saidfrom,saidto) VALUES ('".filter_sql($UNTRUSTED['comment'])."',".intval($channel).",'$timeof',".intval($myid).",".intval($saidto).")";
   $mydatabase->query($query);
   $quicknote ="";
  

}
?> 