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
require_once("security.php");
// if this is an operator op is set.   
if(!(empty($UNTRUSTED['op']))){
  require_once("admin_common.php");
  validate_session($identity);
} else {
  require_once("visitor_common.php");
}
$whatheader = "Content-type: text/html; charset=". $lang['charset'];
header($whatheader);

  $sqlquery = "SELECT user_id,onchannel,isnamed,username,displayname,jsrn FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
  $people = $mydatabase->query($sqlquery);
  $people = $people->fetchRow(DB_FETCHMODE_ORDERED);
  $myid = $people[0];
  $channel = $people[1];
  $isnamed = $people[2];
  $username = $people[3];
  $displayname = $people[4]; 
  $jsrn = $people[5];
  $see = "";
  $hide = "";
  
if(empty($UNTRUSTED['whattodo']))
  $whattodo = "";
 

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
 
 //-----------------------------------------------------------------------------------
 
 if($UNTRUSTED['whattodo'] == "donetyping"){ 
 
	// get the info of this user.. 
$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);  
$myid = $people['user_id'];
$channel = $people['onchannel'];
$isnamed = $people['isnamed'];
	
   $timeof = date("YmdHis") - 1; 

   $comment = filter_html(convertamps($UNTRUSTED['comment']));

   // remove sneeky people pushing urls from client side:
   $comment = str_replace("[PUSH]","",$comment);
   $comment = str_replace("[/PUSH]","",$comment);   
   
   
   
	 // convert links :
   $comment = preg_replace('#(\s(www.))([^\s]*)#', ' http://\\2\\3 ', $comment);
   $comment = preg_replace('#((http|https|ftp|news|file)://)([^\s]*)#', '<a href="\\1\\3" target=_blank>\\1\\3</a>', $comment);
     
   if($UNTRUSTED['convertsmile'] !="OFF")
     $comment = convert_smile($comment);

   $timeof = date("YmdHis");
   if(empty($UNTRUSTED['saidto'])) $UNTRUSTED['saidto'] = 0;
   
   // see if we have same timestamp: a performance issue but actually done on perpose to discourage 
   // people making hosted solutions with multiple chats all using the same system.
   $query = "SELECT timeof FROM livehelp_messages WHERE timeof='$timeof'";
   $rs = $mydatabase->query($query);
   while($rs->numrows() != 0){
    if(function_exists('sleep')){  sleep(1); $timeof = date("YmdHis"); } else { $timeof++; }    
    $query = "SELECT timeof FROM livehelp_messages WHERE timeof='$timeof'";
    $rs = $mydatabase->query($query);
   }
   
   $query = "INSERT INTO livehelp_messages (message,channel,timeof,saidfrom,saidto) VALUES ('".filter_sql($comment)."',". intval($UNTRUSTED['channel']).",'$timeof',".intval($myid).",".intval($UNTRUSTED['saidto']).")";	
   $mydatabase->query($query);
   $query = "DELETE FROM livehelp_messages WHERE typeof='writediv'";
   $mydatabase->query($query);   
   $query = "UPDATE livehelp_users set lastaction='$timeof',visits=0 WHERE sessionid='".$identity['SESSIONID']."'";	
   $mydatabase->query($query);
       
if(!($serversession))   
   $mydatabase->close_connect();
   $filepath = "images/browse.gif";   
   showimage($filepath,"image/gif");  
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
 $html .= "<table width=100%><tr bgcolor=$color_background><td>&nbsp;</td><td><b>ID</b></td><td><b>".$lang['status'].":</b></td><td><b>#</b></td>";
 if($CSLH_Config['maxrequests']<9999){ $html .= "<td>rq#</td>"; }
 $html .= "</tr>";
 
$insitewav = "";

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

  if( ($visitor['isoperator'] != "Y") && ($visitor['user_alert'] != 1)){
        if ($show_arrival != "N"){
              $insitewav = " <EMBED SRC=sounds/".$alertinsite." AUTOSTART=TRUE width=1 height=1  LOOP=FALSE> \n";
        }      
      $sql = "UPDATE livehelp_users SET user_alert='1' WHERE user_id='" . $visitor['user_id'] . "' ";
      $mydatabase->query($sql);
  }

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
  $html .= "<td>$my_count</td>";
  if($CSLH_Config['maxrequests']<9999){
    if($user_info['visits'] > ($CSLH_Config['maxrequests']-16) ){
    if($user_info['visits'] < $CSLH_Config['maxrequests'] ){  	
  	     $html .= "<td><font color=#770000>" . $user_info['visits']. "</font><br><a href=javascript:resetpages(" . $visitor['user_id'] . ")>reset</a></td>";
    } else {
  	     $html .= "<td><font color=#CC0000><b>" . $user_info['visits']. "</b></font><br><a href=javascript:resetpages(" . $visitor['user_id'] . ")>reset</a></td>";  	  	
    }	   	 
   } else {
    	     $html .= "<td>".  $user_info['visits']. "</td>";
   }  
  }
  $html .= "</tr>";
  
  
  
  }  
 }
 $html = str_replace("[onlinenow]",$onlinenow,$html);
 $html = str_replace("[hiddennow]",$hiddennow,$html); 
 
 $html .= "</table>";
 $html .= "<DIV ID=\"visitorsdiv\" STYLE=\"z-index: 2;\">";
 $html .= "</DIV>"; 
print $html;
print $DIVS;
print $insitewav;
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
	print showmessages($myid,"",$UNTRUSTED['HTML'],$see,$hide,true,$omitself);
	print showmessages($myid,"writediv",$UNTRUSTED['LAYER'],$see,$hide,true,$omitself);		
}
 
?> 