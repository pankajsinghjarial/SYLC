<?php 
extract($_GET);
extract($_POST);
$search = new search();
$common = new common();

$manf= $common ->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");

?>