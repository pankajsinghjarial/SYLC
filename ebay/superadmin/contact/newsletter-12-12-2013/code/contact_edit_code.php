<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description   : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
$obj_setting 			= new common();
$obj 					= new validation();

#Code to Fetch seleted ID's data  
$fetchSetting 			= $obj_setting->read('car_inquiry', 'id = '.$id);
$getSetting 			= $db->fetchNextObject($fetchSetting);
$id	 					= $getSetting->id;
$name	 				= $getSetting->name;
$email				= $getSetting->email;
$status 				= $getSetting->status;
$phone				= $getSetting->phone;
$car_id				= $getSetting->car_id;
$address				= $getSetting->address;
$message				= $getSetting->message;

$updateSetting 			= $obj_setting->update('car_inquiry',array(status=>1),'id='.$id);

unset($obj_setting);
unset($obj);
			
?>