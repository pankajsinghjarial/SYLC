<?php
//===========================================================================
//* --    ~~    Crafty Syntax Live Help    ~~    -- *
//===========================================================================
//     URL:   http://www.craftysyntax.com/    EMAIL: livehelp@craftysyntax.com
//   Copyright (C) 2003-2012 Eric Gerdes   (http://www.craftysyntax.com )
// ----------------------------------------------------------------------------
// Please check http://www.craftysyntax.com/ or REGISTER your program for updates
// --------------------------------------------------------------------------
// NOTICE: Do NOT remove the copyright and/or license information any files. 
//   doing so will automatically terminate your rights to use program.
//   If you change the program you MUST clause your changes and note
//   that the original program is Crafty Syntax Live help or you will 
//   also be terminating your rights to use program and any segment 
//   of it.  
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
$isadminsetting = $people['isadmin'];
if($isadminsetting != "Y"){
 print $lang['txt41'];
if(!($serversession))
   $mydatabase->close_connect();
 exit;	
}
$lastaction = date("Ymdhis");
$startdate =  date("Ymd");

if(!(isset($UNTRUSTED['action']))){ $UNTRUSTED['action']=""; }
 
if($UNTRUSTED['action'] == "update"){
	
	 if(!(preg_match("/http/",$UNTRUSTED['newwebpath'])))
	   $UNTRUSTED['newwebpath'] = "http://" . $UNTRUSTED['newwebpath'];
	 if(!(preg_match("/http/",$UNTRUSTED['news_webpath'])))
	   $UNTRUSTED['news_webpath'] = "https://" . $UNTRUSTED['news_webpath'];
   if($UNTRUSTED['news_webpath'] == "https://")
$UNTRUSTED['news_webpath'] = $UNTRUSTED['newwebpath'];
	   	   
   $lastchar = substr($UNTRUSTED['newwebpath'],-1);
   if($lastchar != "/"){ $UNTRUSTED['newwebpath'] .= "/"; }
   $lastchar = substr($UNTRUSTED['news_webpath'],-1);
   if($lastchar != "/"){ $UNTRUSTED['news_webpath'] .= "/"; }    
   if(empty($UNTRUSTED['newmaxexe']))
   	 $UNTRUSTED['newmaxexe'] = 90;   	 
   if(empty($UNTRUSTED['newrefreshrate']))
   	 $UNTRUSTED['newrefreshrate'] = 1;    
   if( ($CSLH_Config['chatmode'] != $UNTRUSTED['new_chatmode']))    
 $newshow_typing = "Y"; 
   if($UNTRUSTED['ppbutton'] == "Y")  { $pbutt = "Y"; } else { $pbutt = "N"; }
   if($UNTRUSTED['helpbutton'] == "Y")  { $hbutt = "Y"; } else { $hbutt = "N"; }
   if($UNTRUSTED['fbbutton'] == "Y")  { $fbbutt = "Y"; } else { $fbbutt = "N"; }
   if($UNTRUSTED['twbutton'] == "Y")  { $twbutt = "Y"; } else { $twbutt = "N"; }   
   $everythingelse = $pbutt . $hbutt . $fbbutt . $twbutt;
   
 
   $chatcolors = $UNTRUSTED['channelcolor50'] . "," . $UNTRUSTED['channelcolor51'] . "," . $UNTRUSTED['channelcolor52'] . "," . $UNTRUSTED['channelcolor53'] . "," . $UNTRUSTED['channelcolor54'] . "," . $UNTRUSTED['channelcolor55'] . "," . $UNTRUSTED['channelcolor56'] . "," . $UNTRUSTED['channelcolor57'] . "," . $UNTRUSTED['channelcolor58'] . "," . $UNTRUSTED['channelcolor59'] . "," . $UNTRUSTED['channelcolor60'] . "," . $UNTRUSTED['channelcolor61'];

   $chatcolors = $chatcolors . ";" . $UNTRUSTED['clientscolor100'] . "," . $UNTRUSTED['clientscolor101'] . "," . $UNTRUSTED['clientscolor102'] . "," . $UNTRUSTED['clientscolor103'] . "," . $UNTRUSTED['clientscolor104'] . "," . $UNTRUSTED['clientscolor105'] . "," . $UNTRUSTED['clientscolor106'] . "," . $UNTRUSTED['clientscolor107'] . "," . $UNTRUSTED['clientscolor108'] . "," . $UNTRUSTED['clientscolor109'] . "," . $UNTRUSTED['clientscolor110'] . "," . $UNTRUSTED['clientscolor111'];
   
   $chatcolors = $chatcolors . ";" .  $UNTRUSTED['operatorscolor150'] . "," . $UNTRUSTED['operatorscolor151'] . "," . $UNTRUSTED['operatorscolor152'] . "," . $UNTRUSTED['operatorscolor153'] . "," . $UNTRUSTED['operatorscolor154'] . "," . $UNTRUSTED['operatorscolor155'] . "," . $UNTRUSTED['operatorscolor156'] . "," . $UNTRUSTED['operatorscolor157'] . "," . $UNTRUSTED['operatorscolor158'] . "," . $UNTRUSTED['operatorscolor159'] . "," . $UNTRUSTED['operatorscolor160'] . "," . $UNTRUSTED['operatorscolor161'];
   
    $new_floatxy = $UNTRUSTED['floatx'] . "|" . $UNTRUSTED['floaty'];


   $query = "UPDATE livehelp_config 
  SET 
    refreshrate='". filter_sql($UNTRUSTED['newrefreshrate'])."',
    maxexe=".intval($UNTRUSTED['newmaxexe']).",
    operatorstimeout=".intval($UNTRUSTED['newoperatorstimeout']).",
    operatorssessionout=".intval($UNTRUSTED['newoperatorssessionout']).",
    speaklanguage='".filter_sql($UNTRUSTED['newspeaklanguage'])."',
    s_webpath='".filter_sql($UNTRUSTED['news_webpath'])."',
    webpath='".filter_sql($UNTRUSTED['newwebpath'])."',
    show_typing='".filter_sql($UNTRUSTED['newshow_typing'])."',
    offset=".filter_sql($UNTRUSTED['newoffset']).",
    chatmode='".filter_sql($UNTRUSTED['new_chatmode'])."',
    ignoreips='".filter_sql($UNTRUSTED['ignoreips'])."',
    ignoreagent='".filter_sql($UNTRUSTED['ignoreagent'])."',
    tracking='".filter_sql($UNTRUSTED['tracking'])."',
    colorscheme='".filter_sql($UNTRUSTED['colorscheme'])."',
    gethostnames='".filter_sql($UNTRUSTED['gethostnames'])."',
    showgames='".filter_sql($UNTRUSTED['showgames'])."',
    usertracking='".filter_sql($UNTRUSTED['usertracking'])."',
    showdirectory='".filter_sql($UNTRUSTED['showdirectory'])."',  
    resetbutton='".filter_sql($UNTRUSTED['resetbutton'])."',  
    reftracking='".filter_sql($UNTRUSTED['reftracking'])."',
    keywordtrack='".filter_sql($UNTRUSTED['keywordtrack'])."', 
    rememberusers='".filter_sql($UNTRUSTED['rememberusers'])."',   
    smtp_host='".filter_sql($UNTRUSTED['new_smtp_host'])."', 
    smtp_username='".filter_sql($UNTRUSTED['new_smtp_username'])."', 
    smtp_password='".filter_sql($UNTRUSTED['new_smtp_password'])."', 
    smtp_portnum='".filter_sql($UNTRUSTED['new_smtp_portnum'])."', 
    showoperator='".filter_sql($UNTRUSTED['new_showoperator'])."',
    owner_email='".filter_sql($UNTRUSTED['new_owner_email'])."', 
    usecookies='".filter_sql($UNTRUSTED['new_usecookies'])."',   
    theme='".filter_sql($UNTRUSTED['new_theme'])."',
    everythingelse='".filter_sql($everythingelse)."',   
    chatcolors='".$chatcolors."',
    floatxy='".filter_sql($new_floatxy)."',   
    sessiontimeout='".filter_sql($UNTRUSTED['new_sessiontimeout'])."', 
    maxrequests='".intval($UNTRUSTED['new_maxrequests'])."',           
    site_title='".filter_sql($UNTRUSTED['newsite_title'])."'";
    $mydatabase->query($query);
 
    print "<font color=007700 size=+2>" . $lang['txt63'] . "</font>";  
    print "<SCRIPT type=\"text/javascript\"> window.parent.location=\"admin.php?page=mastersettings.php&tab=settings\"; </SCRIPT>";
    print "<a href=admin.php?page=mastersettings.php&tab=settings>".$lang['txt186']."</a>";
    exit;   
 }
