<?php
include_once "conf/config.inc.php";
$common = new common();


$common->CustomQuery("delete FROM `ebay_car` where FROM_UNIXTIME(endtimestamp,'%Y-%m-%d') < CURDATE()-interval 3 month limit 100");

echo 'yes';
die;

?>