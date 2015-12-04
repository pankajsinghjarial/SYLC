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
require_once("visitor_common.php");
  
// get the info of this user.. 
$query = "SELECT * 
          FROM livehelp_users 
          WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);  
$myid = $people['user_id'];
$channel = $people['onchannel'];
$isnamed = $people['isnamed'];
$lastaction = date("YmdHis");
$timeof = date("YmdHis");
$startdate =  date("Ymd");

if(!(isset($UNTRUSTED['tab']))){ $UNTRUSTED['tab'] = ""; } else { $UNTRUSTED['tab'] = intval($UNTRUSTED['tab']);}
if(!(isset($UNTRUSTED['action']))){ $UNTRUSTED['action'] = ""; }
if(!(isset($UNTRUSTED['makenamed']))){ $UNTRUSTED['makenamed'] = ""; }
if(!(isset($UNTRUSTED['doubleframe']))){ 
	 $doubleframe = "no"; }
else { $doubleframe = $UNTRUSTED['doubleframe']; }	 
if(!(isset($UNTRUSTED['department']))){ $UNTRUSTED['department'] = 0; }


// get department information...
$where="";
// if no department is sent in the query string then re-direct 
// to department choice page:
if( (empty($UNTRUSTED['department'])) || ($UNTRUSTED['department'] == 0)){ 
	$website = intval($UNTRUSTED['website']);
	if($website!=0){
  Header("Location: choosedepartment.php?website=$website");
  } else {
  Header("Location: choosedepartment.php");  
  }
  exit;
} else {
	$UNTRUSTED['department'] = intval($UNTRUSTED['department']);
} 
   $query = "SELECT * 
             FROM livehelp_departments 
             WHERE recno=". intval($UNTRUSTED['department']);
   $data_d = $mydatabase->query($query);  
   if($data_d->numrows() == 0){
     print "<font color=990000>Error no department with that id</font>";
     exit;	
   }
   $department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
   $UNTRUSTED['department'] = $department_a['recno'];
   $topframeheight = $department_a['topframeheight'];
   if($topframeheight<30) 
      $topframeheight = 30;
   if($department_a['requirename'] == "N"){
      $alterisnamed = ", isnamed='Y',askquestions='N' ";      
      $isnamed="Y";
   } else {
      $alterisnamed = "";
   }
   // update their status to show the department:
  $query = "UPDATE livehelp_users 
            SET department=".intval($UNTRUSTED['department']) . $alterisnamed . "
            WHERE sessionid='".$identity['SESSIONID']."'";	
  $mydatabase->query($query);
 
$query = "SELECT * 
          FROM livehelp_users 
          WHERE sessionid='".$identity['SESSIONID']."'";
$person_a = $mydatabase->query($query);  
$person = $person_a->fetchRow(DB_FETCHMODE_ASSOC);

if(!(empty($UNTRUSTED['tab']))){
    $query = "SELECT * 
              FROM livehelp_modules 
              WHERE id=".intval($UNTRUSTED['tab']);	
    $data = $mydatabase->query($query);
    $row = $data->fetchRow(DB_FETCHMODE_ASSOC);

    // this was considered a security vunerability rather then a feature:
    // http://secunia.com/advisories/45287/
    // so.. it is commented out. 
    // $UNTRUSTED['pageurl'] .= "?department=".$UNTRUSTED['department']."&" . $row['query_string']; 	
         
    if($UNTRUSTED['pageurl']=="offline.php"){
       $pageurl = "offline.php"; 
    } else {
       $pageurl = $row['path'];
    }
    
    $pageurl .= "?department=".$UNTRUSTED['department']."&" . $row['query_string']; 			
}

// see if anyone is online . if not send them to the leave a message page..
$query = "SELECT * 
          FROM livehelp_users,livehelp_operator_departments 
          WHERE livehelp_users.user_id=livehelp_operator_departments.user_id 
            AND livehelp_users.isonline='Y' 
            AND livehelp_users.isoperator='Y' 
            AND livehelp_operator_departments.department=".intval($UNTRUSTED['department']);
