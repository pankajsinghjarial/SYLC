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

  $query = "SELECT * FROM livehelp_departments ORDER by website,nameof";
  $res = $mydatabase->query($query);
  ?>
  <table width=555><tr><td>
  <form action=htmltags.php name="myform" method=POST>
  <input type=hidden name=whattodo value=makeit>
  <input type=hidden name=website value=<?php echo intval($UNTRUSTED['website'])?> >
  <br><br><br>
  <b>The recommended settings for generating the HTML code to place on your site are already pre-set below
  	simply click the link below to generate the basic code. If needed, you can change the settings 
  under the Customization Options to modify the code generation </b><br> 
  <font size=+2><a href=javascript:document.myform.submit()>Click here to generate basic HTML code</a></font>
  <br><hr> 
  <font size=+1><b>Customization Options: </b></font>:<br>
  <hr><!--
  <B>Set Fixed position on screen?</b><br>
  When this is checked the live help monitoring icon can be generated at
  a fixed position on the window specified in pixels:
  <input type=checkbox name=setfixed value=YES>SET FIXED position:<br>
  <input type=radio name=setposition value=bottomright> Set to Bottom right of screen<br>
  <input type=radio name=setposition value=custom> Set to Custom Position on screen<br>  
  <br>pixels from top of screen: <input type=text name=toppixel > 
  <br>pixels from right of screen: <input type=text name=rightpixel > 
  <br>live help image height: <input type=text name=helpheight >  
  <br>live help image width: <input type=text name=helpwidth > 
 <br><br>-->
  <b><?php echo $lang['txt113']; ?></b><br>
  <select name=department>
  <?php
  while($row = $res->fetchRow(DB_FETCHMODE_ASSOC)){
    print "<option value=" . $row['recno'];
    if($UNTRUSTED['department'] == $row['recno']) print " SELECTED "; 
    print "> Department named: " . $row['nameof'] . "</option>\n";
  }
   print "<option value=\"\">". $lang['txt114'] ."</option>\n";  
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
    <option value=HTML> <?php echo $lang['txt118']; ?> </option>             
    <option value=TEXT> <?php echo $lang['txt119']; ?> </option> 
  </select><br>
  <img src=images/blank.gif name=typeimage>
  <br>
  <b><?php echo $lang['txt120']; ?></b><br>
   <select name=format onchange=checkformat()>
    <option value=javascript> <?php echo $lang['txt121']; ?></option>
    <option value=nojavascript> <?php echo $lang['txt123']; ?> </option>
    <option value=link> <?php echo $lang['txt124']; ?>  </option>    
   </select><br>
  <img src=images/blank.gif name=formatimage>
  <br>
  <b><?php echo $lang['txt153']; ?></b><br>
  If this option is selected then NO ONLINE/OFFLINE Image will be shown but 
  Operators will be able to monitor and send layer invites to people that are
  online.
  <br>
    <input type=radio name=ishidden value=N CHECKED ><?php echo $lang['txt154']; ?><br><input type=radio name=ishidden value=Y ><?php echo $lang['txt155']; ?>
  <br><br>
 <b> Hide icons if not online: </b><br>
  When no Operator is online and this is selected to YES then The live Help will not show when no operators are online rather 
  then showing the leave a message icon. This options is also set in the Departments settings page but can be overwritten here. <br>   
  Hide icons if not online: <ul>
   <li> <input type=radio name=leaveamessage value=MAYBE CHECKED> use defualt from department settings  </li>
   <li> <input type=radio name=leaveamessage value=NO> <?php echo $lang['YES']; ?> - Hide if not online </li>
   <li> <input type=radio name=leaveamessage value=YES> <?php echo $lang['NO']; ?> - Show leave message icon if not online </li>
 </ul>
  <b>Does the site use Frames?</b><br>
  <input type=radio name=frameparent value=1> <?php echo $lang['YES']; ?>  <input type=radio name=frameparent value=0 CHECKED> <?php echo $lang['NO']; ?><br>
  <br><br>
  <b>Does the site use secure SSL? </b><br>
  <input type=radio name=secure value=1> <?php echo $lang['YES']; ?>  <input type=radio name=secure value=0 CHECKED> <?php echo $lang['NO']; ?><br>
  <br> 
  <b>Load Live Help Image Asynchronously : </b> (Saves page load time) <br> 
  <input type=radio name=dynamic value=1 CHECKED> <?php echo $lang['YES']; ?>  <input type=radio name=dynamic value=0> <?php echo $lang['NO']; ?><br>
  <br> 
  <b>Genereate in a table? </b><br>
  generate the icon and powered by icon in a table (makes it more compact)<br>
  <input type=radio name=usetable value=1 YES> <?php echo $lang['YES']; ?>  <input type=radio name=usetable value=0 CHECKED> <?php echo $lang['NO']; ?><br>  
  <br> 
  <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Credit:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['credit']; ?> </b>
