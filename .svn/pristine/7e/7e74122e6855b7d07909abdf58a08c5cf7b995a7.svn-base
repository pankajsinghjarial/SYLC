<?php

/*************************************************************************************************************

#Coder       : Keshav Sharma


*************************************************************************************************************/

extract($_GET);

extract($_POST);

$obj_block = new common();

$obj = new validation();

$obj_handle = new Handle();   

$getbrandBlock= $obj_block->read(TBL_BRANDS," publish=1"); 

 /* Get Current Date Time Stamp */
 
 $currentTimestamp = getCurrentTimestamp();
 
 /* Get list of all brands */
 

	 if(isset($sub) && $sub != "" && $_SERVER['REQUEST_METHOD']=='POST')
     {
		  $error='';

		  $obj->add_fields($model_name, 'req', 'Please Enter Model'); 
		  
		  $obj->add_fields($brand_id, 'req', 'Please Select Brand'); 
		  
		  $obj->add_fields($year, 'req', 'Please Enter Year');
		  
		   $obj->add_fields($year, 'num', 'Please Enter vaild Year');
		  
		  $obj->add_fields($color, 'req', 'Please Enter Color'); 
		  
		  $obj->add_fields($dispo, 'req', 'Please Enter Dispo'); 
		  
		  $obj->add_fields($prix, 'req', 'Please Enter Prix');
		  
		  $obj->add_fields($stockType, 'req', 'Please Select Stock Type');
		  
	      $obj->add_fields($_FILES['file']['name'], 'req', 'Please Upload Image');

		  $obj->add_fields($_FILES['file'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');

		  
		  $error = $obj->validate();
		  
		  //--------------------------------------------//

		  if($error){

			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }	 

		  else

		    {	
			  $image_name = $_FILES['file']['name'];
		  $path = LIST_ROOT.'/images/brands/';
		  $image_car = $currentTimestamp."-".$_FILES["file"]["name"];
          move_uploaded_file($_FILES["file"]["tmp_name"],$path.$image_car);
				
		  	$dataArr  =  array('model_name'=>$model_name ,'brand_id'=>$brand_id ,'year'=>$year ,'color'=>$color ,'dispo'=>$dispo ,'prix'=>$prix ,'stockType'=>$stockType ,'publish'=>$publish,'creation_date'=>$currentTimestamp,'image'=>$image_car);
			

			$add_product=$obj_block->save(TBL_NEW_CAR, $dataArr);

		    $_SESSION['success_msg']= 'Car Successfully Added';

				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/new_stock/new_car/index.php";</script>'; 
			
			unset($obj_block);
			
			unset($obj);

		    exit;

			}

		 }

	

?>