$data = $mydatabase->query($query);  

if($data->numrows() == 0){

 // else go to default tab id.. 
if(empty($UNTRUSTED['tab'])){
   $doubleframe = "yes";  
   $query = "SELECT * 
             FROM livehelp_modules_dep,livehelp_modules 
             WHERE livehelp_modules_dep.modid=livehelp_modules.id 
               AND defaultset='Y' 
               AND departmentid=".intval($UNTRUSTED['department']);	
   $data = $mydatabase->query($query);
   if( $data->numrows() == 0){
     $doubleframe = "yes";
     $pageurl = "offline.php?department=".intval($UNTRUSTED['department']);
     $UNTRUSTED['tab'] = 1;
   } else {
    $row = $data->fetchRow(DB_FETCHMODE_ASSOC);
    
    if(empty($UNTRUSTED['pageurl'])){ $UNTRUSTED['pageurl']="";  }
    if($UNTRUSTED['pageurl']=="offline.php"){
       $pageurl = "offline.php"; 
    } else {
       $pageurl = $row['path'];
    }
 
    $pageurl .= "?department=".$UNTRUSTED['department']."&" . $row['query_string'];
    $UNTRUSTED['tab']= $row['id'];
   }
 } 
}
if(empty($UNTRUSTED['tab'])){ $UNTRUSTED['tab'] = 1;}
if($UNTRUSTED['tab']!= 1){
  $doubleframe = "yes";
}