?>
<link title="new" rel="stylesheet" href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['charset']; ?>" >
<body bgcolor=<?php echo $color_background;?> ><center>
<?php
$query = "SELECT * FROM livehelp_config";
$data = $mydatabase->query($query);
$data = $data->fetchRow(DB_FETCHMODE_ASSOC);
$offset = $data['offset'];

if($data['use_flush'] == "YES"){
$continuous = " SELECTED ";
$refresh = "";
} else {
$continuous = "";
$refresh = " SELECTED ";	
}

if($data['show_typing'] == "N"){
  $typing_n = " CHECKED ";
  $typing_y = "";	 
} else {
  $typing_y = " CHECKED ";
  $typing_n = "";
}

if($data['usecookies'] == "N"){
  $cookies_n = " CHECKED ";
  $cookies_y = "";	 
} else {
  $cookies_y = " CHECKED ";
  $cookies_n = "";
}

if($data['gethostnames'] == "N"){
 $gethostnames_n = " CHECKED ";	
 $gethostnames_y = "  ";
} else {
 $gethostnames_y = " CHECKED ";	
 $gethostnames_n = "  ";
}

if($data['tracking'] == "N"){
 $tracking_n = " CHECKED ";	
 $tracking_y = "  ";
} else {
 $tracking_y = " CHECKED ";	
 $tracking_n = "  ";
}

if($data['showgames'] == "N"){
 $showgames_n = " CHECKED ";	
 $showgames_y = "  ";
} else {
 $showgames_y = " CHECKED ";	
 $showgames_n = "  ";
}

