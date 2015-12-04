<?php

/*************************************************************************************************************

#Coder       : Kapil Verma


*************************************************************************************************************/

extract($_GET);

extract($_POST);

$obj_product = new common();

$obj = new validation();

$obj_handle = new Handle();   

 /* Get Current Date Time Stamp */



 $currentTimestamp = getCurrentTimestamp();

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

			$add_product=$obj_product->save(TBL_GHEAD, $dataArr);

		    $_SESSION['msg']= RECORD_ADD;

		    redirectUrl(DEFAULT_ADMIN_URL.'/group_head/index.php'); 

		    exit;

			}

		 }

	

?>

