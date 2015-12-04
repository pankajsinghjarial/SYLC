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
  
  // stop chat.
  stopchat($identity['SESSIONID']);

// get department information...
$where="";
   if($UNTRUSTED['department']!=0){ $where = " WHERE recno=".intval($UNTRUSTED['department']); }
   $sqlquery = "SELECT * FROM livehelp_departments $where "; 
   $data_d = $mydatabase->query($sqlquery);  
   $department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
   $department = $department_a['recno']; 
   $topframeheight = $department_a['topframeheight'];  
   $topbackground = $department_a['topbackground'];
 
   
$botbackcolor = $department_a['botbackcolor'];
$botbackground = $department_a['botbackground'];
$midbackcolor = $department_a['midbackcolor'];
$midbackground = $department_a['midbackground'];
    
   $colorscheme = $department_a['colorscheme']; 
   $theme = $department_a['theme']; 
   $blank_offset = $topframeheight - 20;

 
   
  $htmlcode = "<br><br><center><font color=990000 size=+2>" . $lang['gone'] . "</font><br><br>";
  $urlforoperator = "themes/$theme/operator.jpg";
  
  if($emailfun!="N"){
   
   $htmlcode .= "
   <form action=sendtranscript.php method=post>
   <input type=hidden name=transsessionid value=". $identity['SESSIONID'].">
   <table width=400 border=0><tr><td>
     " . $lang['txt128']  . "
     <br>
     Email:<input name=sendto type=text size=40>
   </td></tr></table>
   <input type=submit value=". $lang['SEND'] . ">
   </FORM>
   <br><br><a href=javascript:window.close()>" . $lang['txt40'] . "</a></center>"; 
  
  }
  
 include "themes/$theme/chatwindow_large.php";
 
if(!($serversession))
  $mydatabase->close_connect();
?>