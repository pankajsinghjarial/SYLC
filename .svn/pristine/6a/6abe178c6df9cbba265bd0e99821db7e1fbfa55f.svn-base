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
    $obj_setting->delete('notification_emails'," id=$id");
	$_SESSION['success_msg'] = 'Email Address deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/email_noti/view.php'.$addToUrl.'";</script>'; 
}

$total_rows = $obj_setting->numberOfRows('notification_emails'," id=$id");
if($total_rows > 0){
	$singlePage 	= $obj_setting->customQuery("SELECT * FROM notification_emails where id='".$id."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->email;
}else{
	$pageName  = 'There is no email exists with this  id.';
}
unset($obj_setting);

?>