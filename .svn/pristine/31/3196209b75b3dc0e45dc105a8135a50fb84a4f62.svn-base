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
		  
		  $obj->add_fields($color, 'req', 'Please Enter Color'); 
		  
		  $obj->add_fields($dispo, 'req', 'Please Enter Dispo'); 
		  
		  $obj->add_fields($prix, 'req', 'Please Enter Prix');

		  $error = $obj->validate();

		  //--------------------------------------------//		  
		  if($error){


			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }

		  else

		   { 
		   

		   $dataArr  =  array('model_name'=>$model_name ,'brand_id'=>$brand_id ,'year'=>$year ,'color'=>$color ,'dispo'=>$dispo ,'prix'=>$prix ,'publish'=>$publish);

		   $update_product=$obj_block->update(TBL_NEW_CAR,$dataArr,'id='.$car_id);

		   $_SESSION['msg']= 'Car Successfully Updated';
		   
		   unset($obj_block);
		   
		   unset($obj);
                   
           redirectUrl(DEFAULT_ADMIN_URL.'/new_car/index.php'); 
		   

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
			 
			 unset($obj_block);		

		 }


 ?>