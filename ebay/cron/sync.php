<?php
include_once "../conf/config.inc.php";
$common = new common();
$timenow = mktime();
$expireid = $common->CustomQuery("SELECT * FROM `ebay_car` where endtimestamp < ".$timenow); 
while($expire = mysql_fetch_object($expireid))
{
$common->delete('contact'," car_id=$expire->car_id");
$common->delete('ebay_car'," car_id=$expire->car_id");
}
?>