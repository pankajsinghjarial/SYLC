<?php

/*************************************************************************************************************

#Coder       : Manoj Pandit

#Description : This Code is used to update a particular product. 


*************************************************************************************************************/

extract($_GET);

extract($_POST);

$obj = new validation();

$obj_block = new common();

/* Get Current Date Time Stamp */



$obj_handle = new Handle();

$currentTimestamp = getCurrentTimestamp();

//$obj_handle->makeAlias($mystring);

if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST')

	     {

		  $error='';

		 if($_FILES["banner_image"]["name"] && $_FILES["banner_image"]["name"]!='') {
		 	
			$file_type=strtolower(end(explode(".",$_FILES["banner_image"]["name"])));
			
			if($file_type =="png" || $file_type =="jpeg" || $file_type =="jpg"  || $file_type =="gif")
				$valid_file_type='yeap';
			else
				$valid_file_type='';
				
		 	$obj->add_fields($valid_file_type, 'req', 'Please upload image file only.'); 
		  }
		  
		  $error = $obj->validate();
		  
		 $image = '';
		  //--------------------------------------------//

		  if($error){

			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }	 

		  else

		    {
		   if(!empty($_FILES["banner_image"]["name"])) {                           
								$image = $currentTimestamp.'-'.$obj_handle->makeAlias($_FILES["banner_image"]["name"]);
								
								@chmod(DEFAULT_ADMIN_URL."/images/banner",0777);
								
								if(isset($old_image) && $old_image!='' && file_exists(LIST_ROOT_ADMIN."/images/banner/".$old_image)) {
									@unlink(LIST_ROOT_ADMIN."/images/banner/".$old_image);
								}
								move_uploaded_file($_FILES["banner_image"]["tmp_name"],LIST_ROOT_ADMIN."/images/banner/".$image);							
							
				} else {
					$image = $old_image;
				}
			
			
			$middle_text=str_replace('../js/uploaded/',DEFAULT_ADMIN_URL.'/js/uploaded/',$middle_text);
			$footer_above_text=str_replace('../js/uploaded/',DEFAULT_ADMIN_URL.'/js/uploaded/',$footer_above_text);
			$footer_text=str_replace('../js/uploaded/',DEFAULT_ADMIN_URL.'/js/uploaded/',$footer_text);	

		   $dataArr  =  array('banner_image'=>$image ,'middle_text'=>$middle_text ,'footer_above_text'=>$footer_above_text ,'footer_text'=>$footer_text,'creation_date'=>$currentTimestamp);

		   $update_product=$obj_block->update(TBL_BANNER,$dataArr,'id=1');

		   $_SESSION['msg']='Banner Successfully Updated';
		   
		   unset($obj_block);
		   
		   unset($obj);
            
           redirectUrl(DEFAULT_ADMIN_URL.'/banner/update.php'); 
		   exit;      
			}
		 }

else

         {		     

			 #Code to Fetch seleted ID's data  

			 $getBlock= $obj_block->read(TBL_BANNER,'id=1');

			 $fetchBlock= $db->fetchNextObject($getBlock);

			 $old_image = $fetchBlock->banner_image ;
			 
		     $middle_text =$fetchBlock->middle_text ;
			 
			 $footer_above_text =$fetchBlock->footer_above_text ;
			 
			 $footer_text =$fetchBlock->footer_text ;
			 
			 unset($obj_block);
			

		 }


 ?>