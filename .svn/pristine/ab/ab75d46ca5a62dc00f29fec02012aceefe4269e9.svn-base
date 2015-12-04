<?php

//
include("conf/config.inc.php");
$value = $_POST['value'];
$attribute = $_POST['attr'];
$manufac = $_POST['manufact'];
$classname = $_POST["css_class"];

if($classname == "") { $classname = "customStyleSelectBox";}

		
	// API request variables
	$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
	$findversion = '1.0.0';  // API version supported by your application
	$findappid = 'dothejob-c9de-4e5d-adf2-73a736a2651a';  // Replace with your own AppID
	$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
	$safequery = urlencode($query);  // Make the query URL-friendly
	$i = '0';  // Initialize the item filter index to 0
	
	//for trading api
	$version = 773;
	$devid = "e872f3d0-8bee-4784-b631-f0c6e0468c21";
	$appid = "Planetwe-4831-4322-a03c-57a0a2d3aafb";
	$certid = "574bc5e0-889c-431c-b3aa-918f19b83e0e";
	$userToken = "AgAAAA**AQAAAA**aAAAAA**GsfITw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AFkYekC5iHogidj6x9nY+seQ**An0BAA**AAMAAA**PpioAZjw8mCxVt0pqkk749Yb5v0gTCgKSXUcQedT6MhtnDSO4CL2CwtOzOzMn4uwDGr3LIzawpsA/RkBeXpTInV/CITheT3XCyPh5t1O9OMgQy1fAvA6oHmfSjZtXUeEevdvnGRMnOz7gVZ13M6ZCRcReMQotcUkJ+UXqLxogoUrgmtVG3SE8+5mbAYnTmr/nwV3h+l5t3AxVVCr1d795tDXkyqpkXkZ+YY6xnDyg7UUTH3iXQxLPTB2CsmjIaU3wtbSfjQ+0Ep0mTsxKm7Wna2YEidRq9CBP71ynlVIO+iyOHg1Q6kfn6NWZHX1Oynzl6FXR1M2PpeT92xaVtAmg19JI1opydhdbD+CvwpSnrozmrUV57FsL+KyXVOI40JjbMfJFqHbJYZIQXVI+OgV2LxYmo4rv14tR5WiveTsZi482uXf0oL8OLn1hBQ4gN3ANlD2iv48VZjkIL7G/rmnGIvAd982DrujhB4kR8n0f3LcZKBPlCXrTTFnwNdaq/UHSNa4WjO0F0KwieNIDZ3+yqvF69r8ygHfb2zfiIHxDKED9vcv6KK6mcJgkwOKRF4MPZyV4sRZqjrLrOd/L3KVEVTy6MpkRC8P+n+YXuJ8sSXtZz9qTDIrv9SyJutvZs9Xy2Kk21dj39QWOnYxQiJ18pFLsg9In9O2it6+B3PPIqfUoUVE6G2LgVfpf7bnlleurBqemkKPftyN9Ml1b30OQBcM/T5Djcep6ffgsSrP7XnFojKCS811V5e1I0YzN9Xc";
	$siteid =0;
	$callname = "GetItem";	
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
$apicall .= "&SERVICE-VERSION=$findversion";
$apicall .= "&SECURITY-APPNAME=$findappid";
$apicall .= "&RESPONSE-DATA-FORMAT=XML&REST-PAYLOAD";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&categoryId=6001";
$apicall .= "&paginationInput.entriesPerPage=100";
$apicall .= "&paginationInput.pageNumber=10";
$apicall .= "&sellingStatus.sellingState=Active";
$apicall .= "&descriptionSearch=true";
$apicall .= "&outputSelector=AspectHistogram";

if($attribute == "manufacturer"){	
	$apicall .= "&aspectFilter(0).aspectName=Make";
	$apicall .= "&aspectFilter(0).aspectValueName(0)=".  urlencode($value);
}	
else{
	$apicall .= "&aspectFilter(0).aspectName=Make";
	$apicall .= "&aspectFilter(0).aspectValueName(0)=". urlencode($manufac);
	$apicall .= "&aspectFilter(0).aspectName=Model";
	$apicall .= "&aspectFilter(0).aspectValueName(0)=". urlencode($value);
}



$apicall .= "$urlfilter";

// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file(urlencode($apicall));

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
		$type = "Model";
		$model = $resp->xpath(sprintf('/*/*/*[@name = "%s"]',$type));
		$arr = array();
                
		foreach($model[0]->valueHistogram as $name){
                        $arr[]['value'] = (string)$name[valueName];
		}
                echo $arr = json_encode($arr);
		exit;
	
}
