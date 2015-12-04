<?php 
extract($_POST);
extract($_GET);
$common = new common();
$modelList = array();
$manf= $common ->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
while($row = mysql_fetch_assoc($manf)){
    $modelList[] = $row;
}
//print_r($modelList);//die;
?>
