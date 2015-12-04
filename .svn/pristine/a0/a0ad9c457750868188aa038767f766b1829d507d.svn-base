<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description   : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
$obj_setting 			= new common();
$obj 					= new validation();

#Code to Fetch seleted ID's data  
$fetchSetting 			= $obj_setting->read('currency', 'id = 1');
$getSetting 			= $db->fetchNextObject($fetchSetting);
$boat 					= $getSetting->boat;
$custom	 			= $getSetting->custom;
$tva				= $getSetting->tva;
$transp				= $getSetting->transp;
$com				= $getSetting->com;
$obj_setting->getExchangeRate();

extract($_POST);

/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
#saving data in database after validation
if($_SERVER['REQUEST_METHOD']=='POST')
    {
		  $error	=	'';
		  
		  $obj->add_fields($boat, 'req', 'Please Enter Transport By Boat');
		  $obj->add_fields($boat, 'currency', 'Please Enter Valid Transport By Boat');
		  $obj->add_fields($custom, 'req', 'Please Enter Customs');
		   $obj->add_fields($custom, 'currency', 'Please Enter Valid Customs');
		  $obj->add_fields($tva, 'req', 'Please Enter TVA');
		   $obj->add_fields($tva, 'currency', 'Please Enter Valid TVA');	
 		  $obj->add_fields($transp, 'req', 'Please Enter Transp');
		  $obj->add_fields($transp, 'currency', 'Please Enter Valid Transp');
		  $obj->add_fields($com, 'req', 'Please Enter Com');
		  $obj->add_fields($com, 'currency', 'Please Enter Valid Com');
 		  $error = $obj->validate();		   
		  
		  if($error){
		  
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
 		   }
		  else
		    {
				
				$_SESSION['success_msg'] = 'Exchange Rate has been saved successfully.';
				$dataArr = array('boat'=>$boat,'custom'=>$custom,'tva'=>$tva,'transp'=>$transp,'com'=>$com);
				$update_site		=	$obj_setting->update('currency', $dataArr,' id=1');
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/currency/index.php'.$addToUrl.'";</script>'; 
				exit;
			}
		}
//unset($obj_setting);
unset($obj);
			
?>