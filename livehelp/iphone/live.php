<?php
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
 require_once("..\admin_common.php");
else
 require_once("../admin_common.php");
 
 validate_session($identity);

if(!(isset($UNTRUSTED['see']))){ 
	$see = ""; 
} else {
  $see = intval($UNTRUSTED['see']);	
}

if(!(isset($UNTRUSTED['killchat']))){ 
	$killchat = ""; 
} else {
  $killchat = intval($UNTRUSTED['killchat']);	
}


if(!(isset($UNTRUSTED['starttimeof']))){ $UNTRUSTED['starttimeof'] = 0; }

// get the info of this user.. 
$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
if($people->numrows() != 0){
 $people = $people->fetchRow(DB_FETCHMODE_ASSOC);
 $UNTRUSTED['myid'] = $people['user_id'];
 $operator_id = $UNTRUSTED['myid'];
 $channel = $people['onchannel'];
$greeting = $people['greeting']; 
}  

$timeof = date("YmdHis");

// set to online:
$query = "UPDATE livehelp_users set isonline='Y',lastaction='$timeof',status='chat' WHERE sessionid='".$identity['SESSIONID']."'";
$mydatabase->query($query);

// kill user:
if($killchat != ""){	
  $sqlquery = "SELECT * FROM livehelp_users WHERE user_id=".intval($UNTRUSTED['who']);	
  $rs = $mydatabase->query($sqlquery);
 
  $person = $rs->fetchRow(DB_FETCHMODE_ASSOC);
  $onchannel = $person['onchannel'];
  $sessionid = $person['sessionid'];
  stopchat($sessionid);
  $UNTRUSTED['action'] = "leave";
}
	
	
// activiate chatting with the user.. 
if($UNTRUSTED['action'] == "activiate"){

  // see if anyone is chatting with this person. 
  $sqlquery = "SELECT * FROM livehelp_operator_channels WHERE userid=" . intval($UNTRUSTED['who']);
  $counting = $mydatabase->query($sqlquery);
  // if someone is chatting with them ask if we would like to join...
  if( ($counting->numrows() != 0) && ($UNTRUSTED['needaction'] ==1)){
   if($UNTRUSTED['iphone'] == "Y"){ print "ANSWERED"; exit; }
   print $lang['txt180'] . "<br>";   
  } else {
  
  // see if anyone is chatting with this person. 
  $sqlquery = "SELECT * FROM livehelp_operator_channels WHERE userid=" . intval($UNTRUSTED['who']);
  $counting = $mydatabase->query($sqlquery);
  if($counting->numrows() == 0){       
   // get session data and post it as a message if not one
   $sqlquery = "SELECT * FROM livehelp_users WHERE user_id=" . intval($UNTRUSTED['who']);
   $userdata = $mydatabase->query($sqlquery);
   $user_row = $userdata->fetchRow(DB_FETCHMODE_ASSOC);
   $sessiondata = $user_row['sessiondata'];
   $datapairs = explode("&",$sessiondata);
   $datamessage="";
   for($l=0;$l<count($datapairs);$l++){
  	  $dataset = explode("=",$datapairs[$l]);
  	  if(!(empty($dataset[1]))){
  	  	$fieldid = str_replace("field_","",$dataset[0]);
  	  	$sqlquery = "SELECT * FROM livehelp_questions WHERE id=".intval($fieldid);
  	  	$questiondata = $mydatabase->query($sqlquery);
        $question_row = $questiondata->fetchRow(DB_FETCHMODE_ASSOC);    	  
    	  if($l!=0)
    	     $datamessage.= "<br>";
    	  $datamessage.= "<b>" . $question_row['headertext'] . "</b><br>" . urldecode($dataset[1]);
      }
   }
   if($datamessage!=""){
  	 $timeof = rightnowtime();
  	 $sqlquery = "INSERT INTO livehelp_messages (saidto,saidfrom,message,channel,timeof) VALUES (".intval($myid).",".intval($UNTRUSTED['who']).",'".filter_sql($datamessage)."',".intval($UNTRUSTED['whatchannel']).",'$timeof')";	
     $mydatabase->query($sqlquery);
   }
  
 
   
  }

  if( (empty($whatchannel)) || ($whatchannel == 0) ){
    $whatchannel = createchannel($UNTRUSTED['who']);
  }

   // generate random Hex..
   $txtcolor_alt = get_next_color_ordered("clients");

   $txtcolor = get_next_color_ordered("operators");
           
  $sqlquery = "DELETE FROM livehelp_operator_channels WHERE user_id=".intval($myid)." AND userid=" . intval($UNTRUSTED['who']);	
  $mydatabase->query($sqlquery);  
  $channelcolor = get_next_color_ordered("backgrounds");  
  $sqlquery = "INSERT INTO livehelp_operator_channels (user_id,channel,userid,txtcolor,txtcolor_alt,channelcolor) VALUES (".intval($myid).",".intval($whatchannel).",".intval($UNTRUSTED['who']).",'$txtcolor','$txtcolor_alt','$channelcolor')";	
  $mydatabase->query($sqlquery);
  // add to history:
   $query = "INSERT INTO livehelp_operator_history (opid,action,dateof,channel,totaltime) VALUES ($myid,'startchat','".date("YmdHis")."',".intval($whatchannel).",0)";
   $mydatabase->query($query);

  $timeof = rightnowtime();    
  if (!(empty($UNTRUSTED['conferencein']))){
    $channelcolor = get_next_color_ordered("backgrounds"); 
    $sqlquery = "INSERT INTO livehelp_operator_channels (user_id,channel,userid,txtcolor,channelcolor) VALUES (".intval($UNTRUSTED['who']).",".intval($whatchannel).",".intval($myid).",'$txtcolor','$channelcolor')";	
    $mydatabase->query($sqlquery);                
  } else {
   if(!(empty($greeting))){
    $sqlquery = "INSERT INTO livehelp_messages (saidto,saidfrom,message,channel,timeof) VALUES (".intval($UNTRUSTED['who']).",".intval($myid).",'".filter_sql($greeting)."',".intval($whatchannel).",'$timeof')";	
    $mydatabase->query($sqlquery);
   }
  }
  $channelsplit = $whatchannel . "__" . $UNTRUSTED['who'];
  
  if($UNTRUSTED['iphone'] == "Y"){ print "SUCCESS"; exit; }
  
  $sqlquery = "SELECT * FROM livehelp_users WHERE isoperator='Y' AND isonline='Y'";
  $operators_online = $mydatabase->query($sqlquery);
  $operators_talking = array();
  while($operator = $operators_online->fetchRow(DB_FETCHMODE_ASSOC)){
      $commonchannel = 0;
      $sqlquery = "SELECT * 
                FROM livehelp_operator_channels 
                WHERE user_id=".intval($operator['user_id']);
      $mychannels = $mydatabase->query($sqlquery);
      while($rowof = $mychannels->fetchRow(DB_FETCHMODE_ASSOC)){
         $sqlquery = "SELECT * 
                   FROM livehelp_operator_channels 
                   WHERE user_id=".intval($myid)." And channel=".$rowof['channel'];
         $counting = $mydatabase->query($sqlquery);        
         if($counting->numrows() != 0){ 
         	  if(!(in_array($operator['user_id'],$operators_talking)))
               array_push($operators_talking,$operator['user_id']);
         }
      }  
   } 
  
  // re-buld list:
  $prevnum = "";
  
 for($k=0;$k< count($operators_talking); $k++){
   if($k==0)
     $operators = $operators_talking[$k];
   else {
    if($prevnum !=$operators_talking[$k])
       $operators .= "," . $operators_talking[$k];
    $prevnum=$operators_talking[$k];
   }
  }
 }
}
 