</td></tr></table>
<b>Credit:</b><br>
<input type=radio name=creditline value=""   > Use department default settings<br>
<input type=radio name=creditline value=L  <?php echo $credit_l ?>  > <img src=images/livehelp.gif><br>
<input type=radio name=creditline value=W  <?php echo $credit_w ?>  > <img src=images/livehelp2.gif><br>
<input type=radio name=creditline value=Y  <?php echo $credit_y ?>  > <img src=images/livehelp4.gif><br>
<input type=radio name=creditline value=Z  <?php echo $credit_z ?>  > <img src=images/livehelp5.gif><br>

<input type=radio name=creditline value=L  <?php echo $credit_n ?>  onclick=showbuy()> <b>(none)</b> (REQUIRES CRAFTY SYNTAX UN-BRANDED NO-Backlinks)<img src=images/blank.gif><br>
<SCRIPT type="text/javascript" SRC="javascript/hideshow.js"></SCRIPT>
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
    <b>Set Width and Height of chat window:</b><br>
    Normally the Chat window size is set in the file named
    "windowsize.php" inside the theme files for the template.
    However you can over write these settings here. 
    Leave Blank to use themes setthings (Recommened leave blank)
  <br>
  window width: <input type=text size=5 name=winwidth value=""> height: <input type=text size=5 name=winheight value="">  
  </td></tr>
 
  <tr><td>
    <b><?php echo $lang['txt144']; ?></b>
  </td><td><input type=radio name=set_allow_ip_host_sessions value=1 CHECKED> <?php echo $lang['YES']; ?>  <input type=radio name=set_allow_ip_host_sessions value=0> <?php echo $lang['NO']; ?></td></tr>

  <tr><td colspan=2 bgcolor=<?php echo $color_background;?>>
    <b><?php echo $lang['txt146']; ?></b>
    <?php echo $lang['txt147']; ?>
  </td></tr>
  <tr><td>
  <b><?php echo $lang['txt146']; ?></b>
  </td><td><input type=radio name=set_serversession value=1 CHECKED> <?php echo $lang['YES']; ?>  <input type=radio name=set_serversession value=0> <?php echo $lang['NO']; ?></td></tr>


  <tr><td colspan=2 bgcolor=<?php echo $color_background;?>>
    <b><?php echo $lang['txt174']; ?></b><br>
    <?php echo $lang['txt175']; ?><br>
      <input type=radio name=frameparent2 value=1> <?php echo $lang['YES']; ?>  <input type=radio name=frameparent2 value=0 CHECKED> <?php echo $lang['NO']; ?><br>
  <br><br>
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
      <option value=10 SELECTED> 1 minute</option>
      <option value=7 > 30 seconds</option>
      <option value=-1> do not ping</option>
     </select> 
  </td></tr>
  
  <tr><td colspan=2 bgcolor=<?php echo $color_background;?>>
  <?php echo $lang['txt126']; ?><br>
  </td></tr>
  <tr> <td colspan=2>
  <b><?php echo $lang['txt127']; ?></b><input type=text size=55 name=phpusername value="">
 <br><br>
      
  <b>Strip Query strings ?</b><br>
  <i>When this is set to YES all referer and page requests will not have query strings...
  	Meaning no keywords or any other inputted data will be passed to Live help.
  	This us useful ONLY when there is a lot of regular expressions from
  	modsecurity blocking a lot of requests and causing live help to stop working. <br>
  	<b>Use this if you notice random broken live help online/offline images based on page</b><br>
  	<b>Strip Query string:</b>
  <input type=radio name=filter value=1> <?php echo $lang['YES']; ?>  <input type=radio name=filter value=0 CHECKED> <?php echo $lang['NO']; ?><br>
  <br><br>
