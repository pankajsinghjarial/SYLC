<?php
$obj_setting = new common();
$user_view = $obj_setting->customQuery("SELECT * FROM users WHERE id = '".$_GET['id']."' ORDER BY id DESC");
$user = mysql_fetch_assoc($user_view);

?>