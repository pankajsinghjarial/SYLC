<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description   : This Code is used to Manage Pages
*************************************************************************************************************/
extract($_POST);
extract($_GET);
$obj_setting 			= new common();
$obj 					= new validation();

if($editsub == "editsub")
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
$updateSetting 			= $obj_setting->update('faq',array("publish"=>1,"question"=>$question,"answer"=>$answer),'id='.$id);
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/faq";</script>'; 
				exit;
	unset($obj_setting);
	unset($obj);
			}

			}
			else
			{
			
#Code to Fetch seleted ID's data  
$fetchSetting 			= $obj_setting->read('faq', 'id = '.$id);
$getSetting 			= $db->fetchNextObject($fetchSetting);
$id	 					= $getSetting->id;
$question	 				= $getSetting->question;
$answer			= $getSetting->answer;
$publish 				= $getSetting->publish;	
				}

			
?>