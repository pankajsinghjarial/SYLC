<?php
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
 require_once("..\admin_common.php");
else
 require_once("../admin_common.php");
 
 validate_session($identity);

$thisoperator = new CSLH_operator();
$chatarray = $thisoperator->arrayofchats();
 
// get the info of this user.. 
$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
if($people->numrows() != 0){
 $people = $people->fetchRow(DB_FETCHMODE_ASSOC);
 $UNTRUSTED['myid'] = $people['user_id'];
 $operator_id = $UNTRUSTED['myid'];
 $channel = $people['onchannel'];
}  
  
$jsrn = get_jsrn($identity);

if(!(isset($UNTRUSTED['cleartonow']))){ $UNTRUSTED['cleartonow'] = ""; }
if(!(isset($UNTRUSTED['offset']))){ $UNTRUSTED['offset'] = ""; }
if(!(isset($UNTRUSTED['clear']))){ $UNTRUSTED['clear'] = ""; }
if(!(isset($UNTRUSTED['channel']))){ $UNTRUSTED['channel'] = 0; }
if(!(isset($UNTRUSTED['myid']))){ 
	 $UNTRUSTED['myid'] = 0; 
} else {
	 $myid = intval($UNTRUSTED['myid']);
}
 
if(!(isset($UNTRUSTED['starttimeof']))){ $UNTRUSTED['starttimeof'] = 0; }


if(!(empty($UNTRUSTED['setchattype']))){
 $query = "UPDATE livehelp_users SET chattype='xmlhttp' WHERE sessionid='".$identity['SESSIONID']."'";	
 $mydatabase->query($query);
}

$timeof = date("YmdHis");
$timeof_load = $timeof;
$prev = mktime ( date("H"), date("i")-30, date("s"), date("m"), date("d"), date("Y") );
$oldtime = date("YmdHis",$prev);
 
if(($CSLH_Config['use_flush'] == "no") || ($UNTRUSTED['offset'] != "")){ $timeof = $oldtime; }
if($UNTRUSTED['clear'] == "now"){
  // get the timestamp of the last message sent on this channel.
  $query = "SELECT * FROM livehelp_messages ORDER BY timeof DESC";	
  $messages = $mydatabase->query($query);
  $message = $messages->fetchRow(DB_FETCHMODE_ASSOC);
  $timeof = $message['timeof'] - 2;  
  $offset = $message['timeof'] - 2; 
  $starttimeof =  $message['timeof'] -2; 
} 
if(isset($starttimeof)){
  $timeof = $starttimeof;
}
  
if(!($serversession))
  $mydatabase->close_connect();
 

 

if(!(isset($UNTRUSTED['whattodo']))){  $UNTRUSTED['whattodo'] = ""; }

if($UNTRUSTED['whattodo'] == ""){
 // get current colors...
 $query = "SELECT * FROM livehelp_operator_channels WHERE channel=".intval($UNTRUSTED['id']);
 $sth = $mydatabase->query($query);
 $rs = $sth->fetchRow(DB_FETCHMODE_ASSOC);
 $channelcolor = $rs['channelcolor'];
 $txtcolor = $rs['txtcolor'];
 $txtcolor_alt = $rs['txtcolor_alt'];
 
 // get the usernames:
  $query = "SELECT username FROM livehelp_users WHERE user_id=".intval($rs['user_id']);
 $sth = $mydatabase->query($query);
 $rs2 = $sth->fetchRow(DB_FETCHMODE_ASSOC);
 $txtcolor_username = $rs2['username'];
 
 $query = "SELECT username FROM livehelp_users WHERE user_id=".intval($rs['userid']);
 $sth = $mydatabase->query($query);
 $rs2 = $sth->fetchRow(DB_FETCHMODE_ASSOC);  
 $txtcolor_alt_username = $rs2['username'];
 
  
}

if($UNTRUSTED['whattodo'] == "UPDATE"){
 $query = "UPDATE livehelp_operator_channels SET txtcolor_alt='".filter_sql($UNTRUSTED['txtcolor_alt'])."',channelcolor='".filter_sql($UNTRUSTED['channelcolor'])."',txtcolor='".filter_sql($UNTRUSTED['txtcolor'])."' WHERE channel=".intval($UNTRUSTED['id']);
 $sth = $mydatabase->query($query);
 ?>
<script type="text/javascript">window.location.replace('live.php');</script>
<?php
 exit;  
}

 $selectedtab = "visit";
 include "mobileheader.php";
 