if($data['showdirectory'] == "N"){
 $showdirectory_n = " CHECKED ";	
 $showdirectory_y = "  ";
} else {
 $showdirectory_y = " CHECKED ";	
 $showdirectory_n = "  ";
} 

if($data['usertracking'] == "N"){
 $usertracking_n = " CHECKED ";	
 $usertracking_y = "  ";
} else {
 $usertracking_y = " CHECKED ";	
 $usertracking_n = "  ";
} 

if($data['resetbutton'] == "N"){
 $resetbutton_n = " CHECKED ";	
 $resetbutton_y = "  ";
} else {
 $resetbutton_y = " CHECKED ";	
 $resetbutton_n = "  ";
} 

if($data['keywordtrack'] == "N"){
 $keywordtrack_n = " CHECKED ";	
 $keywordtrack_y = "  ";
} else {
 $keywordtrack_y = " CHECKED ";	
 $keywordtrack_n = "  ";
} 

if($data['reftracking'] == "N"){
 $reftracking_n = " CHECKED ";	
 $reftracking_y = "  ";
} else {
 $reftracking_y = " CHECKED ";	
 $reftracking_n = "  ";
}     

if($data['rememberusers'] == "N"){
 $rememberusers_n = " CHECKED ";	
 $rememberusers_y = "  ";
} else {
 $rememberusers_y = " CHECKED ";	
 $rememberusers_n = "  ";
} 

if(substr($CSLH_Config['everythingelse'],0,1) == "N"){
 $ppbutton_n = " CHECKED ";	
 $ppbutton_y = "  ";
} else {
 $ppbutton_y = " CHECKED ";	
 $ppbutton_n = "  ";
} 

if(substr($CSLH_Config['everythingelse'],1,1) == "N"){
 $helpbutton_n = " CHECKED ";	
 $helpbutton_y = "  ";
} else {
 $helpbutton_y = " CHECKED ";	
 $helpbutton_n = "  ";
} 

if(substr($CSLH_Config['everythingelse'],2,1) == "N"){
 $fbbutton_n = " CHECKED ";	
 $fbbutton_y = "  ";
} else {
 $fbbutton_y = " CHECKED ";	
 $fbbutton_n = "  ";
} 

if(substr($CSLH_Config['everythingelse'],3,1) == "N"){
 $twbutton_n = " CHECKED ";	
 $twbutton_y = "  ";
} else {
 $twbutton_y = " CHECKED ";	
 $twbutton_n = "  ";
} 

?>
<table width=600<tr bgcolor=DDDDDD><td>
<b><?php echo $lang['settings']; ?>:</b></td></tr>
<tr bgcolor=FFFFFF><td>
<form action=mastersettings.php method=post name=configform>
<input type=hidden name=action value=update>
 
  <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Max requests:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 To save resources and to avoid robots any user who goes
 over this limit is stopped from making any more requests to the
 live help icon. Note a single page can generate up to 15 requests 
</td></tr></table>
<b>maxrequests:</b>
  <select name=new_maxrequests>
  	 <option value="99999" <?php if($CSLH_Config['maxrequests'] == 99999) { echo " selected "; } ?> >NO LIMIT</option>
  	 <option value="100" <?php if($CSLH_Config['maxrequests'] == 100) { echo " selected "; } ?> >-- LIMIT: --</option>  	 
  	<?php for ($i=100; $i<2500; $i=$i+5){ ?>
  	 <option value="<?php echo $i; ?>" <?php if($CSLH_Config['maxrequests'] == $i) { echo " selected "; } ?> > <?php echo $i ?></option>
  	<?php } ?>
 
  </select>
<br><br>    
  
<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Show Operator Image in Template:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 If Checked then the Image of the operator will be shown in the template
 if it is not checked it will not show.. 
</td></tr></table>
<b>Show operator in template:</b>
  <select name=new_showoperator>
  	 <option value="Y" <?php if($CSLH_Config['showoperator']=="Y") { echo " selected "; } ?> > YES </option>
  	 <option value="N" <?php if($CSLH_Config['showoperator']=="N") { echo " selected "; } ?> > NO </option>  	 
  </select>
  
  

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt74']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt75']; ?>
</td></tr></table>
<b>HTTP:</b><input type=text name=newwebpath value="<?php echo $CSLH_Config['webpath']; ?>" size=55><br>
<b>HTTPS:</b><input type=text name=news_webpath value="<?php echo $CSLH_Config['s_webpath']; ?>" size=55><br>


<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>SMTP Settings:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 If the following are set Crafty Syntax will use a socket connection
 for SMTP rather then the php mail() function. Use this if you
 are having trouble sending mail in the leave a message section
 of the site. Leave "SMTP Host" blank to use built in php mail() 
 function. It is recommended to leave these blank
</td></tr></table>
<table>
	<tr><td><b>SMTP Host:</b></td><td><input type=text name=new_smtp_host value="<?php echo $CSLH_Config['smtp_host']; ?>" size=45><br>
		if using ssl add ssl:// in front of hostname such as ssl://smtp.gmail.com </td></tr>
	<tr><td><b>SMTP username:</b></td><td><input type=text name=new_smtp_username value="<?php echo $CSLH_Config['smtp_username']; ?>" size=35></td></tr>
	<tr><td><b>SMTP password:</b></td><td><input type=password name=new_smtp_password value="<?php echo $CSLH_Config['smtp_password']; ?>" size=35></td></tr>
	<tr><td><b>SMTP port:</b></td><td><input type=text name=new_smtp_portnum value="<?php echo $CSLH_Config['smtp_portnum']; ?>" size=5></td></tr>		
	<tr><td><b>SMTP default e-mail:</b></td><td><input type=text name=new_owner_email value="<?php echo $CSLH_Config['owner_email']; ?>" size=45></td></tr>
