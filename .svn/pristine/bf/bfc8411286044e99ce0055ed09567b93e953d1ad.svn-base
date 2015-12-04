<?php
session_start();
$flagview = 1;
$carid = $_POST['value'];
$unicount =  count($_SESSION['unique_id']['save']);
for($i=0; $i<$unicount;$i++)
{
	if($_SESSION['unique_id']['save'][$i] == $carid)
	{ 
	unset($_SESSION['unique_id']['save'][$i]); 
 array_values($_SESSION['unique_id']['save']);
	
	$flagview =0;}
	}
if($flagview == 1)
{
$_SESSION['unique_id']['save'][] = $carid;
echo "saved";
} ?>
