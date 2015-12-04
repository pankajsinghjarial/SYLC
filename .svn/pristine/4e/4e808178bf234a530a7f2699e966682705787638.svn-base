<?php

/*************************************************************************************************************

#Coder       : Keshav Sharma

#Description : This Code is used to update a particular product. 


*************************************************************************************************************/


extract($_GET);

extract($_POST);

$obj = new validation();

$obj_block = new common();

/* Get Current Date Time Stamp */

$currentTimestamp = getCurrentTimestamp();

$obj_handle = new Handle();

if(isset($sub) && $sub != "")

	     {
		  $error='';

		  $obj->add_fields($title, 'req', 'Please Enter Title'); 
		    if($_FILES['file']['name'] != "" ) {
		  $obj->add_fields($_FILES['file'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');
			}
			if(!isset($publish) || $publish == ''){
				$publish = 1;
			}

		  $error = $obj->validate();
		  
		  $image = '';

		  //--------------------------------------------//		  
		  if($error){


			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }

		  else

		   { 
		   
		   if($_FILES["logo"]["name"]) {
			
							$type = explode(".",$_FILES["logo"]["name"]);
							
							if(end($type) =="png" || end($type) =="jpeg" || end($type) =="jpg"  || end($type) =="gif")
							{                           
								$image = getCurrentTimestamp().'-'.$_FILES["logo"]["name"];
								//chmod(DEFAULT_ADMIN_URL."/images/brands",0777);
								
								move_uploaded_file($_FILES["logo"]["tmp_name"],LIST_ROOT."/images/brands/" . $image);							
							}  
				} else {
					$image = $old_image;
				}	

		   $dataArr  =  array('title'=>$title ,'logo'=>$image ,'publish'=>$publish);

		   $update_product=$obj_block->update(TBL_BRANDS,$dataArr,'id='.$brand_id);

		   $_SESSION['msg']= 'Brand Successfully Updated';
		   
		   unset($obj_block);
		   
		   unset($obj);
                   
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/new_stock/brands";</script>'; 
		   

		   }

		 }

else

         {		     

			 #Code to Fetch seleted ID's data  

			 $getBlock= $obj_block->read(TBL_BRANDS,'id='.$brand_id);

			 $fetchBlock= $db->fetchNextObject($getBlock);

		     $title =$fetchBlock->title ;

			 $old_image = $fetchBlock->logo ;

			 $publish=$fetchBlock->publish;
			 
			 unset($obj_block);
			

		 }


 ?>