<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting 		= new common();
$obj 				= new validation();
 
/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
 
if($_SERVER['REQUEST_METHOD']=='POST')
    {
		  $error='';
		  
		  $obj->add_fields($question, 'req', 'Please Enter Question');
		  $obj->add_fields($answer, 'req', 'Please Enter Answer');			  
 		  $error = $obj->validate();		   
		  
		  if($error){
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
 		   }
		  else
		    {				
				$_SESSION['success_msg'] = 'FAQ has been saved successfully.';
				$dataArr = array('question'=>$question,'answer'=>$answer, 'publish'=>$publish,'creation_date'=>$currentTimestamp);
				$update_site		=	$obj_setting->save("faq", $dataArr);
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/faq";</script>'; 
				exit;
			}
		}
		
?>