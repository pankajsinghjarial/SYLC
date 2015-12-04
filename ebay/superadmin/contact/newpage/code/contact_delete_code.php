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
    $obj_setting->delete('contact_bid'," id=$id");
	$_SESSION['success_msg'] = 'Newpage data deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/contact/newpage/index.php'.$addToUrl.'";</script>'; 
}

$total_rows = $obj_setting->numberOfRows('contact_bid'," id=$contactid");
if($total_rows > 0){
	$singlePage 	= $obj_setting->customQuery("SELECT * FROM contact_bid where id='".$id."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->name;
}else{
	$pageName  = 'No newpage data exists with this id.';
}
unset($obj_setting);

?>