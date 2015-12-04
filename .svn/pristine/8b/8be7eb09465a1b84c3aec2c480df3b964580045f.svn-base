<?php
require_once("../../visitor_common.php");
$query = "SELECT recno,topbackground,midbackcolor,midbackground,theme,colorscheme  FROM livehelp_departments ";
if(!(empty($UNTRUSTED['department']))){ 
	$query .= " WHERE recno=". intval($UNTRUSTED['department']); 
}
$data_d = $mydatabase->query($query);  
$department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
$department = $department_a['recno'];
$topbackground = $department_a['topbackground']; 
$colorscheme = $department_a['colorscheme']; 
$theme = $department_a['theme']; 
$midbackcolor_value = $department_a['midbackcolor']; 
$midbackground_value = $department_a['midbackground']; 
 
include("theme-options.php");
 
?>
body { 
 
  background: <?php echo $midbackcolor_value; ?> url('<?php echo str_replace("themes/vanilla/","",$midbackground_value); ?>');  
  background-attachment: fixed;
  font: 12px Arial,Helvetica,sans-serif;
}

.typeinglayerspacer {
	width: 375px;
	height: 1px;
}

.operator {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
.operatorName {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
}
.guest {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.guestName {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}