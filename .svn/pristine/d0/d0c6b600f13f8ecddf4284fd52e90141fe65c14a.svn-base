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
require_once("admin_common.php");
validate_session($identity);
  
// get the info of this user.. 
$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
  $people = $mydatabase->query($query);
  $people = $people->fetchRow(DB_FETCHMODE_ASSOC);
  $myid = $people['user_id'];
  $channel = $people['onchannel'];
  $show_arrival = $people['show_arrival']; 
  $user_alert = $people['user_alert'];
  $isadminsetting = $people['isadmin'];

$lastaction = date("Ymdhis");
$startdate =  date("Ymd");

if(!(isset($UNTRUSTED['department']))) { $UNTRUSTED['department'] = ""; }
if(!(isset($UNTRUSTED['createnew']))) { $UNTRUSTED['createnew'] = ""; }
if(!(isset($UNTRUSTED['createit']))) { $UNTRUSTED['createit'] = ""; }
if(!(isset($UNTRUSTED['removeit']))) { $UNTRUSTED['removeit'] = ""; }
if(!(isset($UNTRUSTED['updateit']))) { $UNTRUSTED['updateit'] = ""; }
 
if(!(isset($UNTRUSTED['edit']))) { $UNTRUSTED['edit'] = ""; }
if(!(isset($UNTRUSTED['html']))) { $UNTRUSTED['html'] = ""; }
if(!(isset($UNTRUSTED['help']))) { $UNTRUSTED['help'] = ""; }
if(!(isset($UNTRUSTED['type']))) { $UNTRUSTED['type'] = ""; }
if(!(isset($UNTRUSTED['format']))) { $UNTRUSTED['format'] = ""; }
if(!(isset($UNTRUSTED['filter']))) { $UNTRUSTED['filter'] = ""; }

if( ($UNTRUSTED['type'] == "HTML") && ($UNTRUSTED['format']=="javascript") )
   $UNTRUSTED['format']="nojavascript";
   
   
$credit_w = "";
$credit_l = "";
$credit_n = "";
$credit_z = "";
$credit_y = "";
   
if(empty($UNTRUSTED['department'])){ 
	 $department = 0; 
	 $credit_w = " CHECKED ";
} else { 
	 $department = $UNTRUSTED['department']; 
   // look up department credit line:
   $sqlquery = "SELECT creditline,theme FROM livehelp_departments WHERE recno='$department' ";
   $data_d = $mydatabase->query($sqlquery);  
   $department_a = $data_d->fetchRow(DB_FETCHMODE_ORDERED);
   $creditline  = $department_a[0];
   $theme  = $department_a[1];
   if(($department_a['creditline'] == "W") || ($department_a['creditline'] == "") ){ $credit_w = " CHECKED "; } 
   if($department_a['creditline'] == "L"){ $credit_l = " CHECKED "; }
   if($department_a['creditline'] == "N"){ $credit_n = " CHECKED "; }
   if($department_a['creditline'] == "Z"){ $credit_z = " CHECKED "; }
   if($department_a['creditline'] == "Y"){ $credit_y = " CHECKED "; }
}

?>
<link title="new" rel="stylesheet" href="style.css" type="text/css">
  <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['charset']; ?>" >
