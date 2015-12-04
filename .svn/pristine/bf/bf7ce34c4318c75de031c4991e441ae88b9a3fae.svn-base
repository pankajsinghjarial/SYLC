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
    $obj_setting->delete('whitelist_ips'," id=$id");
	$_SESSION['success_msg'] = 'IP Address deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/ip/view.php'.$addToUrl.'";</script>'; 
}

$total_rows = $obj_setting->numberOfRows('whitelist_ips'," id=$id");
if($total_rows > 0){
	$singlePage 	= $obj_setting->customQuery("SELECT * FROM whitelist_ips where id='".$id."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->ip_address;
}else{
	$pageName  = 'There is no ip exists with this  id.';
}
unset($obj_setting);

?>