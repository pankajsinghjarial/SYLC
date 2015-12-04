<?php
extract($_GET);
extract($_POST);

$pages = new AdminPaginator;
$common = new common();
// If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
// Based on the value of limit we will assign selected value to the respective option//
switch($limit)
{
	case 25:
		$select25="selected";
		$select50="";
		$select100="";
		break;
	case 50:
		$select25="";
		$select50="selected";
		$select100="";
		break;
	case 100:
		$select25="";
		$select50="";
		$select100="selected";
		break;
	default:
		$select25="selected";
		$select50="";
		$select100="";
		break;
}
if(!isset($limit)){
	$pages->default_ipp=25;
	$limit = 25;
}
else{
	$pages->default_ipp=$limit;
}
$eu = $limit * ($page-1) ;

$obj_setting = new common();
$obj_search = new search();


if(isset($_GET['field'])and $_GET['field']!=''){
	$field = $_GET['field'];
}else{
	$field = 'car_id';
}
if(isset($_GET['orderBy'])and $_GET['orderBy']!=''){
	$orderby = $_GET['orderBy'];
}else{
	$orderby = 'ASC';
}


$where = "";

if(isset($searched) && $searched != ''){
	$where .=" WHERE title LIKE '%".$searched."%' OR Make LIKE '%".$searched."%' OR Model LIKE '%".$searched."%' OR Year LIKE '%".$searched."%'";
}


$ebayid = $common->CustomQuery("Select count(*) as total from ebay_car ".$where);
$item = mysql_fetch_object($ebayid);
 
$pages->items_total = $item->total;
if(isset($limit_combo) && $limit_combo != ''){
	$pages->default_ipp = $limit_combo;
}
else{
	$pages->default_ipp=25;
}
$pages->paginate();

$total_rows  = $item->total;
$resp = $common->CustomQuery("Select * from ebay_car ".$where." Order BY endson ASC ".$pages->limit);

