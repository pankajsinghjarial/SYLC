<?php

/*************************************************************************************************************

#Coder       : Keshav Sharma

#Description : This Code is used to update a particular product. 


*************************************************************************************************************/



extract($_GET);

extract($_POST);

$obj = new validation();

$obj_block = new common();

 $getbrandBlock= $obj_block->read(TBL_BRANDS," publish=1"); 
/* Get Current Date Time Stamp */

$currentTimestamp = getCurrentTimestamp();

 
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
		  
		  if($_FILES['file']['name'] != ""  )
		  {
$obj->add_fields($_FILES['file'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');
		  }
		  $error = $obj->validate();

		  //--------------------------------------------//		  
		  if($error){


			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }

		  else{ 
		    
			  if($_FILES['file']['name'] != ""  ) {
				  $image_name = $_FILES['file']['name'];
				  $path = LIST_ROOT.'/images/brands/';
				  $image_car = $currentTimestamp."-".$_FILES["file"]["name"];
				  move_uploaded_file($_FILES["file"]["tmp_name"],$path.$image_car);
			  } 
			  else {
				  $image_car = $old_image;
			  }
  
			 $dataArr  =  array('model_name'=>$model_name ,'brand_id'=>$brand_id ,'year'=>$year ,'color'=>$color ,'dispo'=>$dispo ,'prix'=>$prix ,'stockType'=>$stockType ,'publish'=>$publish,'image'=>$image_car);
  
			 $update_product=$obj_block->update(TBL_NEW_CAR,$dataArr,'id='.$car_id);
  
			 $_SESSION['success_msg']= 'Car Successfully Updated';
			 
			 unset($obj_block);
			 
			 unset($obj);
                   
			 echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/new_stock/new_car/index.php";</script>'; 
		   

		   }

		 }

else

         {		     

			 #Code to Fetch seleted ID's data  

			 $getBlock= $obj_block->read(TBL_NEW_CAR,'id='.$car_id);

			 $fetchBlock= $db->fetchNextObject($getBlock);

		     $model_name =$fetchBlock->model_name;

			 $brand_id = $fetchBlock->brand_id ;

			 $year=$fetchBlock->year;
			 
			 $color =$fetchBlock->color ;

			 $dispo = $fetchBlock->dispo ;

			 $prix=$fetchBlock->prix;	
			 
			 $stockType=$fetchBlock->stockType;	
			  
			 $publish = $fetchBlock->publish;	
			  
			 $old_image =  $fetchBlock->image;	
			 
			 unset($obj_block);		

		 }


 ?>