</table>
<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt187']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt188']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b><input type=radio value=Y name=reftracking <?php echo $reftracking_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=reftracking <?php echo $reftracking_n; ?> > <?php echo $lang['NO']; ?><br>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt189']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php $lang['txt190']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=tracking <?php echo $tracking_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=tracking <?php echo $tracking_n; ?> > <?php echo $lang['NO']; ?><br>
  
<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt191']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt192']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=usertracking <?php echo $usertracking_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=usertracking <?php echo $usertracking_n; ?> > <?php echo $lang['NO']; ?><br>
<?php echo $lang['txt210']; ?><br>
<b><?php echo $lang['txt211']; ?>:</b> <input type=radio value=Y name=rememberusers <?php echo $rememberusers_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=rememberusers <?php echo $rememberusers_n; ?> > <?php echo $lang['NO']; ?><br>


<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt193']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt194']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=keywordtrack <?php echo $keywordtrack_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=keywordtrack <?php echo $keywordtrack_n; ?> > <?php echo $lang['NO']; ?><br>
   
<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt195']?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt196']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=gethostnames <?php echo $gethostnames_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=gethostnames <?php echo $gethostnames_n; ?> > <?php echo $lang['NO']; ?><br>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<img src=images/games.gif width=25 height=25><b><?php echo $lang['txt197']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt198']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=showgames <?php echo $showgames_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=showgames <?php echo $showgames_n; ?> > <?php echo $lang['NO']; ?><br>
 
 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<img src=images/directory.gif width=25 height=25><b><?php echo $lang['txt199']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt200']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=showdirectory <?php echo $showdirectory_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=showdirectory <?php echo $showdirectory_n; ?> > <?php echo $lang['NO']; ?><br>
 
 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<img src=images/reset.gif width=25 height=25><b><?php echo $lang['txt201']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt202']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=resetbutton <?php echo $resetbutton_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=resetbutton <?php echo $resetbutton_n; ?> > <?php echo $lang['NO']; ?><br> 

 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<img src=images/pp.gif width=25 height=25><b><?php echo $lang['txt225']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt226']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=ppbutton <?php echo $ppbutton_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=ppbutton <?php echo $ppbutton_n; ?> > <?php echo $lang['NO']; ?><br>
 

 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<img src=images/help.gif width=25 height=25><b><?php echo $lang['txt227']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt228']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=helpbutton <?php echo $helpbutton_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=helpbutton <?php echo $helpbutton_n; ?> > <?php echo $lang['NO']; ?><br>

 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<img src=images/fb.png width=25 height=25><b>Facebook:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
Facebook
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=fbbutton <?php echo $fbbutton_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=fbbutton <?php echo $fbbutton_n; ?> > <?php echo $lang['NO']; ?><br>


 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<img src=images/tw.png width=25 height=25><b>twitter:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
twitter
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=twbutton <?php echo $twbutton_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=twbutton <?php echo $twbutton_n; ?> > <?php echo $lang['NO']; ?><br>




<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b>Timeout for Mobile:</b>
</td></tr></table>

<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
When logged in using mobile application this is how
log without activity till the operator is logged out 
this allows you to log in then close down the browser 
on the phone and wait for a incoming text that a chat is 
being requested.
</td></tr></table>

