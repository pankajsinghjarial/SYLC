<?php

extract($_GET);
extract($_POST);

$obj_setting 		= new common();
$obj 				= new validation();

/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
 
if($_SERVER['REQUEST_METHOD']=='POST')
    {
		  $error='';
		  
		  $obj->add_fields($email, 'req', 'Please email address');
		  $obj->add_fields($email, 'email', 'Please valid email address');
 		  $error = $obj->validate();		   
		  if($error){
 			    $errorMsg= "<font color='#FF0000' family='verdana' size=2>' .$error. '</font>";
 		  }
		  else if( exists( $email )) {
			    $errorMsg= "<font color='#FF0000' family='verdana' size=2>Email Address already added.</font>";   
		  }
		  else
		    {
			    $_SESSION['success_msg'] = 'New Email address has been saved successfully.';
			    $dataArr = array('email'=>$email);
			    $update_site =	$obj_setting->save('notification_emails', $dataArr);
			    echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/email_noti/view.php";</script>'; 
			    exit;
			}
		}
	
	function exists( $email ) {
		$rsObj 	= mysql_query("SELECT id  FROM `notification_emails` WHERE `email` =  '". $email ."'");
		 
		if( mysql_num_rows($rsObj) > 0 ) return true; else return false;
	}
?>