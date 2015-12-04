<?php
extract($_GET);
extract($_POST);
#getting array of ids from multiple checkbox and then imploding those ids with ',' to put in IN()
$totalIds = implode(",",$allselect);

$obj_setting = new common();

# Here we are deleting all selected pages
if($totalIds !='' and isset($action) and $action=='delete'){

	if(isset($searchtext) and $searchtext!=''){
			$addToUrl = '?searchtext='.$searchtext.'&searchcombo='.$searchcombo;
	}else{
			$addToUrl = '';
	}
    $obj_setting->delete('car'," car_id IN ($totalIds)");
	$obj_setting->delete('contact'," car_id IN ($totalIds)");
	$_SESSION['success_msg'] = 'Cars deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/car/index.php'.$addToUrl.'";</script>'; 
}
#taking imploded ids and checking if these ids exists in database or not 
#if not then we are showing error message and if found then we are fetching names
#of those pages to show
$total_rows = $obj_setting->numberOfRows('pages'," id IN('$totalIds')");
if($total_rows > 0){
	$totalNames     	= array();
	$singlePage 		= $obj_setting->customQuery("SELECT name FROM pages where id IN('$totalIds')");
	while($getPageName  = $db->fetchNextObject($singlePage)){
	
		$totalNames[]   = $getPageName->name;
	}
	$pageName  		= implode("&nbsp;,&nbsp;",$totalNames);
}else{
	$pageName  = 'There are no cars exists with these car ids.';
}
unset($obj_setting);

?>