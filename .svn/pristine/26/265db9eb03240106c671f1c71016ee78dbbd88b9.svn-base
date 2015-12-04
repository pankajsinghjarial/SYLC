<?php
$userTblName = "wishlist";
//$condition = "user_id=1";
$common = new common();
$num = $common->numberOfRows($userTblName);
if(!isset($_GET['page'])){
	$page = 1;
}

/* $pages = new Paginator;
$pages->default_ipp = 25;
$pages->items_total =  $num;
$pages->paginate(); */

/* if($num != 0){
	if( $page % $_GET['page'] == 0){
		$startLim = ( $_GET['page'] - 1 ) * 25;
	}
	else{
		$startLim = ( ( $page % $_GET['page'] ) - 1 ) * 25;
	}
} */
//echo $startLim;die;	
if($_SESSION['User']['id']!=""){
	$userid = $_SESSION['User']['id'];
	$list = $common->customQuery("SELECT * FROM ".$userTblName." where user_id = ".$userid." ORDER BY created DESC LIMIT 0 ,25");
}

	
	?>