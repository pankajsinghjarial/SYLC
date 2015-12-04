<?php

/*************************************************************************************************************

#Coder       : Keshav Sharma


*************************************************************************************************************/

extract($_GET);

extract($_POST);

$obj_block = new common();

$obj = new validation();

$obj_handle = new Handle();   

 /* Get Current Date Time Stamp */
 
 $currentTimestamp = getCurrentTimestamp();
 
 /* Get list of all brands */
 
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
			$image = '';
			if($_FILES["image"]["name"]) {
			
							$type = explode(".",$_FILES["image"]["name"]);
							
							if(end($type) =="png" || end($type) =="jpeg" || end($type) =="jpg"  || end($type) =="gif")
							{                           
								$image = getCurrentTimestamp().'-'.$_FILES["image"]["name"];								
		  
								//chmod(DEFAULT_ADMIN_URL."/images/used_car/image",0777);
								
								move_uploaded_file($_FILES["image"]["tmp_name"],LIST_ROOT_ADMIN."/images/used_car/image/" . $image);							
							}
			}
			$dispo = '';
			if($_FILES["dispo"]["name"]) {
			
							$type = explode(".",$_FILES["dispo"]["name"]);
							
							if(end($type) =="png" || end($type) =="jpeg" || end($type) =="jpg"  || end($type) =="gif")
							{                           
								$dispo = getCurrentTimestamp().'-'.$_FILES["dispo"]["name"];								
		  
								//chmod(DEFAULT_ADMIN_URL."/images/used_car/dispo",0777);
								
								move_uploaded_file($_FILES["dispo"]["tmp_name"],LIST_ROOT_ADMIN."/images/used_car/dispo/" . $dispo);							
							}  
				}				
		  	$dataArr  =  array('model_name'=>$model_name ,'brand_id'=>$brand_id ,'year'=>$year ,'image'=>$image ,'dispo'=>$dispo ,'prix'=>$prix ,'publish'=>$publish,'creation_date'=>$currentTimestamp);		

			$add_product=$obj_block->save(TBL_USED_CAR, $dataArr);

		    $_SESSION['msg']= 'Car Successfully Added';

		    redirectUrl(DEFAULT_ADMIN_URL.'/used_car/index.php'); 
			
			unset($obj_block);
			
			unset($obj);

		    exit;

			}

		 }
?>