$thisoperator = new CSLH_operator();
$chatarray = $thisoperator->arrayofchats();
 

  
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
 
 $selectedtab = "live";
 include "mobileheader.php";
 
 ?>
<script type="text/javascript">
 see = <?php echo intval($UNTRUSTED['see']);	?>;
var myScroll;
window.addEventListener('orientationchange', setHeight);

function setHeight() {
	document.getElementById('wrapper').style.height = window.orientation == 90 || window.orientation == -90 ? '85px' : '320px';
   	setTimeout('up();',5000);  
}

function loaded() {

	setHeight();
	document.addEventListener('touchmove', function(e){ e.preventDefault(); });
	myScroll = new iScroll('currentchat');
 
}
document.addEventListener('DOMContentLoaded', loaded);


</script>
 <SCRIPT LANGUAGE="JavaScript"  type="text/javascript" SRC="../javascript/xLayer.js"></SCRIPT> 
<SCRIPT LANGUAGE="JavaScript" type="text/javascript"  SRC="../javascript/xBrowser.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" type="text/javascript"  SRC="../javascript/staticMenu.js"></SCRIPT> 
<script language="JavaScript"  type="text/javascript" src="../javascript/dynapi/js/dynlayer.js"></script>
<script language="JavaScript"  type="text/javascript" src="../javascript/xmlhttp.js"></script>
  
