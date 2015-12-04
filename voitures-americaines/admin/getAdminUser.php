<?php
require_once '../conf/config.inc.php';


$sel_query="Select * from users where id='".$_GET['id']."'";
$rs_sel=mysql_query($sel_query) or die(mysql_error());	
	
	
	$rec=mysql_fetch_array($rs_sel);
echo	json_encode($rec);
?>