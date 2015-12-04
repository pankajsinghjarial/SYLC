<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting 		= new common();
$obj 				= new validation();
 echo $att_label;
/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
 
if($_SERVER['REQUEST_METHOD']=='POST')
    {
		  $error='';
		  
		  $obj->add_fields($att_code, 'req', 'Please Enter Atrribute Code');		  
 		  $error = $obj->validate();		   
		  
		  if($error){
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>Please fill all required fields.</font>";
 		   }
		  else
		    {
				if(trim($slug)){
						$slug = makeAlias($slug);
				}else{
						$slug = makeAlias($name);
				}
				
				if(trim($metatitle)){
						$metatitle = $metatitle;
				}else{
						$metatitle = $name;
				}
				
				$_SESSION['success_msg'] = 'New Attribute has been saved successfully.';
				$dataArr = array('attribute_code'=>$att_code,'frontend_type'=>$att_type,'frontend_label'=>$att_label,'is_required'=>$req,'default_value'=>$att_def,'publish'=>$publish);
				$update_site		=	$obj_setting->save(TBL_ATTRIBUTE, $dataArr);
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/page";</script>'; 
				exit;
			}
		}
		
?>