if( $data->numrows() != 0){
 // get the userid, channel and isnamed fields.
  $query = "SELECT * 
            FROM livehelp_users 
            WHERE sessionid='".$identity['SESSIONID']."'";
  $people = $mydatabase->query($query);
  if($people->numrows() == 0){ 
       $query = "ALTER TABLE `livehelp_users` CHANGE `user_id` `user_id` INT( 10 ) NOT NULL AUTO_INCREMENT ";
       $mydatabase->query($query);	       
  }
  $people = $people->fetchRow(DB_FETCHMODE_ASSOC);
  $myid = $people['user_id'];
  $channel = $people['onchannel'];
  $isnamed = $people['isnamed'];
  $askquestions = $people['askquestions'];
  $status = $people['status'];  
 
  // if the user was invited. change status to invited.
  if($status == "request"){
    $query = "UPDATE livehelp_users 
              SET status='invited' 
              WHERE sessionid='".$identity['SESSIONID']."'";
    $mydatabase->query($query);
   }

   /// make sure the department is right.
   $query = "UPDATE livehelp_users 
             SET department=".intval($UNTRUSTED['department'])."
             WHERE sessionid='".$identity['SESSIONID']."'";	
  $mydatabase->query($query);

  // if the user requested an exit..
  if($UNTRUSTED['action'] == "leave"){
    Header("Location: wentaway.php?savepage=1&department=".$UNTRUSTED['department']);
    exit;
  }

  // skip ask for name if that is set.
  if($department_a['requirename'] != "Y"){
    $newusername = $identity['IP_ADDR'];
    $makenamed = "Y";
  }

  // isnamed is set to yes when the user enters in their name. 
  if($UNTRUSTED['makenamed'] == "Y"){
 
  // make sure the username is a username:
  $newusername = substr($UNTRUSTED['newusername'],0,15);
  $newusername = filter_html($newusername);  
  $newusername = str_replace("'","",$newusername);
  
  // make sure the username that we have is unique:  
  $currenthandle = $identity['HANDLE'];
  $countnum = 0;
  
  // if the username submitted is different then the current handle we have
  // and the handle is not an ip address..
  
  if( ($currenthandle != $newusername) && ($currenthandle !=$identity['IP_ADDR']) )
    $count = 1;
  else
    $count = 0;
  $username_s = $newusername; 
  if($newusername == ""){ $newusername = "no name"; }
  while($count != 0){
    $query = "SELECT * 
              FROM livehelp_users 
              WHERE username='".filter_sql($newusername)."'"; 
    $count_a = $mydatabase->query($query);
    $count = $count_a->numrows();  
    if($count != 0){ $newusername = $username_s . "_" . $countnum; }
    $countnum++;
  }      
  
  // get the answers to the questions and place in users session.
	$sessiondata = "";
	$useremail = "";
	$errors = "";
	$query = "SELECT * 
	          FROM livehelp_questions 
	          WHERE department=".intval($UNTRUSTED['department']);
	$res = $mydatabase->query($query);
	while($questions = $res->fetchRow(DB_FETCHMODE_ASSOC)){
	  $fieldname = "field_" . $questions['id']; 
	  $required = $row['required'];   
    $headertext = $row['headertext'];
    
     // if required:
   		if( ($required == "Y") && empty($UNTRUSTED[$fieldname]) ) {
   		   	$errors = "<li>" . $headertext . " " . $lang['isrequired'];   		   		
   		 }
   		   
		// if this is a checkbox field the values are in an array: 
		switch($questions['fieldtype']){
		  case "username":
		    // do nothing.. this is handled above.
		    break;
		  case "email":
		    if(!(empty($UNTRUSTED[$fieldname])))
  		    $useremail = filter_html($UNTRUSTED[$fieldname]);
		    break;
		  case "checkboxes":
		    $values = "";
		    $comma = "";
		    for($k=0;$k<99;$k++){
  		    $checkfieldname = $fieldname . "__" . $k;
  		    if(!(empty($UNTRUSTED[$checkfieldname]))){	     	
		    	 $values .= $comma . urlencode(filter_html($UNTRUSTED[$checkfieldname]));
		    	 $comma = ",";
		      }  
		    }
		     $sessiondata .= $fieldname . "=" . $values . "&";		    
		    break;
		  default:
		    if(!(empty($UNTRUSTED[$fieldname])))
   		    $sessiondata .= $fieldname . "=" . urlencode(filter_html($UNTRUSTED[$fieldname])) . "&";
		    break;
	  }  
	  
  }
 
  $useremail = str_replace("\'","",$useremail);
  $useremail = str_replace("'","",$useremail);
  $query = "UPDATE livehelp_users 
            SET email='".filter_sql($useremail)."',isnamed='Y',askquestions='N',username='".filter_sql($newusername)."',sessiondata='$sessiondata' 
            WHERE sessionid='".$identity['SESSIONID']."'";
  $mydatabase->query($query);	
   
  $query = "SELECT * 
            FROM livehelp_users 
            WHERE sessionid='".$identity['SESSIONID']."'";
  $people = $mydatabase->query($query);
  $people = $people->fetchRow(DB_FETCHMODE_ASSOC);
  $myid = $people['user_id'];
  $channel = $people['onchannel'];  
  $department = $people['department'];
    
  $isnamed = "Y"; 
}


	// get department information...
$where="";
   if($UNTRUSTED['department']!=0){ $where = " WHERE recno=".intval($UNTRUSTED['department']); }
   $sqlquery = "SELECT * FROM livehelp_departments $where ";
   $data_d = $mydatabase->query($sqlquery);  
   $department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
   $department = $department_a['recno']; 
   $topframeheight = $department_a['topframeheight'];  
   $topbackground = $department_a['topbackground']; 
   $topbackcolor = $department_a['topbackcolor']; 
   $botbackcolor = $department_a['botbackcolor'];
   $botbackground = $department_a['botbackground'];
   $midbackcolor = $department_a['midbackcolor'];
   $midbackground = $department_a['midbackground'];
   $colorscheme = $department_a['colorscheme']; 
   $theme = $department_a['theme']; 
   $blank_offset = $topframeheight - 20;
   
   
   
// create the channel
if(( ($channel == -1) || ($channel == "")) && ($isnamed == "Y") ){

$channel = createchannel($myid,$department);
 
$query = "UPDATE livehelp_users 
          SET status='chat' 
          WHERE user_id=".intval($myid);
$mydatabase->query($query);
}

// change status to chat 
if( ($isnamed == "Y") && ($askquestions =="N") ){
  $query = "UPDATE livehelp_users
            SET status='chat' 
            WHERE user_id=".intval($myid);
  $mydatabase->query($query); 
}
if(!($serversession))
  $mydatabase->close_connect();
}




	// get department information...
