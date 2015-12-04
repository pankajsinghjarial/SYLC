<?php
extract($_GET);
extract($_POST);
$obj_setting = new common();


if(isset($pageid) and $pageid!='' and isset($action) and $action=='delete'){

	if(isset($searchtext) and $searchtext!=''){
			$addToUrl = '?searchtext='.$searchtext.'&searchcombo='.$searchcombo;
	}else{
			$addToUrl = '';
	}
    $obj_setting->delete('pages'," id=$pageid");
	$_SESSION['success_msg'] = 'Page deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/page/index.php'.$addToUrl.'";</script>'; 
}

$total_rows = $obj_setting->numberOfRows('pages'," id=$pageid");
if($total_rows > 0){
	$singlePage 	= $obj_setting->customQuery("SELECT name FROM pages where id='".$pageid."'");
	$getPageName 	= $db->fetchNextObject($singlePage);
	$pageName  		= $getPageName->name;
}else{
	$pageName  = 'There is no page exists with this page id.';
}
unset($obj_setting);

?>