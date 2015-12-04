<?php
extract($_GET);
extract($_POST);

$page_name="index.php";

$pages = new AdminPaginator;

/*$limit= isset($_GET['limit']) ? $_GET['limit'] : ''; // Read the limit value from query string.records per page
if(strlen($limit) > 0 and !is_numeric($limit)){
	$limit= 25;
}*/


// If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
// Based on the value of limit we will assign selected value to the respective option//
switch($limit)
{
	case 25:
		$select5="selected";
		$select10="";
		$select15="";
		break;
	case 50:
		$select5="";
		$select10="selected";
		$select15="";
		break;
	case 100:
		$select5="";
		$select10="";
		$select15="selected";
		break;
	default:
		$select5="selected";
		$select10="";
		$select15="";
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


$total_rows = $obj_setting->numberOfRows('car');

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


if(!isset($_REQUEST['searchcombo'])){
	$total_rows = $obj_setting->numberOfRows('car'); //number of rows in pages table
}

/*if(isset($_REQUEST['searchcar']) && !isset($_REQUEST['submitcar']) && isset($_REQUEST['start']))
{
$all_car = $obj_setting->getSearchCarListWithAttr($eu, $limit,$searchcar,$searchattr);
$total_rows = count($all_car);
}*/
$addCarToQuery = '';

if(!isset($_REQUEST['searchcombo']) && !isset($_REQUEST['submitcar'])){
	
	$pages->items_total  = $obj_setting->total_getCarListWithAttr();
	$pages->paginate();
	$all_car = $obj_setting->getCarListWithAttr($pages->limit, array("fullName", "mileage", "price", "features"));				
}
elseif($submitcar == 'Search') {
$all_car = $obj_setting->getSearchCarListWithAttr($eu, $limit,$searchcar,$searchattr);
$total_rows = $obj_setting->total_getSearchCarListWithAttr;

}

else{
	if($_REQUEST['searchtext']=='Search'){
		$all_car = $obj_setting->customQuery("SELECT * FROM car order by $field $orderby limit $eu, $limit ");
	}else{
		$all_car = $obj_setting->customQuery("SELECT * FROM car where `name` like '%".addslashes($_REQUEST['searchtext'])."%' OR `desc` like '%".addslashes($_REQUEST['searchtext'])."%' order by $field $orderby limit $eu, $limit "); //number of rows in pages table for perticular search criteria
	}
}
//unset($obj_setting);

?>