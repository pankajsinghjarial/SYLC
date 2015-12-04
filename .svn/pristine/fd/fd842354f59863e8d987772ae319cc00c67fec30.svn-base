<?php
include("conf/config.inc.php");
$carid 		= $_GET['carId'];

$common = new common();
if(strlen($carid)>0){		
	$common->customQuery("DELETE FROM wishlist WHERE car_id = {$carid}");
	$pos = strpos($_SERVER['HTTP_REFERER'], 'msg');
	if($pos===false){
		header('Location:'.$_SERVER['HTTP_REFERER'].'?msg=success');
	}else{
		header('Location:'.$_SERVER['HTTP_REFERER']);
	}
}
?>