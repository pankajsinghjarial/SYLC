<?php
extract($_GET);
extract($_POST);

$pages = new AdminPaginator;

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

$where = "";

if(isset($searched) && $searched != ''){
	$where .=" ".$searched;
}






// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'dothejob-c9de-4e5d-adf2-73a736a2651a';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = $where;  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly
$i = '0';  // Initialize the item filter index to 0

// Create a PHP array of the item filters you want to use in your request
$filterarray =
  array(
    array(
    'name' => 'MaxPrice',
    'value' => '10000000',
    'paramName' => 'Currency',
    'paramValue' => 'USD'),
    array(
    'name' => 'ListingType',
    'value' => array('FixedPrice','StoreInventory','AuctionWithBIN','Auction'),
    'paramName' => '',
    'paramValue' => ''),
  );



// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
  global $urlfilter;
  global $i;
  // Iterate through each filter in the array
  foreach($filterarray as $itemfilter) {
    // Iterate through each key in the filter
    foreach ($itemfilter as $key =>$value) {
      if(is_array($value)) {
        foreach($value as $j => $content) { // Index the key for each value
          $urlfilter .= "&itemFilter($i).$key($j)=$content";
        }
      }
      else {
        if($value != "") {
          $urlfilter .= "&itemFilter($i).$key=$value";
        }
      }
    }
    $i++;
  }
  
  return "$urlfilter";
} // End of buildURLArray function

// Build the indexed item filter URL snippet
buildURLArray($filterarray);

// Construct the findItemsByKeywords HTTP GET call 
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsAdvanced";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&RESPONSE-DATA-FORMAT=XML&REST-PAYLOAD";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&categoryId=6001";
$apicall .= "&paginationInput.entriesPerPage=".$pages->default_ipp;
if(isset($page)){
	$apicall .= "&paginationInput.pageNumber=".$page;
}
$apicall .= "&aspectFilter(0).aspectName=Make";
$apicall .= "&aspectFilter(0).aspectValueName(0)=Mercedes-Benz";
$apicall .= "&aspectFilter(0).aspectValueName(1)=Aston+Martin";
$apicall .= "&aspectFilter(0).aspectValueName(2)=Buick";
$apicall .= "&aspectFilter(0).aspectValueName(3)=Cadillac";
$apicall .= "&aspectFilter(0).aspectValueName(4)=Chevrolet";
$apicall .= "&aspectFilter(0).aspectValueName(5)=Chrysler";
$apicall .= "&aspectFilter(0).aspectValueName(6)=Dodge";
$apicall .= "&aspectFilter(0).aspectValueName(7)=Excalibur";
$apicall .= "&aspectFilter(0).aspectValueName(8)=Ferrari";
$apicall .= "&aspectFilter(0).aspectValueName(9)=Ford";
$apicall .= "&aspectFilter(0).aspectValueName(10)=General+Motor+Corp.";
$apicall .= "&aspectFilter(0).aspectValueName(11)=GMC";
$apicall .= "&aspectFilter(0).aspectValueName(12)=Hummer";
$apicall .= "&aspectFilter(0).aspectValueName(13)=Chrysler";
$apicall .= "&aspectFilter(0).aspectValueName(14)=Morgan";
$apicall .= "&aspectFilter(0).aspectValueName(15)=Plymouth";
$apicall .= "&aspectFilter(0).aspectValueName(16)=Pontiac ";
$apicall .= "&aspectFilter(0).aspectValueName(17)=Porsche";
$apicall .= "&aspectFilter(0).aspectValueName(18)=Studebaker";
$apicall .= "&aspectFilter(0).aspectValueName(19)=Toyota";
$apicall .= "&sellingStatus.sellingState=Active";
$apicall .= "&descriptionSearch=true";
$apicall .= "$urlfilter";
$apicall .= '&sortOrder=EndTimeSoonest';

// Load the call and capture the document returned by eBay API

//comment on 20 july----------------------
//$resp = simplexml_load_file($apicall);

$resp=array();
$pages->items_total = (int) $resp->paginationOutput->totalEntries;
$pages->paginate();
