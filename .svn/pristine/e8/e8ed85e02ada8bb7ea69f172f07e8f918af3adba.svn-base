<?php 
//===========================================================================
//* --    ~~                Crafty Syntax Live Help                ~~    -- *
//===========================================================================
//           URL:   http://www.craftysyntax.com/    EMAIL: ericg@craftysyntax.com
//         Copyright (C) 2003-2006 Eric Gerdes   (http://www.craftysyntax.com )
// --------------------------------------------------------------------------
// $              CVS will be released with version 3.1.0                   $
// $    Please check http://www.craftysyntax.com/ or REGISTER your program for updates  $
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
// --------------------------------------------------------------------------  
// BIG NOTE:
//     At the time of the release of this version of CSLH, Version 3.1.0 
//     which is a more modular, extendable , “skinable” version of CSLH
//     was being developed.. please visit http://www.craftysyntax.com to see if it was released! 
//===========================================================================
require_once("admin_common.php");
validate_session($identity);
  
// get the info of this user.. 
$query = "SELECT * FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);
$myid = $people['user_id'];
$channel = $people['onchannel'];
?>
<html>
<link title="new" rel="stylesheet" href="style.css" type="text/css">
<link title="new" rel="stylesheet" href="images/<?php echo $CSLH_Config['colorscheme']; ?>/navigation.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['charset']; ?>" >
<body marginheight=0 marginwidth=0 leftmargin=0 topmargin=0 bgcolor=#FFFFFF>
	
<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0 width=100%>
<tr>
<td align=left width=92% NOWARP=NOWRAP background="images/topadmin.png">
	
<table><tr><td><img src=images/blank.gif height=23 width=455 border=0></td></tr>
	<tr><td  background=images/blank.gif>
	<table cellpadding=0 cellspacing=0 border=0 width=100% >
<tr>
 <td width=20><img src="images/blank.gif" width="20" height="5" border="0"></td>

<?php if( ($UNTRUSTED['tab'] != "tabs") && ($UNTRUSTED['tab'] != "data") && ($UNTRUSTED['tab'] != "live") &&  ($UNTRUSTED['tab'] != "oper") && ($UNTRUSTED['tab'] != "dept") && ($UNTRUSTED['tab'] != "settings") ) {$class = "class=\"ontab\""; } else { $class = ""; } ?>

<?php if($isadminsetting!="L"){ ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a HREF="admin.php" target=_top><?php print navspaces("Overview Index") . str_replace(" ","&nbsp;","Overview Index") . navspaces("Overview Index"); ?></a></span></td>
<?php } ?>

<td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>

 <?php if($UNTRUSTED['tab'] == "live"){$class = "class=\"ontab\""; } else { $class = ""; } ?>
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a HREF="live.php" target=_top><?php print navspaces($lang['livehelp']) . str_replace(" ","&nbsp;",$lang['livehelp']) . navspaces($lang['livehelp']); ?></a></span></td>
 
 <td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>
<?php if($UNTRUSTED['tab'] == "oper"){ $class = "class=\"ontab\""; } else { $class = ""; } ?>
<?php if ( ($isadminsetting!="R") && ($isadminsetting!="L") ) { ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a href="admin.php?page=operators.php&tab=oper" target=_top ><?php print navspaces($lang['operators']) . $lang['operators'] . navspaces($lang['operators']);?></a></span></td>
<?php }?> 
 <td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>
<?php if($UNTRUSTED['tab'] == "dept"){ $class = "class=\"ontab\""; } else { $class = ""; } ?>
<?php if ( ($isadminsetting!="R") && ($isadminsetting!="L") ) { ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a href="admin.php?page=departments.php&tab=dept" target=_top><?php print navspaces($lang['dept']) .  $lang['dept'] . navspaces($lang['dept']);?></a></span></td>
<?php }?> 
 <td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>
<?php if($UNTRUSTED['tab'] == "settings"){ $class = "class=\"ontab\""; } else { $class = ""; } ?>
<?php if ($isadminsetting=="Y") { ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a href="admin.php?page=mastersettings.php&tab=settings" target=_top><?php print navspaces($lang['settings']) .  $lang['settings'] . navspaces($lang['settings']);?></a></span></td>
<?php }?> 
 <td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>
<?php if($UNTRUSTED['tab'] == "data"){ $class = "class=\"ontab\""; } else { $class = ""; } ?>
<?php if ($isadminsetting!="L") { ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a href="admin.php?page=data.php&tab=data" target=_top><?php print navspaces($lang['data']) .  $lang['data'] . navspaces($lang['data']);?></a></span></td>
<?php }?> 
 <td width=2><img src="images/blank.gif" width="2" height="5" border="0"></td>
<?php if($UNTRUSTED['tab'] == "tabs"){ $class = "class=\"ontab\""; } else { $class = ""; } ?>
<?php if ($isadminsetting=="Y") { ?> 
 <td id="navigation" class="navigation" nowrap width=75 STYLE="text-align:center;"><span <?php echo $class; ?>><a href="admin.php?page=modules.php&tab=tabs" target=_top><?php print navspaces($lang['tabs']) .  $lang['tabs'] . navspaces($lang['tabs']); ?></a></span></td>
<?php }?> 
 <td width=95% align=center valign=top><img src="images/blank.gif" width="20" height="5" border="0"><font color=000066> Version <b><?php echo $CSLH_Config['version'];?></b></td>
 <td><img src="images/blank.gif" width="10" height="5" border="0"></td> 
</tr>
</table>
</td></tr></table>

</td>
<td align=right valign=top bgcolor="#FFFFFF" background="images/blank.gif">
 <a href=http://www.craftysyntax.com/ target=_blank><img src=images/logo.png width=225 height=59 border=0></a>
 
</td>
</tr>
</table>
 
</body>
</html>
<?php
if(!($serversession))
  $mydatabase->close_connect();
?>