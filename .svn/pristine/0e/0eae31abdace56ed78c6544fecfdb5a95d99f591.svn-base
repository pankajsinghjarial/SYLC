<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting 		= new common();
$obj 				= new validation();

#Code to Fetch page category data  
#END
$publish = 1;
/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
 
if($_SERVER['REQUEST_METHOD']=='POST')
    {
		  $error='';
		  
		  $obj->add_fields($name, 'req', 'Please Enter Page Title');
		  $obj->add_fields($desc, 'req', 'Please Enter Description');			  
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
				
				$_SESSION['success_msg'] = 'New page has been saved successfully.';
				$dataArr = array('name'=>$name,'slug'=>$slug,'desc'=>$desc, 'publish'=>$publish,'metatitle'=>$metatitle,'metakeyword'=>$metakeyword,'metadescription'=>$metadescription,'can_delete'=>$can_delete,'creation_date'=>$currentTimestamp,'page_cat'=>$page_cat);
				$update_site		=	$obj_setting->save(TBL_PAGE, $dataArr);
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/page";</script>'; 
				exit;
			}
		}
		$fetchPage_cat = $obj_setting->customQuery("SELECT * FROM pages where page_cat=0");
		
?>