<b>session timeout:</b><select name=new_sessiontimeout>
<option value=20 <?php if ($CSLH_Config['sessiontimeout'] == 20){ print " SELECTED "; } ?> > 20 Minutes </option>
<option value=40 <?php if ($CSLH_Config['sessiontimeout'] == 40){ print " SELECTED "; } ?>> 40 Minutes </option>
<option value=60 <?php if ($CSLH_Config['sessiontimeout'] == 60){ print " SELECTED "; } ?>> 60 Minutes </option>
<option value=80 <?php if ($CSLH_Config['sessiontimeout'] == 80){ print " SELECTED "; } ?>> 80 Minutes </option>
<option value=100 <?php if ($CSLH_Config['sessiontimeout'] == 100){ print " SELECTED "; } ?>> 100 Minutes </option>
<option value=120 <?php if ($CSLH_Config['sessiontimeout'] == 120){ print " SELECTED "; } ?> > 120 Minutes </option>
<option value=140 <?php if ($CSLH_Config['sessiontimeout'] == 140){ print " SELECTED "; } ?>> 140 Minutes </option>
<option value=160 <?php if ($CSLH_Config['sessiontimeout'] == 160){ print " SELECTED "; } ?>> 160 Minutes </option>
<option value=180 <?php if ($CSLH_Config['sessiontimeout'] == 180){ print " SELECTED "; } ?>> 180 Minutes </option>
<option value=200 <?php if ($CSLH_Config['sessiontimeout'] == 200){ print " SELECTED "; } ?>> 200 Minutes </option>
<option value=220 <?php if ($CSLH_Config['sessiontimeout'] == 220){ print " SELECTED "; } ?> > 220 Minutes </option>
<option value=240 <?php if ($CSLH_Config['sessiontimeout'] == 240){ print " SELECTED "; } ?>> 240 Minutes </option>
<option value=260 <?php if ($CSLH_Config['sessiontimeout'] == 260){ print " SELECTED "; } ?>> 260 Minutes </option>
<option value=280 <?php if ($CSLH_Config['sessiontimeout'] == 280){ print " SELECTED "; } ?>> 280 Minutes </option>
<option value=300 <?php if ($CSLH_Config['sessiontimeout'] == 300){ print " SELECTED "; } ?>> 300 Minutes </option>
<option value=320 <?php if ($CSLH_Config['sessiontimeout'] == 320){ print " SELECTED "; } ?> > 320 Minutes </option>
<option value=340 <?php if ($CSLH_Config['sessiontimeout'] == 340){ print " SELECTED "; } ?>> 340 Minutes </option>
<option value=360 <?php if ($CSLH_Config['sessiontimeout'] == 360){ print " SELECTED "; } ?>> 360 Minutes </option>
<option value=380 <?php if ($CSLH_Config['sessiontimeout'] == 380){ print " SELECTED "; } ?>> 380 Minutes </option>
<option value=400 <?php if ($CSLH_Config['sessiontimeout'] == 400){ print " SELECTED "; } ?>> 400 Minutes </option>
<option value=420 <?php if ($CSLH_Config['sessiontimeout'] == 420){ print " SELECTED "; } ?> > 420 Minutes </option>
<option value=440 <?php if ($CSLH_Config['sessiontimeout'] == 440){ print " SELECTED "; } ?>> 440 Minutes </option>
<option value=460 <?php if ($CSLH_Config['sessiontimeout'] == 460){ print " SELECTED "; } ?>> 460 Minutes </option>
<option value=480 <?php if ($CSLH_Config['sessiontimeout'] == 480){ print " SELECTED "; } ?>> 480 Minutes </option>
<option value=500 <?php if ($CSLH_Config['sessiontimeout'] == 500){ print " SELECTED "; } ?>> 500 Minutes </option>
</select>
<br><br>


 <table width=100% ><tr bgcolor=<?php echo $color_alt1;?>><td>
 <b>Layer invite float to top and right css pixels:</b>
</td></tr> </table>
<table>
<tr><td>
 When a layer invite is sent to the browser window this is the 
 top and right in pixels that the layer is floated to. 
 default : 200 pixels right 160 pixels down:
   <?php
   	 $floatxy = explode("|",$CSLH_Config['floatxy']);
   	 $floatx =$floatxy[0];
   	 $floaty =$floatxy[1];
   	    	 
   if(empty($floatx)){ $floatx = 200; }
   if(empty($floaty)){ $floaty = 160; }   
   ?> 
</td></tr> <tr><td>
<b>top:</b> <input type=text size=4 value="<?php echo $floaty; ?>" name=floaty  > y<br>
<b>right:</b> <input type=text size=4 value="<?php echo $floatx; ?>" name=floatx  > x<br>
</td></tr> </table>







<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Default Theme:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
The default theme used for the departments:
</td></tr></table>
<b>Theme:</b>:
<select name=new_theme>
<?php
// get list of installed themes
$dir = "themes/";
$handle=opendir($dir);
	while($file=readdir($handle)){
		if ( (is_dir("$dir/$file") && ($file!="." && $file!="..") ))
			{
			$theme_name = $file; 
			?><option value=<?php echo $theme_name; ?> <?php if ($CSLH_Config['theme'] == $theme_name){ print " SELECTED "; } ?> ><?php echo $theme_name; ?> </option><?php
			}		
	}
?>
</select>

 <SCRIPT type="text/javascript">
 
 function	changebackcolor(id){
   	msgWindow = open('colorchange.php?id='+id,'colorimages','width=500,height=300,toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars=yes','POPUP');
	if (msgWindow.opener == null){
		msgWindow.opener = self;
	}
	if (msgWindow.opener.myform == null){
  msgWindow.opener.myform = document.sendform;
	}
	msgWindow.focus();

 }
 
 </SCRIPT>
 <?php
     if(empty($CSLH_Config['chatcolors'])){ $CSLH_Config['chatcolors'] = "fefdcd,cbcefe,caedbe,cccbba,aecddc,fafafb,faacaa,fbddef,cfaaef,aedcbd,bbffff,fedabf;040662,240462,462040,404062,604000,662640,242642,464406,404060,442662,442022,200220;426446,224646,466286,828468,866482,484668,888286,224882,486882,824864,668266,444468"; }
    $sequences = preg_split("/;/", $CSLH_Config['chatcolors'] );
    $backgrounds = preg_split("/,/", $sequences[0] );
    $clients = preg_split("/,/", $sequences[1] );
    $operators = preg_split("/,/", $sequences[2] ); 

 ?>
