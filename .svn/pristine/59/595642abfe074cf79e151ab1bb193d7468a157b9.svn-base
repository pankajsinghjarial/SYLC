<?php
include_once "../conf/config.inc.php";

$version = 773;
$devid = "e872f3d0-8bee-4784-b631-f0c6e0468c21";
$appid = "Planetwe-4831-4322-a03c-57a0a2d3aafb";
$certid = "574bc5e0-889c-431c-b3aa-918f19b83e0e";
$siteid =0;
$callname = "GetItem";
$xml = '<?xml version="1.0" encoding="utf-8"?>
		<GetItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">
			<RequesterCredentials>
				<eBayAuthToken>AgAAAA**AQAAAA**aAAAAA**GsfITw**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AFkYekC5iHogidj6x9nY+seQ**An0BAA**AAMAAA**PpioAZjw8mCxVt0pqkk749Yb5v0gTCgKSXUcQedT6MhtnDSO4CL2CwtOzOzMn4uwDGr3LIzawpsA/RkBeXpTInV/CITheT3XCyPh5t1O9OMgQy1fAvA6oHmfSjZtXUeEevdvnGRMnOz7gVZ13M6ZCRcReMQotcUkJ+UXqLxogoUrgmtVG3SE8+5mbAYnTmr/nwV3h+l5t3AxVVCr1d795tDXkyqpkXkZ+YY6xnDyg7UUTH3iXQxLPTB2CsmjIaU3wtbSfjQ+0Ep0mTsxKm7Wna2YEidRq9CBP71ynlVIO+iyOHg1Q6kfn6NWZHX1Oynzl6FXR1M2PpeT92xaVtAmg19JI1opydhdbD+CvwpSnrozmrUV57FsL+KyXVOI40JjbMfJFqHbJYZIQXVI+OgV2LxYmo4rv14tR5WiveTsZi482uXf0oL8OLn1hBQ4gN3ANlD2iv48VZjkIL7G/rmnGIvAd982DrujhB4kR8n0f3LcZKBPlCXrTTFnwNdaq/UHSNa4WjO0F0KwieNIDZ3+yqvF69r8ygHfb2zfiIHxDKED9vcv6KK6mcJgkwOKRF4MPZyV4sRZqjrLrOd/L3KVEVTy6MpkRC8P+n+YXuJ8sSXtZz9qTDIrv9SyJutvZs9Xy2Kk21dj39QWOnYxQiJ18pFLsg9In9O2it6+B3PPIqfUoUVE6G2LgVfpf7bnlleurBqemkKPftyN9Ml1b30OQBcM/T5Djcep6ffgsSrP7XnFojKCS811V5e1I0YzN9Xc</eBayAuthToken>
			</RequesterCredentials>
			<DetailLevel>ReturnAll</DetailLevel>
			<OutputSelector>Item.VIN,Item.ListingDetails.EndTime,Item.ItemID,Item.PictureDetails.PictureURL,Item.SellingStatus.CurrentPrice,Item.SubTitle,Item.ItemSpecifics,Item.ConditionDisplayName,Item.Description</OutputSelector>
			<IncludeItemSpecifics>true</IncludeItemSpecifics>
			<ItemID>221040308575</ItemID>
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
pr($res);


$item = $res->Item;


$gallery = array();
foreach($item->PictureDetails->PictureURL as  $val){
	$gallery[] = $val;
}



$specs = array();

foreach($item->ItemSpecifics->NameValueList as $arr){
	$valus = array();
	foreach($arr->Value as $val){
		$temp = (array) $val;
		$valus[] = $temp[0];
	}
	
	$key = (array) $arr->Name;
	$specs[$key[0]] = $valus;
}


 $price =(int) $item->SellingStatus->CurrentPrice;
