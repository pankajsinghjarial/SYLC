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
 

$lastaction = date("YmdHis");
$timeof = date("YmdHis");
$startdate =  date("Ymd");

if(!(isset($UNTRUSTED['tab']))){ $UNTRUSTED['tab'] = ""; }
if(!(isset($UNTRUSTED['action']))){ $UNTRUSTED['action'] = ""; }
if(!(isset($UNTRUSTED['makenamed']))){ $UNTRUSTED['makenamed'] = ""; }
if(!(isset($UNTRUSTED['doubleframe']))){ $UNTRUSTED['doubleframe'] = ""; }
if(!(isset($UNTRUSTED['department']))){ $UNTRUSTED['department'] = ""; }
if(!(isset($UNTRUSTED['website']))){ $UNTRUSTED['website'] = ""; }

  
// get the info of this user.. 
$sqlquery = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($sqlquery);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);
$myid = $people['user_id'];

// get defaultdepartment:
if(!(empty($UNTRUSTED['website']))){
  $sqlquery = "SELECT defaultdepartment FROM livehelp_websites WHERE id='".intval($UNTRUSTED['website'])."'";	
} else {
	$sqlquery = "SELECT defaultdepartment FROM livehelp_websites  LIMIT 1";	
}
$people2 = $mydatabase->query($sqlquery);
$row2 = $people2->fetchRow(DB_FETCHMODE_ASSOC);
$defaultdepartment = $row2['defaultdepartment'];


// get department information...
$sqlquery = "SELECT * FROM livehelp_departments WHERE recno=$defaultdepartment";
$data_d = $mydatabase->query($sqlquery);  
 
$department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
$department = $department_a['recno']; 
$topframeheight = $department_a['topframeheight'];  
$topbackground = $department_a['topbackground']; 
$colorscheme = $department_a['colorscheme']; 
   $topframeheight = $department_a['topframeheight'];  
   $topbackground = $department_a['topbackground']; 
   $topbackcolor = $department_a['topbackcolor']; 
   $botbackcolor = $department_a['botbackcolor'];
   $botbackground = $department_a['botbackground'];
   $midbackcolor = $department_a['midbackcolor'];
   $midbackground = $department_a['midbackground'];
   $midbackground = $department_a['themne'];   
$theme = $department_a['theme']; 
if(!(empty($CSLH_Config['theme']))){
   $theme = $CSLH_Config['theme'];
 }

$urlforoperator = "themes/$theme/operator.jpg";
$blank_offset = $topframeheight - 20;


$htmlcode = "<form action=livehelp.php METHOD=GET><input type=hidden name=cslhVISITOR value=". $identity['SESSIONID'] .">";
$htmlcode .= "<center><h2>". $lang['txt108'] . ":</h2><br><select name=department>";
$htmlcode_on = "";
$htmlcode_off = "";

// select all Departments:
if(!(empty($UNTRUSTED['website']))){
$query = "SELECT * FROM livehelp_departments WHERE visible=1 AND website='".intval($UNTRUSTED['website'])."' ORDER by ordering";
} else {
$query = "SELECT * FROM livehelp_departments WHERE visible=1 ORDER by ordering";
}
$data_d2 = $mydatabase->query($query);
$default = 0;
while($department_a2 = $data_d2->fetchRow(DB_FETCHMODE_ASSOC)){
  $department = $department_a2['recno'];
  $name = $department_a2['nameof'];
 
  if($default == 0){
  	 $default = 1;
     $htmlcode1 = "<option value=". intval($department) . " SELECTED >";  
  } else {
  	 $htmlcode1 = "<option value=". intval($department) . ">";  
  }

  // see if anyone in this department is online:
    $sqlquery = "SELECT isonline FROM livehelp_users,livehelp_operator_departments WHERE livehelp_users.user_id=livehelp_operator_departments.user_id AND livehelp_users.isonline='Y' AND livehelp_users.isoperator='Y' AND livehelp_operator_departments.department=".intval($department);
    $data = $mydatabase->query($sqlquery);  
    if($data->numrows() != 0){
      $htmlcode_on .= $htmlcode1 .  $name . "  (" . $lang['online'] . ") </option>"; 
    } else {
      $htmlcode_off .= $htmlcode1 . "<font color=\"#DDDDDD\"> " . $name . "  (" .  $lang['offline'] . ") </font></option>";     
    }  
}
 
$htmlcode .= $htmlcode_on;
$htmlcode .= "\n<option value=0> </option>\n";$htmlcode .= "\n<option value=0> </option>\n";
$htmlcode .= $htmlcode_off;
 
$htmlcode .= "</select><br><br><br>";
$htmlcode .= "<input type=submit value=\"". $lang['SEND'] ."\">";
$htmlcode .= "</form></center>";

 
include "themes/$theme/chatwindow_large.php";

?>