<script type="text/javascript"> 
var whatissaid  = new Array(100);
 
	HTMLtimeof = <?php print date("YmdHis"); ?>;
 LAYERtimeof = <?php print date("YmdHis"); ?>;
 

/**
  * parse the deliminated string of messages from XMLHttpRequest.
  * This will be converted to XML in next version of CSLH.
  *
  *@param string text to parse.
  */
function ExecRes(textstring){

	var chatelement = document.getElementById('currentchat'); 
  
  var messages=new Array();

  //textstring = " messages[0] = new Array();  messages[0][0]=2004010101;   messages[0][1]=1;  messages[0][2]=\"HTML\";  messages[0][3]=\"test\"; ";
  // prevent Null textstrings:
  textstring = textstring + " ok =1; ";
 
 
  try { eval(textstring); } catch(error4){}
	  
	for (var i=0;i<messages.length;i++){	
    res_timeof = messages[i][0];
	  res_jsrn = messages[i][1];
	  res_typeof = messages[i][2];	  
    res_message = messages[i][3];    
    
    // skip if we do not exist...
    if(typeof chatelement!='undefined') { 
    		
  	if(res_typeof=="HTML"){  
	    if( res_timeof>HTMLtimeof ){    
          try { chatelement.innerHTML = chatelement.innerHTML + unescape(res_message); }
          catch(fucken_IE) { }
          HTMLtimeof = res_timeof;
          whatissaid[res_jsrn] = 'nullstring';	
          update_typing();         
          up();     
   
       }
    }    
	  if(res_typeof=="LAYER"){  
	    if(res_timeof>LAYERtimeof){ 
       whatissaid[res_jsrn] = unescape(res_message);	
       LAYERtimeof = res_timeof;       
       update_typing();
     }
    } 
  }
  }
}

function ExecRes2(textstring){
}

// onmouseovers
 r_req = new Image;
 h_req = new Image;
          
 r_req.src = 'images/requests-lb.jpg';
 h_req.src = 'images/requests-rr.jpg';
          

function ExecRes3(textstring){
 
	if(textstring>0){
	   document.requestsbut.src=h_req.src;
	} else {
	   document.requestsbut.src=r_req.src;	
	}
}


/** * loads a XMLHTTP response into parseresponse * *@param string url to 
request *@see parseresponse() */
function update_xmlhttp() { // account for cache.. 
 
	setTimeout('update_xmlhttp()',3800);
	randu=Math.round(Math.random()*9999); 
	sURL = 'xmlhttp.php'; 
	extra = ""; 
      	 
  sPostData = 'op=yes&externalchats=<?php echo $externalchats;?>&whattodo=messages&rand='+ randu + '&HTML=' + HTMLtimeof + '&LAYER=' + LAYERtimeof + extra;
  //alert(sPostData);  
  fullurl = 'xmlhttp.php?' + sPostData;
  //PostForm(sURL, sPostData)
  // alert(fullurl);  
  GETForm(fullurl);

  
}