<body bgcolor=<?php echo $color_background;?>><center>
<?php
if(empty($UNTRUSTED['whattodo'])){

  $query = "SELECT * FROM livehelp_websites  ";
  $res = $mydatabase->query($query);
  ?>
  <table width=555><tr><td>
  <form action=insite.php name="myform" method=POST>
  <input type=hidden name=whattodo value=makeit>
  <input type=hidden name=website value=<?php echo intval($UNTRUSTED['website'])?> >
  <br><br><br>
  <b>This function allows the generation of live help as an in-site 
  	live help chat. The Generated Live Help floats on the bottom
  	right side of the screen you generate and place this code on
  	and allows chats to take place in-site without the need of
  	a pop-up window. </font><br>
  	 <font size=+2><a href=javascript:document.myform.submit()>Click here to generate basic IN-SITE code</a></font>
  	 
  <br><hr> 
  <font size=+1><b>Customization Options: </b></font>:<br>
  <hr>
  <b>Website to Generate for:</b><br>
  <select name=website>
  <?php
  while($row = $res->fetchRow(DB_FETCHMODE_ASSOC)){
    print "<option value=" . $row['id'];
    if($UNTRUSTED['website'] == $row['id']) print " SELECTED "; 
    print "> Website named: " . $row['site_name'] . "</option>\n";
  }
 
  $domainname_a = explode("/",$CSLH_Config['webpath']);
  if(empty($domainname_a[2])) 
     $domainname_a[2] = $domainname_a[0];  
  $domainname = "http://" . $domainname_a[2];
  $domainname_a = explode("/",$CSLH_Config['s_webpath']);
  if(empty($domainname_a[2])) 
     $domainname_a[2] = $domainname_a[0];  
  $domainname_s = "http://" . $domainname_a[2];  
  ?>
  </select><br><br>
  
  <b><?php echo $lang['txt115']; ?>:</b><br>
  <SCRIPT type="text/javascript">
   blanknote = new Image;
   rednote = new Image;
 
   blanknote.src = 'images/blank.gif';
   rednote.src = 'images/notracking.gif';   
 
   function checktype(){
  		if ( (document.myform.type.value=="HTML") || (document.myform.type.value=="TEXT"))
  	    document.typeimage.src = rednote.src;
  	  else
  	    document.typeimage.src = blanknote.src;  	  	
  	}
   function checkformat(){
  		if (document.myform.format.value!="javascript")
  	    document.formatimage.src = rednote.src;
  	  else
  	    document.formatimage.src = blanknote.src;  	  	
  	}
  </SCRIPT>
  <select name=type onchange=checktype()>
    <option value=absolute>- - - -</option> 
    <option value=relative> <?php echo $lang['txt116']; ?> <?php echo $domainname; ?> </option> 
    <option value=absolute> <?php echo $lang['txt117']; ?> <?php echo $domainname; ?> </option>    

  </select><br>
  <img src=images/blank.gif name=typeimage>
  
<SCRIPT type="text/javascript">
function showbuy(){
	makeVisible ('buyunbranded');
}
 
</SCRIPT>
<div id="buyunbranded" STYLE="display:none">
	<table border=1 STYLE="border-style: dashed">
<tr><td> 
	 <blockquote>
 
Client Site Unbranding Server Lifetime-License:<br>
<br>
    For one Crafty Syntax Live Help Server installation (all operators)<br>
    All future updates of this option are included<br>
    Can be used with any (future) version of Crafty Syntax Live Help<br>
<br>
Key Features:  
    Remove (or change) the Crafty Syntax Live Help Backlink from the customer side chat window<br>
    Remove the Crafty Syntax Live Help Backlink from all emails sent by Crafty Syntax Live Help<br>
    Remove the Crafty Syntax Live Help Backlink from all Overlay boxes<br>
    Removes the Crafty Syntax Live Help "Donation" page that opens up every 10th login.<br>
<a href=http://www.craftysyntax.com/unbranded.php target=_blank><font size=+1>CLICK HERE TO ORDER NOW !! </font></a>	 	
	 	
	 	
	 	
	</blockquote>
</td></tr></table>
	
</div>
  
  
  
  
  <input type=submit value=<?php echo $lang['CREATE']; ?>><bR><br>
    <hr>
  <font size=+1><b><?php echo $lang['txt125']; ?></b></font>:<br>
   <hr>
  <table>
  <tr><td colspan=2 bgcolor=<?php echo $color_background;?>>
    <b><?php echo $lang['txt144']; ?></b>
    <?php echo $lang['txt145']; ?>
  </td></tr>
  
    
      
  <tr><td colspan=2 bgcolor=<?php echo $color_background;?>>
    <b><?php echo $lang['txt150']; ?></b>
    <?php echo $lang['txt151']; ?>
  </td></tr>
  <tr><td colspan=2>
    <?php echo $lang['txt152']; ?>:
     <select name=pingtimes>
      <option value=240> 16 minutes</option>
      <option value=120> 8 minutes</option>
      <option value=60 > 4 minutes</option>
      <option value=30 > 2 minutes</option>
      <option value=15 SELECTED> 1 minute</option>
      <option value=7 > 30 seconds</option>
      <option value=-1> do not ping</option>
     </select> 
  </td></tr>
  
  
 </table></td></tr></table>
  <input type=submit value=<?php echo $lang['CREATE']; ?>><bR><br>
  </form>
  <?php
  exit;
}  
 
