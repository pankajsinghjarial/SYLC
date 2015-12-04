<?php
extract($_GET);
extract($_POST);
$obj_setting = new common();


if(isset($id) and $id!='' and isset($action) and $action=='delete'){

	if(isset($searchtext) and $searchtext!=''){
			$addToUrl = '?searchtext='.$searchtext.'&searchcombo='.$searchcombo;
	}else{
			$addToUrl = '';
	}
    $obj_setting->delete('banner'," id=$id");
	$_SESSION['success_msg'] = 'Banner deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/banner/index.php'.$addToUrl.'";</script>'; 
}

$total_rows = $obj_setting->numberOfRows('banner'," id=$contactid");
if($total_rows > 0){
	$singlePage 	= $obj_setting->customQuery("SELECT * FROM banner where id='".$id."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->name;
}else{
	$pageName  = 'No Banner exists with this id.';
}
unset($obj_setting);

?>