<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Colors of chat channel background colors:</b><br>
Every chat that comes in is assigned a channel color. Here you can 
set the sequence of colors for your chats .
<i>click on the squre to change its color</i>
</td></tr></table>
<?php

 
   print "<table><tr>";
    for($i=0;$i < count($backgrounds); $i++){    
    	$j = $i + 50;	
    	if($i==6){ print "</tr><tr>"; }
    	print "<td><DIV id=examplechannelcolor$j class=examplechannelcolor$j style=\"width:50px; height:50px; background:#". $backgrounds[$i] ."\"><a href=javascript:changebackcolor($j)><img src=images/blank.gif width=50 height=50 border=0></a></DIV><br>";
    	print "<input type=text name=channelcolor$j size=6 value=" . $backgrounds[$i] . "></td>";
    }

 print "</tr></table>";
 
    ?>

<br><br>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Colors of Clients Text:</b><br>
Every chat that comes in is assigned a text color. Here you can 
set the sequence of colors for your clients text colors .
<i>click on the squre to change its color</i>
</td></tr></table>
<?php

 
   print "<table><tr>";
    for($i=0;$i < count($clients); $i++){    
    	$j = $i + 100;	
    	if($i==6){ print "</tr><tr>"; }    	    	
    	print "<td><DIV id=exampleclientscolor$j class=exampleclientscolor$j style=\"width:50px; height:30px; background:#". $clients[$i] ."\"><a href=javascript:changebackcolor($j)><img src=images/blank.gif width=50 height=30 border=0></a></DIV><br>";
      print " <input type=text name=clientscolor$j size=6 value=" . $clients[$i] . "></td>";
      
    }
 print "</tr></table>";
 
    ?>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Colors of Operators Text:</b><br>
Every chat that comes in is assigned a text color. Here you can 
set the sequence of colors for your clients text colors .
<i>click on the squre to change its color</i>
</td></tr></table>
<?php

   print "<table><tr>";
    for($i=0;$i < count($operators); $i++){    
    	$j = $i + 150;	
    	    	if($i==6){ print "</tr><tr>"; }  
    	print "<td><DIV id=exampleoperatorscolor$j class=exampleoperatorscolor$j style=\"width:50px; height:30px; background:#". $operators[$i] ."\"><a href=javascript:changebackcolor($j)><img src=images/blank.gif width=50 height=30 border=0></a></DIV><br>";
      print "<input type=text name=operatorscolor$j size=6 value=" . $operators[$i] . "></td>";
    }
 
 print "</tr></table>";
 
    ?>


<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt203']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt204']; ?>:
</td></tr></table>
<b><?php echo $lang['color']; ?>:</b>:
<select name=colorscheme>
 <option value="yellow" <?php if($CSLH_Config['colorscheme']=="yellow") print " SELECTED "; ?>><?php echo $lang['Yellow']; ?></option>
 <option value="white" <?php if($CSLH_Config['colorscheme']=="white") print " SELECTED "; ?>><?php echo $lang['White']; ?></option>
 <option value="blue" <?php if($CSLH_Config['colorscheme']=="blue") print " SELECTED "; ?>><?php echo $lang['Blue']; ?></option>
 <option value="brown" <?php if($CSLH_Config['colorscheme']=="brown") print " SELECTED "; ?>><?php echo $lang['Brown']; ?></option> 
</select>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['Language']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt76']; ?>
</td></tr></table>
<b><?php echo $lang['Language']; ?>:</b>
<select name=newspeaklanguage>
<?php
// get list of installed langages..
$dir = "lang" . C_DIR;
if($handle=opendir($dir)){
	$i=0;
	while ( ($i<100) && (false !== ($file = readdir($handle)))) {
	 $i++;
	 if (preg_match("/lang/",$file))
		{
		if ( (is_file("$dir".C_DIR."$file") && ($file!="lang-.php")))
			{
			$language = str_replace("lang-","",$file);
			$language = str_replace(".php","",$language);
			?><option value=<?php echo $language; ?> <?php if ($CSLH_Config['speaklanguage'] == $language){ print " SELECTED "; } ?> ><?php echo $language; ?> </option><?php
			}
		}
	}
// no list guess...
} else {
$languages = array("Dutch","English","English_uk","French","German","Italian","Portuguese_Brazilian","Spanish","Swedish");
			for($i=0;$i<count($languages); $i++){
  			$language = $languages[$i];
  			?><option value=<?php echo $language ?> <?php if ($CSLH_Config['speaklanguage'] == $language){ print " SELECTED "; } ?> ><?php echo $language ?> </option><?php		
  		}	
}		
?>
</select>
 
