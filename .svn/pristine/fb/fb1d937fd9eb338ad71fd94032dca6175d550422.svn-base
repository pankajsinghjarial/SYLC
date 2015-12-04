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
		  
		  $obj->add_fields($ip_address, 'req', 'Please Enter Page Title');
		  
 		  $error = $obj->validate();		   
		  if($error){
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>Please fill all required fields.</font>";
 		  }
		  else if (!filter_var($ip_address, FILTER_VALIDATE_IP)) {
				$errorMsg= "<font color='#FF0000' family='verdana' size=2>Please enter a valid IP Address.</font>";
	      }
		  else if( ip_exists($ip_address) ) {
			$errorMsg= "<font color='#FF0000' family='verdana' size=2>IP address already exists.</font>";
		  }
		  else
		    {
				$_SESSION['success_msg'] = 'New IP address has been saved successfully.';
				$dataArr = array('ip_address'=>$ip_address);
				$update_site		=	$obj_setting->save(TBL_IP, $dataArr);
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/ip/view.php";</script>'; 
				exit;
			}
		}
	
	function ip_exists( $ip_address ) {
		$rsObj 	= mysql_query("SELECT id  FROM `whitelist_ips` WHERE `ip_address` =  '". $ip_address ."'");
		 
		if( mysql_num_rows($rsObj) > 0 ) return true; else return false;
	}
?>