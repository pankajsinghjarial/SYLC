<?php
extract($_GET);
extract($_POST);

$pages = new AdminPaginator;

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


$addCarToQuery = '';

$dataArr = array("popular"=>74);

if($submitcar == 'Search') {
	
	$backtype = explode("~",$searchattr); 
	if($backtype[2] == "select" or $backtype[2] == "radio" or $backtype[2] == "multiselect" or $backtype[2] == "checkbox"){ 
		$value_id = $obj_setting->customQuery("select value_id from attribute_option_value where attribute_id = '".$backtype['0']."' and value like '"."%".$searchcar."%"."' ");
		$value_id = mysql_fetch_object($value_id);
		$value = $value_id->value_id;
	}
	else{
		$value = $searchcar;
	}
	$attribute_code	= $obj_setting->customQuery("select attribute_code from attribute where attribute_id = ".$backtype['0']);
	$attribute_code = mysql_fetch_object($attribute_code);
	
	$dataArr[$attribute_code->attribute_code] =  $value; 

}
$pages->items_total  = $obj_search->attributeSearchCount($dataArr);
$total_rows = $pages->items_total;
$pages->paginate();
$all_car = $obj_search->attributeSearch($dataArr, "fullName", "ASC", $pages->limit);
$all_car = $obj_setting->CarAttributesFromID($all_car);