<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Chat Type:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
Chat type is how the chat is pushed to the client. There are 3 different
ways Crafty Syntax can do this. 1) AJAX, 2) flushing output buffers to
the client, and 3) refreshing the page. AJAX is by far the most prefered
way to do this and will be the ONLY way in version 3.x of Crafty Syntax.
Using flush and refresh methods of chat have been deprecated in 2.14.x because
AJAX is supported by most browsers.. If ajax fails crafty still falls to flush
as backup and will still work... However, If you would like to enable flush or refresh as default methods of chat you will have to EDIT the 
mastersettings.php PHP file and uncomment out lines #347 TO  #350 to allow
you to select that type of chat mode. Again flush and refresh will be taken out of version 3.x
</td></tr></table>
<b>Chat Type:</b><select name=new_chatmode>
<option value="xmlhttp-flush-refresh" <?php if ($CSLH_Config['chatmode'] == "xmlhttp-flush-refresh") print " SELECTED "; ?> > AJAX -&gt; Flush() -&gt; Refresh </option>
<!-- it is HIGHLY RECOMMENDED THAT YOU ONLY USE xmlhttp REQUESTS (known as AJAX.. but if you must you can uncomment and select one of the methods below -->
<!-- <option value="flush-xmlhttp-refresh" <?php if ($CSLH_Config['chatmode'] == "flush-xmlhttp-refresh") print " SELECTED "; ?> > Flush() -&gt; AJAX -&gt; Refresh </option> -->
<!-- <option value="xmlhttp-refresh" <?php if ($CSLH_Config['chatmode'] == "xmlhttp-refresh") print " SELECTED "; ?> > AJAX -&gt; Refresh </option> -->
<!-- <option value="flush-refresh" <?php if ($CSLH_Config['chatmode'] == "flush-refresh") print " SELECTED "; ?> > Flush() -&gt; Refresh </option> -->
<!-- <option value="refresh" <?php if ($CSLH_Config['chatmode'] == "refresh") print " SELECTED "; ?> > Refresh</option> -->
</select><br>

<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt159']; ?>
</td></tr></table>
<b>Flush() chatmode Refresh:</b>: <select name=newmaxexe>
<option value=14 <?php if ($CSLH_Config['maxexe'] == 14){ print " SELECTED "; } ?> > 15 Seconds </option>
<option value=30 <?php if ($CSLH_Config['maxexe'] == 30){ print " SELECTED "; } ?>> 30 Seconds </option>
<option value=60 <?php if ($CSLH_Config['maxexe'] == 60){ print " SELECTED "; } ?>> 60 Seconds </option>
<option value=90 <?php if ($CSLH_Config['maxexe'] == 90){ print " SELECTED "; } ?>> 90 Seconds </option>
<option value=180 <?php if ($CSLH_Config['maxexe'] == 180){ print " SELECTED "; } ?>> 180 Seconds </option>
<option value=300 <?php if ($CSLH_Config['maxexe'] == 300){ print " SELECTED "; } ?>> 300 Seconds </option>
<option value=600 <?php if ($CSLH_Config['maxexe'] == 600){ print " SELECTED "; } ?>> 600 Seconds </option>
<option value=900 <?php if ($CSLH_Config['maxexe'] == 900){ print " SELECTED "; } ?>> 900 Seconds </option>
<option value=1500 <?php if ($CSLH_Config['maxexe'] == 1500){ print " SELECTED "; } ?>> 1500 Seconds </option>
<option value=1000 <?php if ($CSLH_Config['maxexe'] == 2000){ print " SELECTED "; } ?>> 2000 Seconds </option>
<option value=4000 <?php if ($CSLH_Config['maxexe'] == 4000){ print " SELECTED "; } ?>> 4000 Seconds </option>
<option value=8000 <?php if ($CSLH_Config['maxexe'] == 8000){ print " SELECTED "; } ?>> 8000 Seconds </option>
</select>

<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt160']; ?>
</td></tr></table>
<b>Refresh chatmode Refresh</b>: <select name=newrefreshrate>
<option value=1 <?php if ($CSLH_Config['refreshrate'] == 1){ print " SELECTED "; } ?> > Auto Detect </option>
<option value=4 <?php if ($CSLH_Config['refreshrate'] == 3){ print " SELECTED "; } ?>> 3 Seconds </option>
<option value=5 <?php if ($CSLH_Config['refreshrate'] == 5){ print " SELECTED "; } ?>> 5 Seconds </option>
<option value=7 <?php if ($CSLH_Config['refreshrate'] == 7){ print " SELECTED "; } ?>> 7 Seconds </option>
<option value=10 <?php if ($CSLH_Config['refreshrate'] == 10){ print " SELECTED "; } ?>> 10 Seconds </option>
<option value=15 <?php if ($CSLH_Config['refreshrate'] == 15){ print " SELECTED "; } ?>> 15 Seconds </option>
</select>
 
<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt205']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt78']; ?>
</td></tr></table>
<b><?php echo $lang['txt205']; ?>:</b><select name=newoffset>
<option value=<?php echo $offset; ?>><?php echo $offset ?></option>
<option value=<?php echo $offset; ?>>---</option>
<option value=-12> Kwajalein -12 </option>
<option value=-11>Pacific/Midway' => -11,</option>
<option value=-10>Pacific/Honolulu' => -10,</option>
<option value=-9>America/Anchorage' => -9,</option>
<option value=-8>America/Los_Angeles' => -8,</option>
<option value=-7>America/Denver' => -7,</option>
<option value=-6>America/Tegucigalpa' => -6,</option>
<option value=-5>America/New_York' => -5,</option>
<option value=-4.3>America/Caracas' => -4.30,</option>
<option value=-4>America/Halifax' => -4,</option>
<option value=-3.3>America/St_Johns' => -3.30,</option>
<option value=-3>America/Argentina/Buenos_Aires' => -3,</option>
<option value=-3>America/Sao_Paulo' => -3,</option>
<option value=-2>Atlantic/South_Georgia' => -2,</option>
<option value=-1>Atlantic/Azores' => -1,</option>
<option value=0>Europe/Dublin' => 0,</option>
<option value=1>Europe/Belgrade' => 1,</option>
<option value=2>Europe/Minsk' => 2,</option>
<option value=3>Asia/Kuwait' => 3,</option>
<option value=3.3>Asia/Tehran' => 3.30,</option>
<option value=4>Asia/Muscat' => 4,</option>
<option value=5>Asia/Yekaterinburg' => 5,</option>
<option value=5.3>Asia/Kolkata' => 5.30,</option>
<option value=4.45>Asia/Katmandu' => 5.45,</option>
<option value=6>Asia/Dhaka' => 6,</option>
<option value=6.3>Asia/Rangoon' => 6.30,</option>
<option value=7>Asia/Krasnoyarsk' => 7,</option>
<option value=8>Asia/Brunei' => 8,</option>
<option value=9>Asia/Seoul' => 9,</option>
<option value=9.3>Australia/Darwin' => 9.30,</option>
<option value=-10>Australia/Canberra' => 10,</option>
<option value=-11>Asia/Magadan' => 11,</option>
<option value=-12>Pacific/Fiji' => 12,</option>
<option value=-13>Pacific/Tongatapu' => 13</option>
</select><br>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['title']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt79']; ?>
</td></tr></table>
<b><?php echo $lang['title']; ?>:</b><input type=text name=newsite_title value="<?php echo $CSLH_Config['site_title']; ?>"><br>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt206']; ?>:</b>
</td></tr></table>

