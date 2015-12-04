<?php

/********************************************************************************************************************

#Coder       : Keshav Sharma

#Description : This Code is used to display list of all product and remove any on them 


*********************************************************************************************************************/



extract($_GET);

extract($_POST);

$page_name="index.php";
$limit=$_GET['limit']; // Read the limit value from query string.records per page
if(strlen($limit) > 0 and !is_numeric($limit)){
	$limit= 10;
}

// If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
// Based on the value of limit we will assign selected value to the respective option//
switch($limit)
{
	case 5:
	$select5="selected";
	$select10="";
	$select15="";
	$select20="";
	break;
	case 10:
	$select5="";
	$select10="selected";
	$select15="";
	$select20="";
	break;
	case 15:
	$select5="";
	$select10="";
	$select15="selected";
	$select20="";
	break;
	case 20:
	$select5="";
	$select10="";
	$select15="";
	$select20="selected";
	break;
	default:
	$select5="";
	$select10="selected";
	$select15="";
	$select20="";
	break;
}

$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
	$start=0;
}


$eu = ($start - 0); 

if(!$limit > 0 ){ // if limit value is not available then let us use a default value
	$limit = PAGING_LIMIT;    // No of records to be shown per page by default.
}                             
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 

if(isset($_GET['field'])and $_GET['field']!=''){
	$field = $_GET['field'];
}else{
	$field = 'id';
}
if(isset($_GET['orderBy'])and $_GET['orderBy']!=''){
	$orderby = $_GET['orderBy'];
}else{
	$orderby = 'ASC';
}


$obj_block = new common();

$currentTimestamp = getCurrentTimestamp();

if($bid!='' && $action=='delete')

  {
	
	
	
  $deleteProduct = $obj_block->delete(TBL_BRANDS, 'id ='.$bid);

  $_SESSION['msg']= 'Brand Successfully Deleted';
  
  unset($obj_block);

  echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/new_stock/brands/index.php";</script>';
   
  exit;

  }

$getBlock = $obj_block->read(TBL_BRANDS,'',' creation_date DESC');

unset($obj_block);

?>