?>
<script type="text/javascript">
var myScroll;
window.addEventListener('orientationchange', setHeight);

function setHeight() {
	document.getElementById('wrapper').style.height = window.orientation == 90 || window.orientation == -90 ? '85px' : '300px';
}

function loaded() {

	setHeight();
	document.addEventListener('touchmove', function(e){ e.preventDefault(); });
	myScroll = new iScroll('currentwindow');
 
}
document.addEventListener('DOMContentLoaded', loaded);


</script>
	 
      <div id="wrapper">
       <div id="currentwindow"> 
 
 
<SCRIPT type="text/javascript">
function changebg(towhat){
 document.mine.channelcolor.value = towhat;
}
function changetxt(towhat){
 document.mine.txtcolor.value = towhat;	
}
function changetxtalt(towhat){
 document.mine.txtcolor_alt.value = towhat;	
}

</SCRIPT>
<FORM ACTION=chat_color.php Method=POST name=mine>
<input type=hidden name=id value="<?php echo $UNTRUSTED['id']; ?>">
<input type=hidden name=whattodo value=UPDATE>
<font size=+2><?php echo $lang['txt1']; ?></font><br>
<b><?php echo $lang['txt2']; ?></b> #<input type=text size=7 name=channelcolor value="<?php echo $channelcolor; ?>"> <br>
<table width=300>
<tr>
<?php

// we want to create a random color chart of Light colors consisting
// of C,D,E,F in Hex..
$highletters = array("C","D","E","F");

// rows
for($i=1; $i< 5; $i++){
 print "<tr>\n";
 // cols 
 for($j=1;$j<6;$j++){
    // generate random Hex..
    $randomhex = "";
    for ($index = 1; $index <= 6; $index++) {
       $randomindex = rand(0,3); 
       $randomhex .= $highletters[$randomindex];
    }	 
    print "<td width=50 bgcolor=$randomhex><a href=javascript:changebg('$randomhex')><img src=images/blank.gif width=50 height=50 border=0></a></td>\n";
 }
 print "</tr>\n";
}
print "</table>\n";
?> 
<br>

<font color=<?php echo $txtcolor; ?>><b><?php echo $txtcolor_username; ?> <?php echo $lang['txt3']; ?></b></font> #<input type=text size=7 name=txtcolor  value="<?php echo $txtcolor; ?>"> <br>
<table width=300>
<tr>
<?php

// we want to create a random color chart of Light colors consisting
// of C,D,E,F in Hex..
$highletters = array("C","D","E","F");
$lowletters = array("0","2","4","6");

// rows
for($i=1; $i< 5; $i++){
 print "<tr>\n";
 // cols 
 for($j=1;$j<6;$j++){
    // generate random Hex..
    $randomhex = "";
    for ($index = 1; $index <= 6; $index++) {
       $randomindex = rand(0,3); 
       $randomhex .= $lowletters[$randomindex];
    }	 
    print "<td width=50 bgcolor=$randomhex><a href=javascript:changetxt('$randomhex')><img src=images/blank.gif width=50 height=50 border=0></a></td>\n";
 }
 print "</tr>\n";
}
print "</table>\n";
?> 
<br><br>

<font color=<?php echo $txtcolor_alt; ?>><b><?php echo $txtcolor_alt_username; ?> <?php echo $lang['txt3']; ?></b></font> #<input type=text size=7 name=txtcolor_alt  value="<?php echo $txtcolor_alt; ?>"> <br>
<table width=300>
<tr>
<?php

// we want to create a random color chart of Light colors consisting
// of C,D,E,F in Hex..
$highletters = array("C","D","E","F");
$lowletters = array("2","4","6","8");

// rows
for($i=1; $i< 5; $i++){
 print "<tr>\n";
 // cols 
 for($j=1;$j<6;$j++){
    // generate random Hex..
    $randomhex = "";
    for ($index = 1; $index <= 6; $index++) {
       $randomindex = rand(0,3); 
       $randomhex .= $lowletters[$randomindex];
    }	 
    print "<td width=50 bgcolor=$randomhex><a href=javascript:changetxtalt('$randomhex')><img src=images/blank.gif width=50 height=50 border=0></a></td>\n";
 }
 print "</tr>\n";
}
print "</table>\n";
?> 
<br>
<input type=SUBMIT value="<?php echo $lang['txt4']; ?>">
</FORM>
<?php
if(!($serversession))
  $mydatabase->close_connect();
?>
</DIV></DIV>