</SCRIPT>


<SCRIPT LANGUAGE="JavaScript"  type="text/javascript"> 
NS4 = (document.layers) ? 1 : 0;
IE4 = (document.all) ? 1 : 0;
W3C = (document.getElementById) ? 1 : 0;
 
 document.onfocus = giveasec();
 
var ismac = navigator.platform.indexOf('Mac');
 ismac = 1;  

 function giveasec(){
 
 	   	setTimeout('needreload();',1000);
 }
 
 function up1(){
   var objDiv = document.body;
   objDiv.scrollTop = objDiv.scrollHeight; 
 }
 
 function up(){

  myScroll.refresh();
 
  myScroll.scrollTo(0,myScroll.maxScrollY,'500ms');
 
	}
 	setTimeout('up1();',3000); 
 	setTimeout('up();',5000);  
 	setTimeout('switchtocan();',4000);  
 	setTimeout('defalutcontrols();',4500);  

 setTimeout('update_xmlhttp()',3800);
 setTimeout('anyrequests()',6100);
 
		</SCRIPT>
		
		<SCRIPT type="text/javascript">
myBrowser = new xBrowser(); 
NS4 = (document.layers) ? 1 : 0;
IE4 = (document.all) ? 1 : 0;
W3C = (document.getElementById) ? 1 : 0;	
 
 document.onfocus = anyrequests();

starttyping_layer_exists = false;
var whatissaid  = new Array(100);
for(i=0;i<100;i++){
  whatissaid[i] = 'nullstring';
}

// start up the is typing layer... 
//--------------------------------------------------------------          
function starttyping(){           
 
}
function donothing(){}

function anyrequests(){
	setTimeout('anyrequests()',5100);
	randu=Math.round(Math.random()*9999); 
	sURL = 'xmlhttp.php'; 
	extra = ""; 
      	 
  sPostData = 'op=yes&whattodo=arethererequests&rand='+ randu;
 
  fullurl = 'xmlhttp.php?' + sPostData;
  //PostForm(sURL, sPostData)
  // alert(fullurl);  
  GETForm3(fullurl);

}

<?php 
  $chatstring = "";
  for($i=0; $i<count($chatarray); $i++){   $chatstring .= $chatarray[$i][1] ."-".$chatarray[$i][2]; }  
   print "chatstring = \"$chatstring\";";
   
  ?>           		

function ExecRes4(textstring){ 
	if(textstring>0){
	  window.location.replace('live.php'); 
	}
}

function needreload(){
 	setTimeout('needreload()',4540);
	randu=Math.round(Math.random()*9999); 
	sURL = 'xmlhttp.php'; 
	extra = ""; 
      	 
  sPostData = 'op=yes&whattodo=needreload&chatstring='+ chatstring + '&rand='+ randu;
 
  fullurl = 'xmlhttp.php?' + sPostData;
  GETForm4(fullurl);
}
 	setTimeout('needreload()',5100);
 	
function seeonly(){
		url = 'live.php?cleartonow=1&see=' + selectedchannel;
		window.location.replace(url);
}
function exitchat(){
		url = 'live.php?killchat=1&who=' + selectedid;
		window.location.replace(url);		
}

function color(){
	url = 'chat_color.php?id=' + selectedchannel;
		window.location.replace(url);
}

function newwin(){
	url = 'live.php?see=' + selectedchannel;
  win5 = window.open(url, 'chat54058', 'width=300,height=300,menubar=no,scrollbars=1,resizable=1');
  win5.creator=self; 
}

// update the istyping layer.
//---------------------------------------------------------------
function update_typing(){
 
}
 
function delay(gap){ /* gap is in millisecs */
 var then,now; then=new Date().getTime();
 now=then;
 while((now-then)<gap){  now=new Date().getTime();}
}

ns4 = (document.layers)? true:false;
ie4 = (document.all)? true:false;
readyone = ready = false; // ready for onmouse overs (are the layers known yet)
 
