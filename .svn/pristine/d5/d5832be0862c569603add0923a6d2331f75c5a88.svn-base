<?php
extract($_GET);
extract($_POST);
$obj_setting = new common();


if(isset($car_id) and $car_id!='' and isset($action) and $action=='delete'){

	if(isset($searchtext) and $searchtext!=''){
			$addToUrl = '?searchtext='.$searchtext.'&searchcombo='.$searchcombo;
	}else{
			$addToUrl = '';
	}
	
	$total_rows = $obj_setting->numberOfRows('car'," car_id=$car_id");
	if($total_rows > 0){
		$obj_setting->delete('car'," car_id=$car_id");
		$obj_setting->delete('contact'," car_id=$car_id");
		$_SESSION['success_msg'] = 'Car deleted successfully.';
		if( !empty($_REQUEST['type']) && $_REQUEST['type'] == 'nostock') {
							echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/new_stock/new_car/index.php";</script>'; 
					  }
		echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/car/index.php'.$addToUrl.'";</script>'; 
	}else{
		$pageName  = 'There is no car exists with this car id.';
	}
    
}

unset($obj_setting);

?>