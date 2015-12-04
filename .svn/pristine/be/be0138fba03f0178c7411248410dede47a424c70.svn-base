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

$brand_list = $obj_block->getbrand();
 
if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST')

	     {		

		  $error='';

		  $obj->add_fields($model_name, 'req', 'Please Enter Model'); 
		  
		  $obj->add_fields($brand_id, 'req', 'Please Select Brand'); 
		  
		  $obj->add_fields($year, 'req', 'Please Enter Year');
		  
		 $obj->add_fields($year, 'num', 'Please Enter vaild Year');
		  
		  $obj->add_fields($prix, 'req', 'Please Enter Prix');

		  $error = $obj->validate();

		  //--------------------------------------------//		  
		  if($error){


			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }

		  else

		   { 
		   
		   
		    if($_FILES["image"]["name"]) {
			
							$type = explode(".",$_FILES["image"]["name"]);
							
							if(end($type) =="png" || end($type) =="jpeg" || end($type) =="jpg"  || end($type) =="gif")
							{                           
								$image = getCurrentTimestamp().'-'.$_FILES["image"]["name"];
								//chmod(DEFAULT_ADMIN_URL."/images/used_car/image",0777);
								if(isset($old_image) && $old_image!='') {
									unlink(LIST_ROOT_ADMIN."/images/used_car/image/".$old_image);
								}
								move_uploaded_file($_FILES["image"]["tmp_name"],LIST_ROOT_ADMIN."/images/used_car/image/" . $image);							
							}  
				} else {
					$image = $old_image;
				}
				
				
			  if($_FILES["dispo"]["name"]) {
			
							$type = explode(".",$_FILES["dispo"]["name"]);
							
							if(end($type) =="png" || end($type) =="jpeg" || end($type) =="jpg"  || end($type) =="gif")
							{                           
								$dispo = getCurrentTimestamp().'-'.$_FILES["dispo"]["name"];
								//chmod(DEFAULT_ADMIN_URL."/images/used_car/dispo",0777);
								if(isset($old_dispo) && $old_dispo!='') {
									unlink(LIST_ROOT_ADMIN."/images/used_car/dispo/".$old_dispo);
								}
								move_uploaded_file($_FILES["dispo"]["tmp_name"],LIST_ROOT_ADMIN."/images/used_car/dispo/" . $dispo);							
							}  
				} else {
					$dispo = $old_dispo;
				}	

		   $dataArr  =  array('model_name'=>$model_name ,'brand_id'=>$brand_id ,'year'=>$year ,'image'=>$image ,'dispo'=>$dispo ,'prix'=>$prix ,'publish'=>$publish);

		   $update_product=$obj_block->update(TBL_USED_CAR,$dataArr,'id='.$car_id);

		   $_SESSION['msg']= 'Car Successfully Updated';
		   
		   unset($obj_block);
		   
		   unset($obj);
                   
           redirectUrl(DEFAULT_ADMIN_URL.'/used_car/index.php'); 
		   

		   }

		 }

else

         {		     

			 #Code to Fetch seleted ID's data  

			 $getBlock= $obj_block->read(TBL_USED_CAR,'id='.$car_id);

			 $fetchBlock= $db->fetchNextObject($getBlock);

		     $model_name =$fetchBlock->model_name;

			 $brand_id = $fetchBlock->brand_id ;

			 $year=$fetchBlock->year;
			 
			 $old_image =$fetchBlock->image ;

			 $old_dispo = $fetchBlock->dispo ;

			 $prix=$fetchBlock->prix;		 
			 
			 unset($obj_block);		

		 }
 ?>