if($UNTRUSTED['type']=="TEXT")
  $format="link";


// if we have a department or not.
if(!(empty($UNTRUSTED['department']))){ 
	$departmenthtml = "department=".$UNTRUSTED['department']; $amp = "&amp;amp;"; 
 } else { 
 	$amp = ""; $departmenthtml = "website=".$UNTRUSTED['website']; $amp = "&amp;amp;";  
 }

// full path.
if(empty($webpath)){ $webpath = $CSLH_Config['webpath']; }
if($UNTRUSTED['secure']==1) { $webpath = $CSLH_Config['s_webpath']; }

// shorten to relative path if needed:
$relativehtml = "";
if($UNTRUSTED['type'] == "relative"){
	   $relativehtml = "relative=Y&amp;amp;"; 
	   $amp = "&amp;amp;";	
  	 // get the domain..
  	 $domainname_a = explode("/",$CSLH_Config['webpath']);
     if(empty($domainname_a[2])) 
        $domainname_a[2] = $domainname_a[0]; 
     $domainname = "http://" . $domainname_a[2];
     if (isset($_SERVER["HTTPS"] ) && stristr($_SERVER["HTTPS"], "on")) {
       $webpath = str_replace($domainname,"",$CSLH_Config['s_webpath']);
     } else {
      $webpath = str_replace($domainname,"",$CSLH_Config['webpath']);  
     }    
	}  

 
	
	if($UNTRUSTED['set_allow_ip_host_sessions']==0){ 
     $whathost = $amp . "allow_ip_host_sessions=0";
	   $amp = "&amp;amp;";
  } else
     $whathost = "";

	if($UNTRUSTED['set_serversession']==1){ 
     $whatserversession = $amp . "serversession=1";
	   $amp = "&amp;amp;";
  } else {
     $whatserversession = $amp . "serversession=0";
	   $amp = "&amp;amp;";  
  }
  
	if(empty($UNTRUSTED['pingtimes']))  $UNTRUSTED['pingtimes'] = 15;
		
	if(!(empty($UNTRUSTED['pingtimes']))){ 
     $whatpingtimes = $amp . "pingtimes=". $UNTRUSTED['pingtimes'];
	   $amp = "&amp;amp;";
  } else
     $whatpingtimes = "";    

	if( ($UNTRUSTED['frameparent']==1) || ($UNTRUSTED['frameparent2']==1) ){ 
     $frameparent = $amp . "frameparent=Y";
	   $amp = "&amp;amp;";
  } else
     $frameparent = "";   	

	if($UNTRUSTED['secure']==1){ 
     $secure = $amp . "secure=Y";
	   $amp = "&amp;amp;";
  } else
     $secure = "";  	

	if($UNTRUSTED['dynamic']==1){ 
     $dynamic = $amp . "dynamic=Y";
	   $amp = "&amp;amp;";
  } else
     $dynamic = "";  

	if(!(empty($UNTRUSTED['creditline']))){ 
     $creditlinehtml = $amp . "creditline=" . $UNTRUSTED['creditline'];
	   $amp = "&amp;amp;";
  } else
     $creditlinehtml = "";       
     	
		
	if($UNTRUSTED['filter']==1){ 
     $filter = $amp . "filter=Y";
	   $amp = "&amp;amp;";		
  } else
     $filter = "";  	
    
	if(!(empty($UNTRUSTED['winwidth']))){
     $winwidth = $amp . "winwidth=" . $UNTRUSTED['winwidth'];
	   $amp = "&amp;amp;";		
  } else
     $winwidth = "";  	
	if(!(empty($UNTRUSTED['winheight']))){
     $winheight = $amp . "winheight=" . $UNTRUSTED['winheight'];
	   $amp = "&amp;amp;";		
  } else
     $winheight = "";  	                 

	if($UNTRUSTED['leaveamessage']!="MAYBE"){
     $leaveamessage = $amp . "leaveamessage=" . $UNTRUSTED['leaveamessage'];
	   $amp = "&amp;amp;";		
  } else
     $leaveamessage = "";            
 
	if($UNTRUSTED['usetable']!=1){ 
     $usetable = $amp . "usetable=N";
	   $amp = "&amp;amp;";		
  } else
     $usetable = "";  	
            
 
	if(!(empty($UNTRUSTED['phpusername'])))
	  $usernamehtml = $amp . "username=". $UNTRUSTED['phpusername'];
	else
	  $usernamehtml = "";	
 
  $DIVname = "craftysyntax";
  if ($department != 0){ 
    $DIVname = "craftysyntax_" . $department;	
  }  
 
 if($UNTRUSTED['creditline'] == "L"){
   $textcolor1 = "000000";
   $textcolor2 = "11498e";   
   $breakbr = "&lt;br&gt;";
 }
  if($UNTRUSTED['creditline'] == "W"){
   $textcolor1 = "000000";
   $textcolor2 = "11498e"; 
   $breakbr = "";     
 }
  if($UNTRUSTED['creditline'] == "Y"){
   $textcolor1 = "FFFFFF";
   $textcolor2 = "FFFFDC";   
   $breakbr = "";   
 }
 if($UNTRUSTED['creditline'] == "Z"){
   $textcolor1 = "FFFFFF";
   $textcolor2 = "FFFFDC";   
   $breakbr = "&lt;br&gt;";   
 }
 
 
