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

		  $obj->add_fields($title, 'req', 'Please Enter Title');
		  
		  $obj->add_fields($details_url, 'req', 'Please Enter Details Url');
		  $obj->add_fields($details_url, 'validURL', 'Please Enter Valid Url');
		  // $obj->add_fields($year, 'num', 'Please Enter vaild Year');
		  
		  $obj->add_fields($_FILES["image"]["name"],'req','Please Upload Image');
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
								move_uploaded_file($_FILES["image"]["tmp_name"],LIST_ROOT_ADMIN."/images/htmltemplate/".$image);							
							}
			}
							
		  	$dataArr  =  array('title'=>$title ,'details_url'=>$details_url ,'image'=>$image ,'price'=>$price ,'publish'=>$publish,'creation_date'=>$currentTimestamp);		

			$add_product=$obj_block->save(TBL__HTMLTEMPLATE, $dataArr);

		    $_SESSION['msg']= 'Car Template Successfully Added';

		    redirectUrl(DEFAULT_ADMIN_URL.'/htmltemplate/index.php'); 
			
			unset($obj_block);
			
			unset($obj);

		    exit;

			}

		 }
?>