$where="";
   if($UNTRUSTED['department']!=0){ $where = " WHERE recno=".intval($UNTRUSTED['department']); }
   $sqlquery = "SELECT * FROM livehelp_departments $where ";
   $data_d = $mydatabase->query($sqlquery);  
   $department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
   $department = $department_a['recno']; 
   $topframeheight = $department_a['topframeheight'];  
   $topbackground = $department_a['topbackground']; 
   $topbackcolor = $department_a['topbackcolor']; 
   $botbackcolor = $department_a['botbackcolor'];
   $botbackground = $department_a['botbackground'];
   $midbackcolor = $department_a['midbackcolor'];
   $midbackground = $department_a['midbackground'];
   $colorscheme = $department_a['colorscheme']; 
   $theme = $department_a['theme']; 
   $blank_offset = $topframeheight - 20;
   
   
   
$td_list = "<table cellpadding=0 cellspacing=0 border=0><tr>";
// get tabs/links: 
$tabshown = 0;
$sqlquery = "SELECT * 
          FROM livehelp_modules,livehelp_modules_dep 
          WHERE livehelp_modules.id=livehelp_modules_dep.modid
            AND livehelp_modules_dep.isactive='Y' 
            AND livehelp_modules_dep.departmentid=".intval($UNTRUSTED['department'])." 
          ORDER by livehelp_modules_dep.ordernum";
$tabs = $mydatabase->query($sqlquery);
$k = 0;
while($row = $tabs->fetchRow(DB_FETCHMODE_ASSOC)){
 $k++;
 if(strlen($row['name'])>20){ $long = 1; } else { $long = 0;  }
 if($UNTRUSTED['tab'] == $row['id']){ $class = "class=\"ontab\""; } else { $class = "class=\"offtab\""; }  
  $td_list = $td_list . "<td id=\"navigation\" class=\"navigation\" nowrap  STYLE=\"text-align:center;\"><span $class ><A HREF=\"livehelp.php?page=". $row['path'] . "&department=". $UNTRUSTED['department'] . "&tab=" . $row['id'] . "\" $class target=_top>" .  $row['name']  . "</a></span></td><td width=10></td>"; 
 }
 if($td_list != "<table cellpadding=0 cellspacing=0 border=0><tr>"){  $td_list .= "</tr></table>"; } else {   $td_list = ""; } 


   
	 if( intval($UNTRUSTED['department'])==0){ $theme = $CSLH_Config['theme']; }


if($doubleframe == "yes"){

$urlforchat = $page . "?department=" . $UNTRUSTED['department'] ."&channel=" . $channel ."&t=" . $lastaction . $querystringadd;
$urlforbot = "user_bot.php?department=" . $UNTRUSTED['department'] . "&channel=" . $channel . "&t=" . $lastaction . "&myid=" . $myid .  $querystringadd; 
$urlforoperator = "themes/$theme/operator.jpg";

?>
<SCRIPT type="text/javascript">
function exitchat(){
 <?php if ($isnamed == "Y"){ ?>
  window.parent.location= 'wentaway.php?action=leave&autoclose=Y&visiting=Y&department=<?php echo $UNTRUSTED['department']; ?>';
 <?php } ?>
}
 
if (window.parent != window.self){
   window.parent.location='livehelp.php?department=<?php echo $UNTRUSTED['department']; ?>&tab=<?php echo $UNTRUSTED['tab']; ?>';
}
</SCRIPT>
 
 <?php
$pos = strpos($pageurl, "?");
if ($pos === false) { 
	 $pageurl = $pageurl . "?department=" . intval($UNTRUSTED['department']) ."&"; 
} else {
	 $pageurl = $pageurl . "&department=" . intval($UNTRUSTED['department']); 
}
	 
$url = $pageurl . $querystringadd;
$urlforchat = str_replace("&&","&",$url);
include "themes/$theme/chatwindow_large.php";
 
} else {
	
	// get the info of this user.. 
$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);  
$myid = $people['user_id'];
$channel = $people['onchannel'];
$isnamed = $people['isnamed'];
$department = $people['department'];