?>
<table bgcolor=<?php echo $color_background;?>>
<tr><td NOWRAP><br><br>
<b>
<form action=htmltad.php>

Click anywhere in this box to select all code.<br>

You may paste this code into any web page or website that 
you wish to monitor and provide Live help for.<br>

For more help with implementing the code, please see our 
<a href=http://www.craftysyntax.com/howto.php target=_blank>How to Page</a><br><br><br>

<textarea name=code cols=90 rows=8 class=nowrap WRAP=OFF readonly  onclick="this.focus(); this.select();"> 
&lt;link type="text/css" rel="stylesheet" media="all" href="<?php echo $webpath; ?>insite/sp_style.php" /&gt; 
&lt;script type="text/javascript"&gt;
	var CSLHDir = "<?php echo $webpath; ?>insite/";
	var CSLHDept = "<?php $UNTRUSTED['department']; ?>";	
	AllowVisitorChats='no';
&lt;/script&gt; 
&lt;script src="<?php echo $webpath; ?>insite/jquery.js"&gt;&lt;/script&gt; 
&lt;script src="<?php echo $webpath; ?>insite/spanel.js"&gt;&lt;/script&gt;
</TEXTAREA>
</FORM>
<br><br>

</b></td></tr>
</table><br>
 
 
<pre>


</pre>
<a href=javascript:history.go(-1)> <?php echo $lang['Back']; ?></a>
<pre>


</pre>
<font size=-2>
<!-- Note if you remove this line you will be violating the license even if you have modified the program -->
<a href=http://www.craftysyntax.com/ target=_blank>Crafty Syntax Live Help</a> &copy; 2003 - 2012 by <a href=http://www.craftysyntax.com/EricGerdes/ target=_blank>Eric Gerdes</a>  
<br>
CSLH is  Software released 
under the <a href=http://www.gnu.org/copyleft/gpl.html target=_blank>GNU/GPL license</a>  
</font>