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

$currentTimestamp = getCurrentTimestamp();

$obj_handle = new Handle();

$brand_list = $obj_block->getbrand();
 
if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST')

	     {		

		  $error='';

		  $obj->add_fields($title, 'req', 'Please Enter Brand Name');
		  
		  $obj->add_fields($details_url, 'req', 'Please Enter Url');
		 // $obj->add_fields($details_url, 'url', 'Please Enter Valid Url');
		  

		  if(empty($_FILES["image"]["name"]) && $old_image=='')
		  $obj->add_fields($_FILES["image"]["name"],'req','Please Upload Product Image');
		  $obj->add_fields($price, 'req', 'Please Enter Price');
		  $obj->add_fields($price, 'num', 'Please Enter Numeric value');
		  if(!empty($_FILES["image"]["name"])) {
		 	
			$file_type=strtolower(end(explode(".",$_FILES["image"]["name"])));
			
			if($file_type =="png" || $file_type =="jpeg" || $file_type =="jpg"  || $file_type =="gif")
				$valid_file_type='yeap';
			else
				$valid_file_type='';
				
		 	$obj->add_fields($valid_file_type, 'req', 'Please upload image file only.'); 
		  }
		  

		  $error = $obj->validate();

		  //--------------------------------------------//		  
		  if($error){


			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }

		  else

		   { 
		   
			$image = '';
			if(!empty($_FILES["image"]["name"])) {
			
					$type = strtolower(end(explode(".",$_FILES["image"]["name"])));
					
					if($type=="png" || $type=="jpeg" || $type=="jpg"  || $type=="gif")
					{                            
						$image = $currentTimestamp.'-'.$obj_handle->makeAlias($_FILES["image"]["name"]).'.'.$type;
						@chmod(LIST_ROOT_ADMIN."/images/htmltemplate",0777);
						
						/*if(isset($old_image) && $old_image!='' && file_exists(LIST_ROOT_ADMIN."/images/new_model/".$old_image)) {
							unlink(LIST_ROOT_ADMIN."/images/new_model/".$old_image);
						}*/
						if(isset($old_image) && $old_image!='' && file_exists(LIST_ROOT_ADMIN."/images/htmltemplate/".$old_image)) {
							@unlink(LIST_ROOT_ADMIN."/images/htmltemplate/".$old_image);
						}
						move_uploaded_file($_FILES["image"]["tmp_name"],LIST_ROOT_ADMIN."/images/htmltemplate/".$image);							
					}  
				} else {
					$image = $old_image;
				}
				

		   $dataArr  =  array('title'=>$title ,'details_url'=>$details_url ,'image'=>$image ,'price'=>$price ,'publish'=>$publish);

		   $update_product=$obj_block->update(TBL__HTMLTEMPLATE,$dataArr,'id='.$model_id);

		   $_SESSION['msg']= 'Car Template Successfully Updated';
		   
		   unset($obj_block);
		   
		   unset($obj);
                   
           redirectUrl(DEFAULT_ADMIN_URL.'/htmltemplate/index.php'); 
		   exit;

		   }

		 }

else

         {		     
//echo "virender";
			 #Code to Fetch seleted ID's data  

			 $getBlock= $obj_block->read(TBL__HTMLTEMPLATE,'id='.$model_id);
			
			 $fetchBlock= $db->fetchNextObject($getBlock);
			// print_r($fetchBlock);
		     $title =$fetchBlock->title;

			 $details_url=$fetchBlock->details_url;
			 
			 $old_image =$fetchBlock->image ;

			 $price=$fetchBlock->price;
			 
			 $publish=$fetchBlock->publish;	 
			 
			 unset($obj_block);		

		 }
 ?>