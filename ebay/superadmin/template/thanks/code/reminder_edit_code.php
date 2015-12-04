<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description   : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
$obj_setting 			= new common();
$obj 					= new validation();
$currentTimestamp   = getCurrentTimestamp();
#Code to Fetch seleted ID's data  
$fetchSetting 			= $obj_setting->read('template', 'id = 2');
$getSetting 			= $db->fetchNextObject($fetchSetting);
$email 					= $getSetting->email;
$subject	 			= $getSetting->subject;
$template				= $getSetting->template;
$next_date				= $getSetting->next_date;

extract($_POST);

/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
#saving data in database after validation
if($_SERVER['REQUEST_METHOD']=='POST')
    {
		  $error	=	'';
		  
		  $obj->add_fields($email, 'req', 'Please Enter Email');
  		  $obj->add_fields($email, 'email', 'Please Enter A Valid Email');
		  $obj->add_fields($subject, 'req', 'Please Enter Subject');
		  $obj->add_fields($template, 'req', 'Please Enter Template');			  
 		  $error = $obj->validate();		   
		  
		  if($error){
		  
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
 		   }
		  else
		    {
				
				$_SESSION['success_msg'] = 'Template has been edited successfully.';
				$dataArr = array('email'=>$email,'subject'=>$subject,'template'=>$template,'next_date'=>$next_date,'mail_date'=>$currentTimestamp);
				$update_site		=	$obj_setting->update('template', $dataArr,' id=2');
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/template/thanks/index.php'.$addToUrl.'";</script>'; 
				exit;
			}
		}
unset($obj_setting);
unset($obj);
			
?>