// get a channel for this user:
$onchannel = createchannel($myid,$department);

// get department information...
$where="";
if(!(isset($UNTRUSTED['department']))){ $UNTRUSTED['department'] = ""; }
if(!(isset($UNTRUSTED['printit']))){ $UNTRUSTED['printit'] = ""; }
if($UNTRUSTED['department']!=""){ $where = " WHERE recno=". intval($UNTRUSTED['department']); }
$query = "SELECT * FROM livehelp_departments $where ";
$data_d = $mydatabase->query($query);  
$department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
$colorscheme = $department_a['colorscheme'];
$theme = $department_a['theme'];
if( intval($UNTRUSTED['department'])==0){ $theme = $CSLH_Config['theme']; }
$department = $department_a['recno'];
$botbackcolor = $department_a['botbackcolor'];
$botbackground = $department_a['botbackground'];
$midbackcolor = $department_a['midbackcolor'];
$midbackground = $department_a['midbackground'];
$smiles = $department_a['smiles'];
 
if(!(empty($UNTRUSTED['enditall']))){
	?>
	<SCRIPT type="text/javascript">
		 window.parent.location.replace("wentaway.php?savepage=1&department=<?php echo $UNTRUSTED['department']; ?>");
  </SCRIPT> 
  <?php
  exit;
}

if (empty($UNTRUSTED['convertsmile']))
   $UNTRUSTED['convertsmile'] = "ON";

if($smiles=="N")
  $UNTRUSTED['convertsmile'] = "OFF";

?>
<SCRIPT src="javascript/xmlhttp.js" type="text/javascript"></script> 
<SCRIPT  type="text/javascript">
var ismac = navigator.platform.indexOf('Mac');	
mymessagesofar = "";
 
 function showsmile(){
	msgWindow = open('smile.php','smileimages','width=500,height=300,toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars=yes','POPUP');
	if (msgWindow.opener == null){
		msgWindow.opener = self;
	}
	if (msgWindow.opener.myform == null){
        msgWindow.opener.myform = document.sendform;
	}
	msgWindow.focus();
	
}

