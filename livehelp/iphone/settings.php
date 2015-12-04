<?php
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
 require_once("..\admin_common.php");
else
 require_once("../admin_common.php");
 
 validate_session($identity);

$thisoperator = new CSLH_operator();
$chatarray = $thisoperator->arrayofchats();
 
if($UNTRUSTED['whattodo'] == "update"){
	if($UNTRUSTED['autoin']=="Y"){  $auto = "Y"; } else { $auto = "N"; }
	if($UNTRUSTED['cellin']=="Y"){  $cellin = "Y"; } else { $cellin = "N"; }
	
  $query = "UPDATE livehelp_users SET cellphone='".$UNTRUSTED['cellphone']."',auto_invite='$auto',cell_invite='$cellin' WHERE sessionid='".$identity['SESSIONID']."'";	
  $mydatabase->query($query);
 
  $new_sessiontimeout = intval($UNTRUSTED['new_sessiontimeout']);
  if ($new_sessiontimeout < 20) {
     $new_sessiontimeout = 20;
  }
  
  $query = "UPDATE livehelp_config SET sessiontimeout='".$new_sessiontimeout."'";
  $mydatabase->query($query);  
  
  $CSLH_Config['sessiontimeout'] = $new_sessiontimeout;
  
}
 
// get the info of this user.. 
$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
if($people->numrows() != 0){
 $people = $people->fetchRow(DB_FETCHMODE_ASSOC);
 $UNTRUSTED['myid'] = $people['user_id'];
 $operator_id = $UNTRUSTED['myid'];
 $channel = $people['onchannel'];
 $cellphone =  $people['cellphone'];
 if($people['auto_invite'] == "Y"){ $auto_invite = " CHECKED "; } else {  $auto_invite = "   ";}
 if($people['cell_invite'] == "Y"){ $cell_invite = " CHECKED "; } else {  $cell_invite = "   ";}
}  
  
$jsrn = get_jsrn($identity);

 
 
 
$timeof = date("YmdHis");
 
if(isset($starttimeof)){
  $timeof = $starttimeof;
}
  
if(!($serversession))
  $mydatabase->close_connect();
 
 $selectedtab = "settings";
 include "mobileheader.php";
 
?>
<script type="text/javascript">
var myScroll;
window.addEventListener('orientationchange', setHeight);

function setHeight() {
	document.getElementById('wrapper').style.height = window.orientation == 90 || window.orientation == -90 ? '85px' : '390px';
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
       	   <form action=settings.php name=mysettings method=post>
       	   	<input type=hidden name=whattodo value=update>
       	   <b><input name=autoin type=checkbox value="Y" <?php echo $auto_invite; ?> >Auto Invite Enabled</b>
       	   <br>
       	   <hr>
       	   <b><input name=cellin type=checkbox value="Y" <?php echo $cell_invite; ?> >Cell Phone alert Chat requests:</b>
       	   <br>mobile e-mail address # <i>example:8087777777@txt.att.net</i>  <br>
       	   <input type=text onfocus="javascript:document.mysettings.cellin.checked=true;" class=large_form_field name=cellphone value="<?php echo $cellphone;?>"><br>
       	   <input type=submit value=UPDATE><br>
       	   <i>MUST BE FULL E-mail to phone here are some examples :<br>
AT&T : 8087777777@txt.att.net<br>
Verizon : 8087777777@vtext.com<br>
Alltel : 8087777777@message.alltel.com <br>
Boost Mobile : 8087777777@myboostmobile.com<br>
Cricket Wireless : 8087777777@sms.mycricket.com<br>
Nextel : 8087777777@messaging.nextel.com<br>
Sprint : 8087777777@messaging.sprintpcs.com<br>
T-Mobile : 8087777777@tmomail.net<br>
Virgin Mobile USA : 8087777777@vmobl.com<br>
Bell Canada: 8087777777@txt.bellmobility.ca<br>
Centennial Wireless: 8087777777@cwemail.com<br>
Cellular South: 8087777777@csouth1.com<br>
Cincinnati Bell: 8087777777@gocbw.com<br>
Qwest: 8087777777@qwestmp.com<br>
Rogers: 8087777777@pcs.rogers.com<br>
Suncom: 8087777777@tms.suncom.com<br>
Telus: 8087777777@msg.telus.com<br>
U.S. Cellular: 8087777777@email.uscc.net<br>
       	   <br>
       	   <hr>
<b>Timeout for Mobile:</b><br>
When logged in using mobile application this is how
log without activity till the operator is logged out 
this allows you to log in then close the browser window
or app on your phone and stay logged in.
<br>
<b>Mobile session timeout:</b><br>
<input type=text name=new_sessiontimeout value="<?php echo $CSLH_Config['sessiontimeout']; ?>" size=10>  Minutes  
<br><br>

       	   
        	 <input type=submit value=UPDATE></form>
       	   <hr>
       	   <h2>Other Settings:</h2>
       	   <br><br><font size=+2>
       	   <a href=../edit_quick.php>Edit Canned Responses</a>
       	   <br><br>
       	   <a href=../edit_quick.php?typeof=IMAGE>Edit Images</a>
       	   <br><br>
       	   <a href=../autoinvite.php>ADD/EDIT Auto Invite Monitor</a>
       	   <br><br>
       	   <a href=../edit_smile.php?tab=settings>ADD/EDIT Emotion Icons</a>
       	   <br><br>
       	   <a href=../operators.php>ADD/EDIT Operators</a>
       	   <br><br>
       	   <a href=../data.php?tab=data&alttab=0>View Data and Transcripts</a>
       	  <br><br></font>
       	   
       	   
       	   <br><br>
       	   <a href=logout.php><img src=images/logout.jpg width=109 height=29 border=0></a>
       	   <hr>
       	    <br><br><br><br>
       </div>
      </div>
 <br><br><br><br>
    </body>
</html>