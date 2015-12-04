<?php

include_once "../conf/config.inc.php";

/*error_reporting(E_ALL | E_STRICT);
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);*/

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$findversion = '1.0.0';  // API version supported by your application
$findappid = 'dothejob-c9de-4e5d-adf2-73a736a2651a';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = 'car';  // You may want to supply your own query
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
$apicall .= "&aspectFilter(0).aspectName=Make";
$apicall .= "&aspectFilter(0).aspectValueName(0)=Mercedes-Benz";
/*$apicall .= "&aspectFilter(0).aspectValueName(1)=Aston+Matin";
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
$apicall .= "&aspectFilter(0).aspectValueName(13)=Morgan";
$apicall .= "&aspectFilter(0).aspectValueName(14)=Plymouth";
$apicall .= "&aspectFilter(0).aspectValueName(15)=Pontiac ";
$apicall .= "&aspectFilter(0).aspectValueName(16)=Porsche";
$apicall .= "&aspectFilter(0).aspectValueName(17)=Studebaker";
$apicall .= "&aspectFilter(0).aspectValueName(18)=Toyota";*/
$apicall .= "$urlfilter";

// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);

 //$resp->searchResult->item;
$totalpages = $resp->paginationOutput->totalPages;
// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';
 // If the response was loaded, parse it and build links  
  $obj_setting 		= new common();
 
/* foreach($resp->searchResult->item as $finditem) {
	 echo $title = $finditem->title;
	 echo "<br />";
 } */
$resp->asXml('finding_Mercedes.xml');

exit;
/*$resp->asXml('finding.xml');

*/

  foreach($resp->searchResult->item as $finditem) {
  	
	$itemId = $finditem->itemId;
	$title = $finditem->title;
	 $postalCode = $finditem->postalCode;
	 $location = $finditem->location;
	 $country = $finditem->country;
	$startTime = $finditem->startTime;
	$endTimes = $finditem->listingInfo->endTime;
	$listingType = $finditem->listingInfo->listingType;
	$buyItNowAvailable = ($finditem->listingInfo->buyItNowAvailable == 'true') ? 1:0;
	$buyItNowPrice = $finditem->sellingStatus->convertedCurrentPrice;
	if($finditem->listingInfo->buyItNowAvailable == 'true'){
		$buyItNowPrice = $finditem->listingInfo->buyItNowPrice;
	}
	
	if($obj_setting->numberOfRows("ebay_car"," itemId=".$itemId) < 1){
			$xml = '<?xml version="1.0" encoding="utf-8"?>
				<GetItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">
					<RequesterCredentials>
						<eBayAuthToken>'.$userToken.'</eBayAuthToken>
					</RequesterCredentials>
					<DetailLevel>ReturnAll</DetailLevel>
					<OutputSelector>Item.VIN,Item.ListingDetails.EndTime,Item.ItemID,Item.PictureDetails.PictureURL,Item.SellingStatus.CurrentPrice,Item.SubTitle,Item.ItemSpecifics,Item.ConditionDisplayName,Item.Description</OutputSelector>
					<IncludeItemSpecifics>true</IncludeItemSpecifics>
					<ItemID>'.$itemId.'</ItemID>
				</GetItemRequest>​';
		
		$ch = curl_init("https://api.ebay.com/ws/api.dll?siteid=$siteid");
		
		$headers =	array('X-EBAY-API-COMPATIBILITY-LEVEL: '.$version,
						  'X-EBAY-API-DEV-NAME: '.$devid,
						  'X-EBAY-API-APP-NAME: '.$appid,
						  'X-EBAY-API-CERT-NAME: '.$certid,
						  'X-EBAY-API-CALL-NAME: '.$callname,
						  'X-EBAY-API-SITEID: '.$siteid);
		
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		
		$output = curl_exec($ch);
		curl_close($ch);
		
		
		
		
		$res =  simplexml_load_string($output);
		$item = $res->Item;	
		
		pr($res);
		/*$res->asXml('trading.xml');
		*/
		exit;
		
		
		$gallery = array();
		foreach($item->PictureDetails->PictureURL as  $val){
			$gallery[] = (string)$val;
		}
		$gallerystr = implode("**",$gallery);
		
		$ConditionDisplayName =  (string) $item->ConditionDisplayName;	
		$description = (string) $item->Description;
		
		$specs = array();
		
		foreach($item->ItemSpecifics->NameValueList as $arr){
			$valus = array();
			foreach($arr->Value as $val){
				$temp = (string) $val;
				$valus[] = $temp;
			}
			
			$values = implode(",",$valus);
			$key = (string) $arr->Name;
			$specs[$key] = $values;
		}	
		$std_equips = array();
		foreach($specs as $keys=>$data){
			$std_equips[] = $keys."^".$data;
		}
		$std_equip = implode("~",$std_equips);
		$results .= "<tr><td><img src=\"$galleryURL\"></td><td><a href=\"$link\">$title</a></td><td>$time</td></tr>";
		$datArray = array("itemId"=>$itemId,
						  "galleryURL"=>$gallerystr,
						  "postalCode"=>$postalCode,
						  "location"=>$location,
						  "country"=>$country,
						  "endTime"=>$finditem->sellingStatus->timeLeft,
						  "buyItNowPrice"=>$buyItNowPrice,
						  "listingType"=>$listingType,
						  "buyItNowAvailable"=>$buyItNowAvailable,
						  "ConditionDisplayName"=>$ConditionDisplayName,
						  "title"=>$title,
						  "description"=>$description,
						  "stdequip"=>$std_equip,
						  "vin"=>$item->VIN,
						  "Year"=>$specs['Year'],
						  "Make"=>$specs['Make'],
						  "Model"=>$specs['Model'],
						  "Mileage"=>$specs['Mileage'],
						  "endson"=>$endTimes,
						  "endtimestamp"=>strtotime($endTimes));
	
		$obj_setting->save("ebay_car",$datArray);
	}
	else
	{
		$obj_setting->update("ebay_car",array("endTime"=>$finditem->sellingStatus->timeLeft)," itemId=".$itemId);
	}
  }
}
// If the response does not indicate 'Success,' print an error
else {
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}