function noamps(whatstring){
  s = new String(whatstring); 
  s = s.replace(/&/g,"*amp*");
  s = s.replace(/=/g,"*equal*");
  s = s.replace(/\+/g,"*plus*");
  s = s.replace(/\#/g,"*hash*");
  s = s.replace(/\n/g,"*newline*");
  s = s.replace(/\%/g,"*percent*");
  return s;
}
 
function sayingwhat(){ 
  setTimeout('sayingwhat()',5000);
  var newmess = document.chatter.comment.value;
  if (document.chatter.comment.value.length > 2){
   if( (blockmessage != 1) && (mymessagesofar != newmess)){
    var u = 'image.php?' + 
					'what=startedtyping' + 
					'&channelsplit=' + document.chatter.channel.value + 
					'&fromwho=' + document.chatter.myid.value + 
					'&sayingwhat=' + noamps(document.chatter.comment.value);
    cscontrol.src = u; 
    mymessagesofar = newmess;
   }
  }
}

function expandit() {
  window.parent.resizeTo(window.screen.availWidth - 50,      
  window.screen.availHeight - 50); 
}

function netscapeKeyPress(e) {
     if (e.which == 13){
          safeSubmit();
        }
}

function microsoftKeyPress() {
  ns4 = (document.layers)? true:false;
  ie4 = (document.all)? true:false;
  if(ie4){
    if (window.event.keyCode == 13){
         safeSubmit();
       }
  } 
}
 
function nothingtodo(){ 
}

function ExecRes(textstring){ 
	blockmessage = 0;
	document.chatter.comment.value = '';
	}

function safeSubmit() {
	blockmessage = 1;

	   var randu=Math.round(Math.random()*9899);
    var  sURL = 'xmlhttp.php';
   var  sPostData = 'whattodo=donetyping' +
    			'&channelsplit=' + document.chatter.channel.value + 
					'&fromwho=' + document.chatter.myid.value + 
					'&channel=' + document.chatter.channel.value + 	
					'&convertsmile=' + document.chatter.convertsmile.value + 										
					'&comment=' + noamps(document.chatter.comment.value);
    var  fullurl = 'xmlhttp.php?' + sPostData;
 
     //PostForm(sURL, sPostData)
     GETForm(fullurl);
     
	return false;
}


function blockIt(f) {
	return false;
}	

function shouldifocus(){	  
   if( (flag_imtyping == false) && (loaded==1) ){
     var newmess = document.chatter.comment.value;
     if(document.chatter.comment.value.length < 2){
       window.focus();
       setTimeout("document.chatter.comment.focus()",1000);
    }
   }
}

function pingchat() {
	 pingcsID=Math.round(Math.random()*99999);
   pingcontrol = new Image;      	 
	 var u = 'image.php?randu=' + pingcsID + '&what=pingchat'
	 pingcontrol.src = u;
	 setTimeout('delete pingcontrol', 200);
}

ns4 = (document.layers)? true:false;
ie4 = (document.all)? true:false;


NS4 = (document.layers);
IE4 = (document.all)? true:false; 
if (NS4) 
   document.captureEvents(Event.KEYPRESS);
if(!(IE4))   
   document.onkeypress = netscapeKeyPress;

cscontrol= new Image;
pingcontrol= new Image;
blockmessage = 0;
setInterval('pingchat()', 5000); 
loaded=0;
setTimeout('loaded=1',4000);
var flag_imtyping = false;

</SCRIPT>
<?php
// get department information...
$where="";
if(empty($UNTRUSTED['department'])) $UNTRUSTED['department']= "";
if($UNTRUSTED['department']!=""){ $where = " WHERE recno=" . intval($UNTRUSTED['department']); }
$query = "SELECT * FROM livehelp_departments $where ";
$data_d = $mydatabase->query($query);  
$department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);

$botbackcolor = $department_a['botbackcolor'];
$botbackground = $department_a['botbackground'];
   $theme = $department_a['theme']; 
$query = "SELECT * FROM livehelp_operator_channels WHERE channel=" . intval($onchannel) . " AND userid=".intval($myid);
$counting = $mydatabase->query($query);
if($counting->numrows() == 0){
 ?>
 <SCRIPT  type="text/javascript">
//-----------------------------------------------------------------
// Update the control image. This is the image that the operators 
// use to communitate with the visitor. 
function csgetimage()
{	 
	setTimeout('csgetimage()', 7000); 
	 // set a number to identify this page .
	 csID=Math.round(Math.random()*9999);
	 randu=Math.round(Math.random()*9999);
   cscontrol = new Image;
      	 
	 var u = 'image.php?randu=' + randu + '&what=talkative'
  
    if (ismac > -1){
       document.getElementById("imageformac").src= u;
       document.getElementById("imageformac").onload = lookatimage;
    } else {
       cscontrol.src = u;
       cscontrol.onload = lookatimage;
    }  
    
      
}

function lookatimage(){
	
	if(typeof(cscontrol) == 'undefined' ){
		setTimeout('refreshit()',9000); 
    return; 
 }   
 
	 var w = cscontrol.width;      	 
   if( (w == 55) || (w == 0)){
       delete cscontrol; 	
  	   refreshit();
	 } 	        	            
      delete cscontrol;                 
 
} 
	
csTimeout = 299; 
cscontrol = new Image;

setTimeout('csgetimage()', 7000); 


function refreshit(){
 //window.location.replace("user_bot.php");
}	
  
setTimeout("refreshit();",99920);

 function init(){
   // nothing	
 }
 
</SCRIPT>
<?php 
 
} else { 
	
	?>
<SCRIPT  type="text/javascript">
<?php if ($CSLH_Config['show_typing'] != "N"){ print " setTimeout(\"sayingwhat()\",5000); "; } ?>

function init(){
  document.chatter.comment.focus();	
}
</SCRIPT>

<?php } ?>

