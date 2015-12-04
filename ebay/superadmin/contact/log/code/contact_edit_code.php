<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description   : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
$obj_setting 			= new common();
$obj 					= new validation();

#Code to Fetch seleted ID's data  
$fetchSetting 			= $obj_setting->read('email_log', 'id = '.$id);
$getSetting 			= $db->fetchNextObject($fetchSetting);
$id	 					= $getSetting->id;
$email					= $getSetting->email;
$status 				= $getSetting->status;
$sent					= $getSetting->sent_date;
$next 					= $getSetting->next_date;
$content				= $getSetting->content;

unset($obj_setting);
unset($obj);
			
?>