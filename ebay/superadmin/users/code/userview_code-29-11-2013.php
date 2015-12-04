<?php
$obj_setting = new common();
$user_view = $obj_setting->customQuery("SELECT * FROM users WHERE id = '".$_GET['id']."'");
$user = mysql_fetch_assoc($user_view);

?>