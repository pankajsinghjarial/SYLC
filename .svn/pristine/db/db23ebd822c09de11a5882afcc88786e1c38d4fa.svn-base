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
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
 require_once("..\admin_common.php");
else
 require_once("../admin_common.php");
 
 
validate_session($identity);

// get the info of this user.. 
$query = "SELECT * 
          FROM livehelp_users 
          WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);
$myid = $people['user_id'];
$channel = $people['onchannel'];
$isadminsetting = $people['isadmin'];

$timeof = date("YmdHis");

 

if(empty($UNTRUSTED['what'])){ $UNTRUSTED['what'] = ""; }

 
if(!(empty($UNTRUSTED['selectedwho']))){
	$pairs = explode("__",$UNTRUSTED['selectedwho']);
	for($i=0;$i< count($pairs); $i++){
		$selected = $pairs[$i]; 
    $whatchannel = createchannel($selected);
    $query = "DELETE 
              FROM livehelp_operator_channels 
              WHERE user_id=".intval($myid)." 
                 AND userid=".intval($selected);	
    $mydatabase->query($query);
    $timeof = date("YmdHis");
 }
}
 
 
  // open up layer directory and get list of layer invites:
  $dir = "layer_invites" . C_DIR;
  $handle=opendir($dir);
  $i = 0;
  $count =101;
  while (false !== ($file = readdir($handle))) {
		if ($file!="." && $file!=".." && preg_match("/layer/",$file) ){
			$imageurl = $file;
			if ( (is_file("$dir".C_DIR."$file")) && (!(preg_match("/.txt/",$file))) ){
				 $parts = explode(".",$file);
				 $file = $parts[0];			 				 				 
				 $file = str_replace("layer-","",$file);	
				 // see if we have this invite in the database if not 
				 // add it .
				 $querysql = "SELECT layerid from livehelp_layerinvites WHERE  imagename='$imageurl'";
         $rs = $mydatabase->query($querysql);
				 if($rs->numrows() == 0){
				 	  $layerid = find_puka();
				 	  $fullfile = "layer_invites".C_DIR."layer-". $file . ".txt";
				 	  $imagemapof = file_get_contents($fullfile);
				 	  $imagemap = addslashes($imagemapof);
				 	  $sqlquery = "INSERT INTO livehelp_layerinvites (layerid,imagename,imagemap) VALUES ($layerid,'$imageurl','$imagemap')";
				 	  $mydatabase->query($sqlquery);
				  }			 
				  $count++;
			}
		}
	}
	
	 $selectedtab = "visitors";
 include "mobileheader.php";
?>
<script type="text/javascript">
//var myScroll;
//window.addEventListener('orientationchange', setHeight);

function setHeight() {
	document.getElementById('wrapper').style.height = window.orientation == 90 || window.orientation == -90 ? '85px' : '300px';
}

function loaded() {

//	setHeight();
//	document.addEventListener('touchmove', function(e){ e.preventDefault(); });
//	myScroll = new iScroll('currentwindow');
 
}
//document.addEventListener('DOMContentLoaded', loaded);


</script>
 

<SCRIPT type="text/javascript">
ns4 = (document.layers)? true:false;
ie4 = (document.all)? true:false;
cscontrol= new Image;
var flag_imtyping = false;

function returnsend(){
  document.chatter.alt_what.value= "send";
  document.chatter.submit();	
}
</SCRIPT>
 
<body bgcolor=E0E8F0  >
	
		 
      <div id="wrapper">
       <div id="currentwindow">   
<?php 
$expires = date("YmdHis");
$expires = $expires - 20000;
$pairs = explode(",",$UNTRUSTED['selectedwho']);
$comma = "";
$myusers ="";
$channelsplit = "";
 for($i=0;$i< count($pairs); $i++){
	 $selected = $pairs[$i];
   $query = "SELECT * 
             FROM livehelp_users 
             WHERE user_id=".intval($selected);
   $mychannels = $mydatabase->query($query);	
   $channel_a = $mychannels->fetchRow(DB_FETCHMODE_ASSOC);
   $thischannel = $channel_a['onchannel'] . "__" . $selected; 
   $myusers .= $comma . $channel_a['username'];
   $bgcolor = "FFFFFF";
   $channelsplit .= $comma . $thischannel;
   $comma = ",";
 }  	
	
?>
<table width=275 bgcolor=<?php echo $color_alt1;?>><tr><td><b><?php echo $lang['invite']; ?> <font color=000000 size=+1><?php echo $myusers; ?></font>:</b></td></tr></table>
<form action=visitors.php name=chatter method=post>
<input type=hidden name=typing value="no">
<input type=hidden name=channelsplit value="<?php echo $channelsplit; ?>" > 
<b><?php echo $lang['message']; ?>:</b>
<input type=hidden name=user_id value="<?php echo $myid; ?>">
<input type=hidden name=alt_what value="">
<SCRIPT type="text/javascript">
function updatedhtml(){

<?php
   $sqlquery = "SELECT layerid,imagename,imagemap FROM livehelp_layerinvites";
   $layers = $mydatabase->query($sqlquery);  
   while($invite = $layers->fetchRow(DB_FETCHMODE_ORDERED)){
   	  print "if (document.chatter.layerinvite.value == ".$invite[0].")\n";
   	     print "    document.dhtmlimage.src= '../layer_invites/".$invite[1]."';\n";   	  
   }
?>		

}
</SCRIPT><br>
<input type=hidden name=timeof value=<?php echo $timeof; ?> >
<input type=hidden name=editid value="">

<img src=images/blank.gif name=dhtmlimage border=0>

<br><br>
<?php echo $lang['txt27'] ?> <select name=layerinvite onchange=updatedhtml()>
<option value=101></option>
<?php
   $sqlquery = "SELECT layerid,imagename,imagemap FROM livehelp_layerinvites";
   $layers = $mydatabase->query($sqlquery);  
   while($invite = $layers->fetchRow(DB_FETCHMODE_ORDERED)){
    print "<option value=$invite[0]> $invite[1]</option>";	
  }
?>			 
</select><br><br>
<br><br>
<input type=submit name=what value=send>
</form>
<br>

<br>
</div></div>
</body>
<?php
if(!($serversession))
  $mydatabase->close_connect();
?>