ready = true;


</SCRIPT>
  

 
       <div id="wrapper">
   
      <div id="currentchat">
              	<?php
       	if( count($chatarray) == 0 ){ ?>
                   <br>
       		<center>No Chats in progress... <a href=live.php>Refresh</a></center>
       		<br><br>
       		Please select "<a href=visitors.php>Visitors</a>" to begin a chat or wait
       		for a chat "<a href=requests.php>Request</a>" to come in or
       		go to the "<a href=settings.php>CS Settings</a>" page to enable auto-invite
       		and other settings..
       		<br><br>
       		<?php
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
 if(empty($cellphone)){
  ?>
 
      <font color=#990000><b>You have not <a href=settings.php>entered in your Cell Phone mobile e-mail</a> for chat alerts yet. 
        This is highly recommended so that you can be alerted even when the phone
        is asleep:<br> <a href=settings.php>ADD YOUR MOBILE EMAIL ADDRESS NOW</a></b>
       <br><br>
 	<?php
    }
   } 
 	?>
       	<table width=100%><tr>
         <td width=50%><a href=http://www.craftysyntax.com/iphone/help.php?howto=1><img src=images/help.png width=95 height=37 border=0></a></td>
         <td width=50%><a href=logout.php><img src=images/logout.png width=117 height=30 border=0></a></td>
        </tr>
        </table>       
       		<?php  } else { ?>

      <?php
      $timeof3 = $timeof - 10000; 
      print "<img src=images/blank.gif width=200 height=300 border=0><br>";
      print showmessagesmobile($operator_id,"",$timeof3,$see);	 
 
      
       } ?>       
      </div>    </div>
 
   	<?php   if( count($chatarray) != 0 ){   
 
   	?>
        	<script type="text/javascript"> 
       	  selectedid = <?php echo $chatarray[0][2]; ?>;
       	  selectedchannel = <?php echo $chatarray[0][1]; ?>;
       	  
       	  // onmouseovers
          r_can = new Image;
          h_can = new Image;
          
          r_can.src = 'images/can.gif';
          h_can.src = 'images/can-off.gif';


          function defalutcontrols(){
          	<?php for($i=0; $i<count($chatarray); $i++){ ?>
	          if(see == <?php print $chatarray[$i][1] ?>){
	          	document.chatter.towho.value="<?php print $chatarray[$i][1]."__".$chatarray[$i][2]; ?>";
	          	document.getElementById('currentback').style.backgroundColor = "<?php print $chatarray[$i][0]; ?>";
              selectedid = <?php echo $chatarray[$i][2]; ?>;  
              selectedchannel = <?php echo $chatarray[$i][1]; ?>;
	          }
	          <?php }?>
	                    
          }
          
          function changechatcontrols(){
          	<?php for($i=0; $i<count($chatarray); $i++){ ?>
	          if(document.chatter.towho.value=="<?php print $chatarray[$i][1]."__".$chatarray[$i][2]; ?>"){
	          	document.getElementById('currentback').style.backgroundColor = "<?php print $chatarray[$i][0]; ?>";
              selectedid = <?php echo $chatarray[$i][2]; ?>;  
              selectedchannel = <?php echo $chatarray[$i][1]; ?>;
	          }
	          <?php }?>
	        
	        }
	                    
	        onoroff =2;
	                    
	        function switchtocan(){
	           if(onoroff==1){ 
	           	      onoroff =2;
                 document.canned.src=h_can.src;
	           	  document.getElementById('typemessage').style.visibility = "hidden"; 
                document.getElementById('typemessage').style.display = "none"; 
                document.getElementById('canmessage').style.visibility = "visible"; 
                document.getElementById('canmessage').style.display = "inline"; 
	           	} else {
             	      onoroff =1;
                 document.canned.src=r_can.src;
	           	  document.getElementById('canmessage').style.visibility = "hidden"; 
                document.getElementById('canmessage').style.display = "none"; 
                document.getElementById('typemessage').style.visibility = "visible"; 
                document.getElementById('typemessage').style.display = "inline";                  	  	           		
	           	}  	        	 	        	 		        		        	
	        }  

        function switchwithcan(){

	       	changetothis = document.chatter.canmsg.value;
	       	switchtocan();
	       	document.chatter.comment.value = changetothis;     	
	       } 	    
	 
	 function autofill(num){
 
	       	switchtocan();


<?php 
  $query = "SELECT * FROM livehelp_quick Where typeof!='URL' ORDER by typeof,name ";
  $result = $mydatabase->query($query);
  $j =-1;
  while($row = $result->fetchRow(DB_FETCHMODE_ASSOC)){
    if(note_access($row['visiblity'],$row['department'],$row['user'])){
      $j++;
      $in= $j + 1;
   if($row['typeof'] == "IMAGE"){
   print "if(num == $in){ document.chatter.comment.value= document.chatter.comment.value + '<img src=" . $row['message'] . " >'; document.chatter.editid.value='" . $row['id'] . "';  } \n";	    
   } else {
   print "if(num == $in){ document.chatter.comment.value= document.chatter.comment.value + '" . addslashes(stripslashes(stripslashes($row['message']))) . " ';  } \n";	
   } 
  }
 } ?>
}

function safesend(){
	
 
	randu=Math.round(Math.random()*9999); 
	sURL = 'xmlhttp.php'; 
	extra = ""; 
      	 
  sPostData = 'op=yes&whattodo=postmessage&rand='+ randu + '&channelsplit=' + document.chatter.towho.value + '&comment=' + document.chatter.comment.value;
 
  fullurl = 'xmlhttp.php?' + sPostData;
  //PostForm(sURL, sPostData)
  // alert(fullurl);  
  GETForm2(fullurl);
	document.chatter.comment.value='';
}

</SCRIPT>

<DIV id="currentback" STYLE="background:#<?php echo $chatarray[0][0]; ?>">
      	<form action="javascript:donothing()" name="chatter" onsubmit=safesend()>
      	<Table><tr>
      		<td><a href="javascript:exitchat()"><img src=images/exit.jpg width=30 height=24 border=0></a></td>
      		<td>

      		<select name="towho" style="width:195px;" onchange="changechatcontrols()">
<?php 
   for($i=0; $i<count($chatarray); $i++){
     print "<option value=".$chatarray[$i][1]."__".$chatarray[$i][2].">".$chatarray[$i][3]."</option>\n";
   }
   	?>
      		</select> </td>
      		<td><a href="javascript:seeonly()"><img src=images/eye.jpg width=30 height=24 border=0></a><a href="javascript:color()"><img src=images/color.jpg width=30 height=24 border=0></a></td>
 </tr>
</table>
 
      	<table><tr><td><DIV id="typemessage" name="typemessage" STYLE="visibility:hidden;"><textarea cols=30 rows=1 name="comment" STYLE="width:200px;height:30px;font-size:14px;font-weight:bold;"></textarea></DIV><DIV id="canmessage" name="canmessage"><select name="canmsg" STYLE="width:200px;" onchange=autofill(this.selectedIndex)> 

<option value=-1 ><?php echo $lang['txt27']; ?></option>
<?php 
  $query = "SELECT * FROM livehelp_quick Where typeof!='URL' ORDER by  typeof,name ";
  $result = $mydatabase->query($query);
  $j=0;
  while($row = $result->fetchRow(DB_FETCHMODE_ASSOC)){
   if(note_access($row['visiblity'],$row['department'],$row['user'])){ 
     $j++;
     $in= $j + 1;
     print "<option value=".$row['id'].">".$row['name']."</option>\n";	
  }
} ?>      		
      		</select></DIV></td>
      		<td><a href="javascript:switchtocan()"><img src=images/can-off.gif width=37 height=33 border=0 name="canned"></a></td>
      		<td><a href="javascript:safesend()"><img src=images/send.jpg width=45 height=29 border=0></a></td></tr></table> 
      </form>
 </DIV>
<?php } ?>
    </body>
</html>