<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt172']; ?>
</td></tr></table>
<textarea cols=45 rows=5 name=ignoreips><?php echo htmlspecialchars($CSLH_Config['ignoreips']); ?></textarea><br>

<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
banned User agents. list of robots and spidar user agents that are banned to save resources. 
</td></tr></table>
<textarea cols=45 rows=5 name=ignoreagent><?php echo htmlspecialchars($CSLH_Config['ignoreagent']); ?></textarea><br>



<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['TYPINGPREVIEW']; ?>:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt80']; ?>
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> <input type=radio value=Y name=newshow_typing <?php echo $typing_y; ?> > <?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=newshow_typing <?php echo $typing_n; ?> > <?php echo $lang['NO']; ?><br>


<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Timeout for Operator to go from ONline to offline:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 This is the amount of time in minutes that if the operator 
 is not in the "Live Help" tab their status will be changed
 from "Online" to "Offline" . This is very useful for operators
 who forget to change their status before going to other areas
 of the admin .. This does NOT log them out it just simply
 sets their status to offline if they are not in the live help
 tab after x minutes.. It is recommended that this is set to 
 between 4 adn 15 minutes. 
</td></tr></table>
<b>Minutes till Operator changed from online to offline if not in "live help" tab:</b>
  <select name=newoperatorstimeout>
  	 <?php for($i=2;$i<185;$i=$i+2){ ?>
  	 <option value="<?php echo $i ?>" <?php if($CSLH_Config['operatorstimeout']==$i) { echo " selected "; } ?> > <?php echo $i ?></option>
   <?php } ?>
  </select>
  
<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Session Timeout for Operator:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 This is the amount of time in minutes that the operator 
 is logged out if no action is made in the applicaiton for this time period.
 For example, if the operator closed the window and did not log out 
 before closing . It is recommended that this is set to 
 between 45 and 60 minutes. 
</td></tr></table>
<b>Minutes till Operator is logged out:</b>
  <select name=newoperatorssessionout>
  	 <?php for($i=20;$i<585;$i=$i+5){ ?>
  	 <option value="<?php echo $i ?>" <?php if($CSLH_Config['operatorssessionout']==$i) { echo " selected "; } ?> > <?php echo $i ?></option>
   <?php } ?>
  </select>
    
  


<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>use cookies:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
It is HIGHLY recommended that cookies are used in order to be able
to monitor and chat with visitors. However, because some people are
paranoid of cookies there is an option to not enable cookies.
HOWEVER, if cookies are not enabled the live chat WILL NOT WORK
for visitors to the website with dynamic ip addresses and visitors
from the same network or ip will be seen as the same person.
</td></tr></table>
<b><?php echo $lang['Enable']; ?>:</b> 
<input type=radio value=Y name=new_usecookies <?php echo $cookies_y; ?> > 
<?php echo $lang['YES']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<input type=radio value=N name=new_usecookies <?php echo $cookies_n; ?> > <?php echo $lang['NO']; ?> (<font color=#990000><b>NOT RECOMMENDED</font></b>)<br>

<br><br><br>
<input type=submit value="<?php echo $lang['UPDATE']; ?>">
<br><br><br>
</body>
<?php
if(!($serversession))
$mydatabase->close_connect();
?></td></tr></table>
<pre>


</pre>
<font size=-2>
<!-- Note if you remove this line you will be violating the license even if you have modified the program -->
<a href=http://www.craftysyntax.com/ target=_blank>Crafty Syntax Live Help</a> &copy; 2003 - 2012 by <a href=http://www.craftysyntax.com/EricGerdes/ target=_blank>Eric Gerdes</a>  
<br>
CSLH is  Software released 
under the <a href=http://www.gnu.org/copyleft/gpl.html target=_blank>GNU/GPL license</a>  
</font>