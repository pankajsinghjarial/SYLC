<?php

/*************************************************************************************************************

#Coder       : Manoj Pandit


*************************************************************************************************************/

extract($_GET);

extract($_POST);

$obj_block = new common();

$obj = new validation();

$obj_handle = new Handle();   

 /* Get Current Date Time Stamp */
 
 $currentTimestamp = getCurrentTimestamp();
 
 /* Get list of all brands */

	 if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST')
     {		  
		  $error='';

		  $obj->add_fields($brand_name, 'req', 'Please Enter Brand Name');
		  
		  $obj->add_fields($year, 'req', 'Please Enter Year');
		  
		  $obj->add_fields($year, 'num', 'Please Enter vaild Year');
		   		  
		  $obj->add_fields($prix, 'req', 'Please Enter Prix');
		  
		  $obj->add_fields(strip_tags(trim($contents)), 'req', 'Please Enter Content');

		  $obj->add_fields($_FILES["image"]["name"],'req','Please Upload Product Image');
		  
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
								@chmod(LIST_ROOT_ADMIN."/images/old_model",0777);
								move_uploaded_file($_FILES["image"]["tmp_name"],LIST_ROOT_ADMIN."/images/old_model/" . $image);							
							}
			}
							
		  	$dataArr  =  array('brand_name'=>$brand_name ,'year'=>$year ,'image'=>$image ,'prix'=>$prix ,'contents'=>$contents ,'publish'=>$publish,'creation_date'=>$currentTimestamp);		

			$add_product=$obj_block->save(TBL_OLD_MODEL, $dataArr);

		    $_SESSION['msg']= 'Old Model Successfully Added';

		    redirectUrl(DEFAULT_ADMIN_URL.'/old_model/index.php'); 
			
			unset($obj_block);
			
			unset($obj);

		    exit;

			}

		 }
?>