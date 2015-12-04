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
 
 $selectedtab = "live";
 include "mobileheader.php";
 
 ?>
 <SCRIPT LANGUAGE="JavaScript"  type="text/javascript" SRC="../javascript/xLayer.js"></SCRIPT> 
<SCRIPT LANGUAGE="JavaScript" type="text/javascript"  SRC="../javascript/xBrowser.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" type="text/javascript"  SRC="../javascript/staticMenu.js"></SCRIPT> 
<script language="JavaScript"  type="text/javascript" src="../javascript/dynapi/js/dynlayer.js"></script>
<script language="JavaScript"  type="text/javascript" src="../javascript/xmlhttp.js"></script>
  
<script type="text/javascript"> 
var whatissaid  = new Array(100);
<?php if($UNTRUSTED['cleartonow']==1){ ?>
	HTMLtimeof = <?php print date("YmdHis"); ?>;
 LAYERtimeof = <?php print date("YmdHis"); ?>;
<?php } else { ?>	
var HTMLtimeof = 0;
var LAYERtimeof = 0;
<?php } ?>

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

/** * loads a XMLHTTP response into parseresponse * *@param string url to 
request *@see parseresponse() */
function update_xmlhttp() { // account for cache.. 
 
	setTimeout('update_xmlhttp()',2100);
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
 
 
var ismac = navigator.platform.indexOf('Mac');
 ismac = 1;  
 
 function up(){

  myScroll.refresh();
 
  myScroll.scrollTo(0,myScroll.maxScrollY,'500ms');
 
	}
 	setTimeout('up();',5000);  
 	 	setTimeout('switchtocan();',3000);  
 setTimeout('update_xmlhttp()',4100);
		</SCRIPT>
		
		<SCRIPT type="text/javascript">
myBrowser = new xBrowser(); 
NS4 = (document.layers) ? 1 : 0;
IE4 = (document.all) ? 1 : 0;
W3C = (document.getElementById) ? 1 : 0;	
 
starttyping_layer_exists = false;
var whatissaid  = new Array(100);
for(i=0;i<100;i++){
  whatissaid[i] = 'nullstring';
}

// start up the is typing layer... 
//--------------------------------------------------------------          
function starttyping(){           
 
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
          <br><br><br><br>
       		No Chats currently in progress... 
       		<br><br><br><br>
       		Please select "<a href=visitors.php>Visitors</a>" to begin a chat or wait
       		for a chat "<a href=request.php>Request</a>" to come in Or
       		go to the "<a href=settings.php>Settings</a>" page to enable auto-invite
       		and Phone text messageing.
       		<pre>
       		
       		
       	</pre>
       		<?php  } else { ?>
           <table width=100% bgcolor=#FFFF99><tr><td>
         1	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFFFF><tr><td>
         2	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFF99><tr><td>
         	3 this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFFFF><tr><td>
         4	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFF99><tr><td>
        5 	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFFFF><tr><td>
         6	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFF99><tr><td>
         7	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFFFF><tr><td>
        8 	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFF99><tr><td>
         9	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFFFF><tr><td>
         10	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFF99><tr><td>
         11	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
                   <table width=100% bgcolor=#FFFFFF><tr><td>
         12	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table>    
           <table width=100% bgcolor=#000000><tr><td>
         13	this is a testthis is a testthis is a testthis is a testthis is a testthis is a test
        </td></tr></table> 
      <?php
      print "sho messages for $operator_id  $timeof $see ";
      
      print str_replace("width=100%","width=200",showmessages($operator_id,"",$timeof,$see));	 
       } ?>       
      </div>    </div>
 
   	<?php   if( count($chatarray) != 0 ){   
 
   	?>
        	<script type="text/javascript"> 
       	  selectedid = <?php echo $chatarray[0][2]; ?>;
       	  
       	  // onmouseovers
          r_can = new Image;
          h_can = new Image;
          r_can.src = 'images/can.gif';
          h_can.src = 'images/can-off.gif';



          function changechatcontrols(){
          	<?php for($i=0; $i<count($chatarray); $i++){ ?>
	          if(document.chatter.towho.value=="<?php print $chatarray[$i][1]."__".$chatarray[$i][2]; ?>"){
	          	document.getElementById('currentback').style.backgroundColor = "<?php print $chatarray[$i][0]; ?>";
              selectedid = <?php echo $chatarray[$i][2]; ?>;  
                     
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

		 </SCRIPT>
		     <DIV id="currentback" STYLE="background:#<?php echo $chatarray[0][0]; ?>">
      	<form action=admin.php name="chatter">
      	<Table><tr><td>
      		<select name="towho" style="width:200px;" onchange="changechatcontrols()">
<?php 
   for($i=0; $i<count($chatarray); $i++){
     print "<option value=".$chatarray[$i][1]."__".$chatarray[$i][2].">".$chatarray[$i][3]."</option>\n";
   }
   	?>
      		</select> </td>
      		<td><a href="javascript:seeonly()"><img src=images/eye.jpg width=30 height=24 border=0></a><a href="javascript:newwin()"><img src=images/newwin.jpg width=30 height=24 border=0></a><a href="javascript:color()"><img src=images/color.jpg width=30 height=24 border=0></a>
 </td></tr>
      <tr><td colspan=2>
      	
      	<table><tr><td><a href="javascript:switchtocan()"><img src=images/can-off.gif width=37 height=33 border=0 name="canned"></a></td><td><DIV id="typemessage" name="typemessage" STYLE="visibility:hidden; "><input type=text name="comment" STYLE="width:200px;"></DIV><DIV id="canmessage" name="canmessage"><select name="canmsg" STYLE="width:200px;" onchange=autofill(this.selectedIndex)> 

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
      		</select></DIV></td><td><a href="javascript:savesubmit()"><img src=images/send.jpg width=45 height=29 border=0></a></td></tr></table></td></tr></table>
          	
      </form>
 </DIV>
<?php } ?>
    </body>
</html>