</td></tr></table></td></tr></table>
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

	if($UNTRUSTED['ishidden'] == "Y"){
	   $whathtml = $amp . "what=hidden";
	   $amp = "&amp;amp;";
	} else 
	  $whathtml ="";
	
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
  
	if(empty($UNTRUSTED['pingtimes']))  $UNTRUSTED['pingtimes'] = 10;
		
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
 
if($UNTRUSTED['format'] == "javascript"){	  
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
<?php if ( ($UNTRUSTED['ishidden'] != "Y") && ($UNTRUSTED['leaveamessage'] != "NO") && ($UNTRUSTED['dynamic']!=1)  ) { ?>
<?php if ($UNTRUSTED['usetable'] == 1){ ?>
&lt;div id="<?php echo $DIVname; ?>"&gt;&lt;table border="0" cellspacing="0" cellpadding="0"&gt;&lt;tr&gt;&lt;td align="center" valign="top"&gt;&lt;script type="text/javascript" src="<?php echo $webpath; ?>livehelp_js.php?eo=1&amp;amp;<?php echo $relativehtml; ?><?php echo $departmenthtml; ?><?php echo $whathtml; ?><?php echo $whathost; ?><?php echo $whatserversession; ?><?php echo $whatpingtimes; ?><?php echo $frameparent; ?><?php echo $secure; ?><?php echo $dynamic; ?><?php echo $winwidth; ?><?php echo $winheight; ?><?php echo $leaveamessage; ?><?php echo $filter; ?><?php echo $creditlinehtml; ?><?php echo $usernamehtml; ?>"&gt;&lt;/script&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td align="center" valign="top"&gt;&lt;font style="font-family: verdana, helvetica, sans-serif; font-size: 8px; color: #<?php echo $textcolor1; ?>;"&gt;Powered By:&lt;/font&gt;<?php echo $breakbr; ?>&lt;a href="http://www.craftysyntax.com?utm_source=poweredby&utm_campaign=poweredby" alt="Crafty Syntax Live Help" target="_blank" style="font-family: verdana, helvetica, sans-serif; font-size: 10px; color: #<?php echo $textcolor2; ?>; text-decoration: none; font-weight: bold;"&gt;Crafty Syntax&lt;/a&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt;&lt;/div&gt;
<?php } else { ?>
&lt;div id="<?php echo $DIVname; ?>"&gt;&lt;script type="text/javascript" src="<?php echo $webpath; ?>livehelp_js.php?eo=1&amp;amp;<?php echo $relativehtml; ?><?php echo $departmenthtml; ?><?php echo $whathtml; ?><?php echo $whathost; ?><?php echo $whatserversession; ?><?php echo $whatpingtimes; ?><?php echo $frameparent; ?><?php echo $secure ?><?php echo $dynamic ?><?php echo $winwidth ?><?php echo $winheight ?><?php echo $usetable ?><?php echo $leaveamessage ?><?php echo $filter ?><?php echo $creditlinehtml; ?><?php echo $usernamehtml; ?>"&gt;&lt;/script&gt;
<?php if ($UNTRUSTED['dynamic']!=1){ ?>
&lt;br&gt;&lt;font style="font-family: verdana, helvetica, sans-serif; font-size: 8px; color: #<?php echo $textcolor1; ?>;"&gt;Powered By:&lt;/font&gt;<?php echo $breakbr; ?>
&lt;a href="http://www.craftysyntax.com?utm_source=poweredby&utm_campaign=poweredby" alt="Crafty Syntax Live Help" target="_blank" style="font-family: verdana, helvetica, sans-serif; font-size: 10px; color: #<?php echo $textcolor2; ?>; text-decoration: none; font-weight: bold;"&gt;Crafty Syntax&lt;/a&gt;<?php } ?>&lt;/div&gt;
<?php } ?>
<?php } else { 	
	if($UNTRUSTED['leaveamessage'] == "YES"){ $eo = 1; } else { $eo = 0; }	
	?>
&lt;div id="<?php echo $DIVname; ?>"&gt;&lt;script type="text/javascript" src="<?php echo $webpath; ?>livehelp_js.php?eo=<?php echo $eo; ?>&amp;amp;<?php echo $relativehtml; ?><?php echo $departmenthtml; ?><?php echo $whathtml; ?><?php echo $whathost; ?><?php echo $whatserversession; ?><?php echo $whatpingtimes; ?><?php echo $frameparent; ?><?php echo $secure; ?><?php echo $dynamic; ?><?php echo $winwidth; ?><?php echo $winheight; ?><?php echo $leaveamessage; ?><?php echo $filter; ?><?php echo $creditlinehtml; ?><?php echo $usernamehtml; ?>"&gt;&lt;/script&gt;&lt;/div&gt;
<?php } ?> 
</TEXTAREA>
</FORM>
<br><br>

</b></td></tr>
</table><br>
<?php } 

