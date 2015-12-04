<?php

/*************************************************************************************************************

#Coder       : Kapil Verma

#Description : This Code is used to update a particular product. 


*************************************************************************************************************/



extract($_GET);

extract($_POST);

$obj = new validation();

$obj_product = new common();

/* Get Current Date Time Stamp */

$currentTimestamp = getCurrentTimestamp();

$obj_handle = new Handle();

if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST')

	     {

		

		  $error='';

		  $obj->add_fields($name, 'req', 'Please Enter Group-Head Name'); 
		  $obj->add_fields($address, 'req', 'Please Enter Address');
		  $obj->add_fields($phone, 'req', 'Please Enter Phone No');
		  $obj->add_fields($phone, 'num', 'Please Enter Valid Phone No');
		  $obj->add_fields($phone, 'min=6', 'Please Enter Valid Phone No');
		  $obj->add_fields($phone, 'max=12', 'Please Enter Valid Phone No');

		 

		  $error = $obj->validate();

		  if($error){


			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }

		  else

		   { 	

		  $dataArr  =  array('name'=>$name , 'address'=>$address,'phone'=>$phone ,'status'=>$publish ,'creation_date'=>$currentTimestamp );

		   $update_product=$obj_product->update(TBL_GHEAD,$dataArr,'id='.$prod_id);

		   $_SESSION['msg']= RECORD_UPDATE;
                   
           redirectUrl(DEFAULT_ADMIN_URL.'/group_head/index.php'); 
		  //echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/group_head/index.php";</script>'; 

		   exit;

		   }

		 }

else

         {		     

			 #Code to Fetch seleted ID's data  

			 $getProduct= $obj_product->read(TBL_GHEAD,'id='.$prod_id);

			 $fetchProduct= $db->fetchNextObject($getProduct);

		     $name =$fetchProduct->name ;

			 $address = $fetchProduct->address ;

			 $phone =$fetchProduct->phone ;

			 $publish=$fetchProduct->status;
			

		 }



?>