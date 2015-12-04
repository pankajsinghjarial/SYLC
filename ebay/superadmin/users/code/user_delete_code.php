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
    $obj_setting->delete('users'," id=$id");
	$_SESSION['success_msg'] = 'User deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/users/index.php'.$addToUrl.'";</script>'; 
	
}

$total_rows = $obj_setting->numberOfRows('users'," id=$contactid");
if($total_rows > 0){
	$singlePage 	= $obj_setting->customQuery("SELECT * FROM users where id='".$id."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->name;
}else{
	$pageName  = 'No User exists with this id.';
}
unset($obj_setting);

?>