if($UNTRUSTED['format'] == "nojavascript"){
 ?>
<br>
<table width=700 bgcolor=<?php echo $color_alt1;?> border=1>
<tr><td NOWRAP><br><br>
<b>
<form action=htmltad.php>

Click anywhere in this box to select all code.<br>

You may paste this code into any web page or website that 
you wish to monitor and provide Live help for.<br>

For more help with implementing the code, please see our 
<a href=http://www.craftysyntax.com/howto.php target=_blank>How to Page</a><br><br><br>

<textarea name=code cols=90 rows=8  WRAP=OFF  readonly  onclick="this.focus(); this.select();">
 
&lt;div id="<?php echo $DIVname; ?>"&gt;
&lt;a href="<?php echo $webpath; ?>livehelp.php?<?php echo $relativehtml; ?><?php echo $frameparent; ?><?php echo $secure ?><?php echo $dynamic ?><?php echo $winwidth ?><?php echo $winheight ?><?php echo $filter ?><?php echo $departmenthtml; ?><?php echo $whathost; ?><?php echo $whatserversession; ?><?php echo $whatpingtimes; ?><?php echo $usernamehtml; ?>" target="_blank" &gt;&lt;img src="<?php echo $webpath; ?>image.php?<?php echo $departmenthtml; ?><?php print $amp . "what=getstate"; ?>" border=0 &gt;&lt;/a&gt;
&lt;font style="font-family: verdana, helvetica, sans-serif; font-size: 8px; color: #000000;"&gt;Powered By:&lt;/font&gt;
&lt;a href="http://www.craftysyntax.com" alt="Crafty Syntax Live Help" target="_blank" style="font-family: verdana, helvetica, sans-serif; font-size: 10px; color: #11498e; text-decoration: none; font-weight: bold;"&gt;Crafty Syntax&lt;/a&gt;
&lt;/div&gt;

</TEXTAREA>
</FORM>
</b></td></tr></table><br><br>
<?php } 

if($UNTRUSTED['format'] == "link"){
 ?>
<br>
<table width=700 bgcolor=<?php echo $color_alt1;?> border=1>
<tr><td NOWRAP><br><br>
<b>
<form action=htmltad.php>

Click anywhere in this box to select all code.<br>

You may paste this code into any web page or website that 
you wish to monitor and provide Live help for.<br>

For more help with implementing the code, please see our 
<a href=http://www.craftysyntax.com/howto.php target=_blank>How to Page</a><br><br><br>

<textarea name=code cols=90 rows=4  WRAP=OFF readonly  onclick="this.focus(); this.select();">
 <?php echo $webpath; ?>livehelp.php?<?php echo $departmenthtml; ?> 
</TEXTAREA><br>
or as an HTML link:<br>

Click anywhere in this box to select all code.<br>

You may paste this code into any web page or website that 
you wish to monitor and provide Live help for.<br>

For more help with implementing the code, please see our 
<a href=http://www.craftysyntax.com/howto.php target=_blank>How to Page</a><br><br><br>

<textarea name=code2 cols=75 rows=4  WRAP=OFF readonly  onclick="this.focus(); this.select();">
 &lt;a href=<?php echo $webpath; ?>livehelp.php?<?php echo $departmenthtml; ?> target="_blank" &gt; Live Help  &lt;/a&gt;
</TEXTAREA>
</FORM>
</b></td></tr></table><br><br>
<?php } ?>
<b>Want to remove the "Powered By Crafty Syntax Live Help" Link ? <br>
<a href="http://www.craftysyntax.com/go-pro.php?d=<?php echo $CSLH_Config['directoryid'] ?>" target="_blank">CLICK HERE TO GO PRO VERSION !! </a> 
<br>OR
<a href="http://www.craftysyntax.com/unbranded.php?d=<?php echo $CSLH_Config['directoryid'] ?>" target="_blank">CLICK HERE to just remove the powered by links..</a>

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