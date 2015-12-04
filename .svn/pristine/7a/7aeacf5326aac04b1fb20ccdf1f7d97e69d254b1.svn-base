<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);
extract($_FILES);

$obj_setting = new common();
$obj = new validation();
$formObj = new AdminCarForm();
/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
/*echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";

exit;*/

if($_SERVER['REQUEST_METHOD']=='POST')
    {
		  $error='';
		  
		  $obj->add_fields($fullName, 'req', 'Please Enter Full Name%%fullName');
		  $obj->add_fields($madeYear, 'req', 'Please Enter Made Year%%madeYear');
		  $obj->add_fields($madeYear, 'year', 'Please Enter Valid Year%%madeYear');
		  $obj->add_fields($manufacturer, 'req', 'Please Select Manufacturer%%manufacturer');
		  if($manufacturer == "other"){
			  $obj->add_fields($manufacturer_other, 'req', 'Please Enter Manufacturer%%manufacturer_other');
		  }
		  $obj->add_fields($carName, 'req', 'Please Enter Car Name%%carName');
		  //$obj->add_fields($carName, 'alpha', 'Please Enter Valid Car Name%%carName');
		  $obj->add_fields($model, 'req', 'Please Enter Model%%model');
		  $obj->add_fields($price, 'req', 'Please Enter Price%%price');
		  $obj->add_fields($price, 'num', 'Please Enter Valid Price%%price');
		  $obj->add_fields($stock_id, 'req', 'Please Enter Stock ID%%stock_id');
		  $obj->add_fields($vin, 'req', 'Please Enter Vehical Identification Number%%vin');
		  
		  $error_tab1 = $obj->validate();
		  unset($obj);
		  $error_tab2='';
		  if($image_1[error] != 4 || $image_2[error] != 4) {
			  $obj = new validation();
			  
			  $obj->add_fields($image_1, 'ftype=jpg,gif,png', 'Please Upload Correct Image 1%%image_1');
			  //$obj->add_fields($image_1, 'fsize=jpg,gif,png', 'Please Upload Correct Image 1%%image_1');
			  $obj->add_fields($image_2, 'ftype=jpg,gif,png', 'Please Upload Correct Image 2%%image_2');
			  
			  $error_tab2 = $obj->validate();
			  unset($obj);
		  }
		  $obj = new validation();
		  
		  $obj->add_fields($mileage, 'req', 'Please Enter Mileage%%mileage');
		  $obj->add_fields($mileage, 'num', 'Please Enter Valid Mileage%%mileage');
		  $obj->add_fields($engine, 'req', 'Please Select Engine%%engine');
		  $obj->add_fields($fuel, 'req', 'Please Select Fuel%%fuel');
		  if($fuel == "other"){
			  $obj->add_fields($fuel_other, 'req', 'Please Enter Fuel%%fuel_other');
		  }
		  $obj->add_fields($bodyStyle, 'req', 'Please Select Body Style%%bodyStyle');
		  if($bodyStyle == "other"){
			  $obj->add_fields($bodyStyle_other, 'req', 'Please Enter Body Style%%bodyStyle_other');
		  }
		  $obj->add_fields($extColor, 'req', 'Please Select Exterior Color%%extColor');
		  if($extColor == "other"){
			  $obj->add_fields($extColor_other, 'req', 'Please Enter Exterior Color%%extColor_other');
		  }
		  $obj->add_fields($interColor, 'req', 'Please Select Interior Color%%interColor');
		  if($interColor == "other"){
			  $obj->add_fields($interColor_other, 'req', 'Please Enter Interior Color%%interColor_other');
		  }
		  $obj->add_fields($transmission, 'req', 'Please Select Transmission%%transmission');
		  if($transmission == "other"){
			  $obj->add_fields($transmission_other, 'req', 'Please Enter Transmission%%transmission_other');
		  }
		  $obj->add_fields($drivetrain, 'req', 'Please Select Drivetrain%%drivetrain');
		  if($drivetrain == "other"){
			  $obj->add_fields($drivetrain_other, 'req', 'Please Enter Drivetrainr%%drivetrain_other');
		  }
		  $obj->add_fields($doors, 'req', 'Please Select Doors%%doors');
		  if($doors == "other"){
			  $obj->add_fields($doors_other, 'req', 'Please Enter Doors%%doors_other');
		  }
		  $obj->add_fields($wheelbase, 'req', 'Please Select Wheelbase%%wheelbase');
		  if($wheelbase == "other"){
			  $obj->add_fields($wheelbase_other, 'req', 'Please Enter Wheelbase%%wheelbase_other');
		  }
		  $error_tab3 = $obj->validate();
		  unset($obj);
		  $obj = new validation();
		  
		  
		  $obj->add_fields($features, 'req', 'Please Enter Features%%features');
		  $obj->add_fields($std_equip, 'req', 'Please Enter Standard Equipment%%std_equip');
		  $error_tab4 = $obj->validate();
		  unset($obj);
		  
		  if($error_tab1 != ''){
				$errorMsges .= $error_tab1;
 		   }
		   if($error_tab2 != ''){
				$errorMsges .= $error_tab2;
 		   }
		   if($error_tab3 != ''){
				$errorMsges .= $error_tab3;
 		   }
		   if($error_tab4 != ''){
				$errorMsges .= $error_tab4;
 		   }
		  if($error_tab4 == '' && $error_tab3 == '' && $error_tab1 == '' && $error_tab2 == '')
		    {
				$_SESSION['success_msg'] = 'New car has been saved successfully.';
				if($formObj->AddCar($_POST,$_FILES)){
					  if( !empty($_REQUEST['type']) && $_REQUEST['type'] == 'nostock') {
							echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/new_stock/new_car/index.php";</script>'; 
					  }
					  echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/car";</script>'; 
					exit;
				}
				else{
					$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$formObj->error."</font>";
				}
			}
		}
		
?>