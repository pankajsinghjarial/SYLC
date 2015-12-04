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
if(!(isset($UNTRUSTED['see']))){ 
	$see = ""; 
} else {
  $see = intval($UNTRUSTED['see']);	
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
 
 $selectedtab = "requests";
 include "mobileheader.php";
 
?>
<script type="text/javascript">
var myScroll;
window.addEventListener('orientationchange', setHeight);

function setHeight() {
	document.getElementById('wrapper').style.height = window.orientation == 90 || window.orientation == -90 ? '105px' : '320px';
}

function loaded() {

	setHeight();
	document.addEventListener('touchmove', function(e){ e.preventDefault(); });
	myScroll = new iScroll('currentwindow');
 
}
document.addEventListener('DOMContentLoaded', loaded);


</script>
<script language="JavaScript" type="text/javascript" src="../javascript/xmlhttp.js"></script>   
<script language="JavaScript" type="text/javascript">
 
 /** * loads a XMLHTTP response into parseresponse * *@param string url to 
request *@see parseresponse() */
function update_xmlhttp() { 

	setTimeout('update_xmlhttp()',10000);
	randu=Math.round(Math.random()*9999); 
	sURL = 'xmlhttp.php'; 
	extra = ""; 
      	 
  sPostData = 'op=yes&whattodo=requests&rand='+ randu;
  fullurl = 'xmlhttp.php?' + sPostData;

  GETForm(fullurl);
  
}

 function ExecRes(textstring){

	var chatelement = document.getElementById('currentwindow'); 
  chatelement.innerHTML = unescape(textstring); 
        
}
 function up(){
  myScroll.refresh();
 	setTimeout('up();',5000);    
	}

 	setTimeout('update_xmlhttp();',4000);    
  setTimeout('up();',4500);   
 
</SCRIPT>
	 
      <div id="wrapper">
       <div id="currentwindow">           	
       	<b>Loading Chat Requests... </b>                     
       </div>
      </div>
 
    </body>
</html>