/*
// to add all cars from ebay.com 
if($resp->paginationOutput->totalPages > 1) { 

for($page = 2; $page<=$totalpages;$page++)
{

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
$apicall .= "&paginationInput.pageNumber=".$page;
$apicall .= "&sellingStatus.sellingState=Active";
$apicall .= "&descriptionSearch=true";
$apicall .= "$urlfilter";

// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);
//$resp->searchResult->item;
// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';
 // If the response was loaded, parse it and build links  
  $obj_setting 		= new common();
  foreach($resp->searchResult->item as $finditem) {
  	
	$itemId = $finditem->itemId;
	$title = $finditem->title;
	 $postalCode = $finditem->postalCode;
	 $location = $finditem->location;
	 $country = $finditem->country;
	$startTime = $finditem->startTime;
	$endTimes = $finditem->listingInfo->endTime;
	$listingType = $finditem->listingInfo->listingType;
	$buyItNowAvailable = ($finditem->listingInfo->buyItNowAvailable == 'true') ? 1:0;
	$buyItNowPrice = $finditem->sellingStatus->convertedCurrentPrice;
	if($finditem->listingInfo->buyItNowAvailable == 'true'){
		$buyItNowPrice = $finditem->listingInfo->buyItNowPrice;
	}
	
	if($obj_setting->numberOfRows("ebay_car","itemId=".$itemId) < 1){

		$xml = '<?xml version="1.0" encoding="utf-8"?>
			<GetItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">
				<RequesterCredentials>
					<eBayAuthToken>AgAAAA**AQAAAA**aAAAAA**GsfITw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AFkYekC5iHogidj6x9nY+seQ**An0BAA**AAMAAA**PpioAZjw8mCxVt0pqkk749Yb5v0gTCgKSXUcQedT6MhtnDSO4CL2CwtOzOzMn4uwDGr3LIzawpsA/RkBeXpTInV/CITheT3XCyPh5t1O9OMgQy1fAvA6oHmfSjZtXUeEevdvnGRMnOz7gVZ13M6ZCRcReMQotcUkJ+UXqLxogoUrgmtVG3SE8+5mbAYnTmr/nwV3h+l5t3AxVVCr1d795tDXkyqpkXkZ+YY6xnDyg7UUTH3iXQxLPTB2CsmjIaU3wtbSfjQ+0Ep0mTsxKm7Wna2YEidRq9CBP71ynlVIO+iyOHg1Q6kfn6NWZHX1Oynzl6FXR1M2PpeT92xaVtAmg19JI1opydhdbD+CvwpSnrozmrUV57FsL+KyXVOI40JjbMfJFqHbJYZIQXVI+OgV2LxYmo4rv14tR5WiveTsZi482uXf0oL8OLn1hBQ4gN3ANlD2iv48VZjkIL7G/rmnGIvAd982DrujhB4kR8n0f3LcZKBPlCXrTTFnwNdaq/UHSNa4WjO0F0KwieNIDZ3+yqvF69r8ygHfb2zfiIHxDKED9vcv6KK6mcJgkwOKRF4MPZyV4sRZqjrLrOd/L3KVEVTy6MpkRC8P+n+YXuJ8sSXtZz9qTDIrv9SyJutvZs9Xy2Kk21dj39QWOnYxQiJ18pFLsg9In9O2it6+B3PPIqfUoUVE6G2LgVfpf7bnlleurBqemkKPftyN9Ml1b30OQBcM/T5Djcep6ffgsSrP7XnFojKCS811V5e1I0YzN9Xc</eBayAuthToken>
				</RequesterCredentials>
				<DetailLevel>ReturnAll</DetailLevel>
				<OutputSelector>Item.VIN,Item.ListingDetails.EndTime,Item.ItemID,Item.PictureDetails.PictureURL,Item.SellingStatus.CurrentPrice,Item.SubTitle,Item.ItemSpecifics,Item.ConditionDisplayName,Item.Description</OutputSelector>
				<IncludeItemSpecifics>true</IncludeItemSpecifics>
				<ItemID>'.$itemId.'</ItemID>
			</GetItemRequest>​';

		$ch = curl_init("https://api.ebay.com/ws/api.dll?siteid=$siteid");
		
		$headers =	array('X-EBAY-API-COMPATIBILITY-LEVEL: '.$version,
						  'X-EBAY-API-DEV-NAME: '.$devid,
						  'X-EBAY-API-APP-NAME: '.$appid,
						  'X-EBAY-API-CERT-NAME: '.$certid,
						  'X-EBAY-API-CALL-NAME: '.$callname,
						  'X-EBAY-API-SITEID: '.$siteid);
		
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		
		$output = curl_exec($ch);
		curl_close($ch);
		
		$res =  simplexml_load_string($output);
		$item = $res->Item;	
			$gallery = array();
		foreach($item->PictureDetails->PictureURL as  $val){
			$gallery[] = (string)$val;
		}
		$gallerystr = implode("**",$gallery);
		
		$ConditionDisplayName =  (string) $item->ConditionDisplayName;	
		$description = (string) $item->Description;
		
		$specs = array();
		
		foreach($item->ItemSpecifics->NameValueList as $arr){
			$valus = array();
			foreach($arr->Value as $val){
				$temp = (string) $val;
				$valus[] = $temp;
			}
			$values = implode(",",$valus);
			$key = (string) $arr->Name;
			$specs[$key] = $values;
		}	
			$std_equips = array();
			foreach($specs as $keys=>$data)
			{
				$std_equips[] = $keys."^".$data;
			}
			$std_equip = implode("~",$std_equips);
			$results .= "<tr><td><img src=\"$galleryURL\"></td><td><a href=\"$link\">$title</a></td><td>$time</td></tr>";
			$datArray = array("itemId"=>$itemId,
							  "galleryURL"=>$gallerystr,
							  "postalCode"=>$postalCode,
							  "location"=>$location,
							  "country"=>$country,
							  "endTime"=>$finditem->sellingStatus->timeLeft,
							  "buyItNowPrice"=>$buyItNowPrice,
							  "listingType"=>$listingType,
							  "buyItNowAvailable"=>$buyItNowAvailable,
							  "ConditionDisplayName"=>$ConditionDisplayName,
							  "title"=>$title,
							  "description"=>$description,
							  "stdequip"=>$std_equip,
							  "vin"=>$item->VIN,
							  "Year"=>$specs['Year'],
							  "Make"=>$specs['Make'],
							  "Model"=>$specs['Model'],
							  "Mileage"=>$specs['Mileage'],
							  "endson"=>$endTimes,
							  "endtimestamp"=>strtotime($endTimes));
			
		$obj_setting->save("ebay_car",$datArray);
	}
	else
	{
		$obj_setting->update("ebay_car",array("endTime"=>$finditem->sellingStatus->timeLeft),"itemId=".$itemId);
	}
  }
}
// If the response does not indicate 'Success,' print an error
else {
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}
	}
}
*/