<SCRIPT type="text/javascript">
function exitchat(){
 <?php if ($isnamed == "Y"){ ?>
  window.parent.location = 'livehelp.php?action=leave&autoclose=Y&department=<?php echo $UNTRUSTED['department']; ?>';
 <?php } ?>
}
if (window.parent != window.self){
   window.parent.location='livehelp.php?department=<?php echo $UNTRUSTED['department']; ?>&tab=<?php echo $UNTRUSTED['tab']; ?>';
}
</SCRIPT>
<?php

$pagetogo = "chatwindow.php";

  // if the user is named then connect to the chat. otherwize ask questions:
  if(empty($askquestions)) 
    $askquestions = "Y";
    
  $page = "user_connect.php"; 
  if ($askquestions == "Y"){
    $page = "user_questions.php";
    $pagetogo = "chatwindow_large.php";
  } else {
  	if(!(empty($UNTRUSTED['connect_user']))){
  		$page = "is_xmlhttp.php";
  		$querystringadd .= "&try=0&scriptname=user_chat";
  		} else {
    $page = "user_connect.php";
     }
  }  

$urlforchat = $page . "?department=" . $UNTRUSTED['department'] ."&channel=" . $channel ."&t=" . $lastaction . $querystringadd;
$urlforbot = "user_bot.php?department=" . $UNTRUSTED['department'] . "&channel=" . $channel . "&t=" . $lastaction . "&myid=" . $myid .  $querystringadd; 
$urlforoperator = "themes/$theme/operator.jpg";
$link = "<" . "a hr" . "ef=\"ht" . "tp://w" . "ww.c" . "raft" . "ysynt" . "ax.com?ut" . "m_" . "so" . "ur" . "ce" . "=po" . "we" . "re" . "db" . "y&" . "ut" . "m_" . "cam" . "pa" . "ig" . "n=p" . "ow" . "er" . "ed" . "by\" alt=\"Craf" . "ty Syn" . "tax Li" . "ve He" . "lp\" ta" . "rget=\"_bl" . "ank\">";
       $filepath = "images/livehelp.gif";
       
      if( ($xyz == "L") || ($xyz == "")){
       $filepath = "images/livehelp.gif";
      } 
      if($xyz == "W"){
       $filepath = "images/livehelp2.gif";  
      }
      if($xyz == "Y"){
       $filepath = "images/livehelp4.gif";  
      }
      if($xyz == "Z"){
       $filepath = "images/livehelp5.gif";   
      }  
      
$cslhdue = $link . "<img src=" . $filepath . " border=0></a>";

// get the operators image:
$sql = "SELECT user_id FROM livehelp_operator_channels WHERE userid=$myid ";
$data_d = $mydatabase->query($sql);  
 if($data_d->numrows() != 0){
   $department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
   $myuserid = $department_a['user_id']; 
   $sql = "SELECT photo FROM livehelp_users WHERE user_id=$myuserid ";
   $data_d = $mydatabase->query($sql);  
   if($data_d->numrows() != 0){
      $department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
      $photo = $department_a['photo']; 
      if(!(empty($photo))){  $urlforoperator = $photo; }
   }
}
  
include "themes/$theme/$pagetogo";

} ?>