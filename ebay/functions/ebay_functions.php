<?php
function fetchEbayCar($itemId, $action){
	
	$common = new common();
	
	// crated by us
	//$version = 773;
	//$devid = "e872f3d0-8bee-4784-b631-f0c6e0468c21";
	//$appid = "Planetwe-4831-4322-a03c-57a0a2d3aafb";
	//$certid = "574bc5e0-889c-431c-b3aa-918f19b83e0e";
	//$siteid =0;
	//$callname = "GetItem";
	//$accesToken = "AgAAAA**AQAAAA**aAAAAA**4gqXUg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AGkISjAJWBpg6dj6x9nY+seQ**An0BAA**AAMAAA**5D3c3AfScHkf+mmuQBsiuSAHvJ5dvb5KeUGyfX43IK6P4wjRzo5Rj7MxubzlEB+QmPf+nrkYAUU8V0nczpqvYaFl8orKRmqEdXKW0JqUE72CHfNIeNkcE7usMZZ9g97D9Be4yfDdAILBxTOEh4TdV4U3YD19Gfq1aSalXtSnLNndWFKS3j4vO4yBcZImdPkoNgCj7gtwidbz8l6zv+EHBUIRXqoEMP6gAZIY2JLjGq1T/u96NqQj7UKyzwoCvAsmUWL/0JTieQXuKqlM5sFdwKdEUAJzgaiK93ghP2aLFde3Rxqgh5sijGeT+f2KIKODYO9PILnRsiEKFyamt5OPLRmPfFeKBAv9kYoj0plLHbeeEBMP+F6QdwHrnK8pq/xMMm1K71JpjN1hoI3MbrFzNLNh/6b8NTHjlbYqjn8e6TJ2j8CyQe8XaiB4BlI4aBdJXW2ikxaWtBP7SAHTSmTFKk7t7xNP3Ti+BAAr1Uc+kyMBLs7o2m5vvJxz6bj/fxgcoUAv+GNt5/PtuuB60o4x9bG1WWp50+zZsqBlLCEwBxDKhbZ49jJRNc8nbM9xUcaupLxVTxUwbqoPpWB2i/dZuA+7xxfB0AyCTzFU9xPpZUIoEfCUcSFtZ0euub2w9jET4imzeJCc41sE3Qo/wB2AubK5oMn6wJXTsvu2sHRQgIsM/vJOweg6uLIZ15gb6Pn7JD+trob9IzCXoSwK/ytCdDOWfT589Fg7tw6A4pK31eMUjIwaYuH+l1SoItIBWBLV";
	
	//Details provided by client
	$version = 849;
	$devid = "E69WP8Z16P996R8H2K1EWU7LC2F4P4";
	$appid = "francois-1656-442d-bf2d-37b84676c2fb";
	$certid = "2f56d2cd-9d4b-45a5-8945-67c432f53d29";
	$siteid = 0;
	$callname = "GetItem";
	//$accesToken = "AgAAAA**AQAAAA**aAAAAA**It2lUg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wJlIOhCJWCpQ6dj6x9nY+seQ**fzgAAA**AAMAAA**HO7Ff5QcNtBiD9NvWdD1xP+4GLKHGfpUP+SwT+cDf4AnxrGLcjv2DHcPivAGLK06agYWzcX4jpuhunP+WbdU5Uw8T8S1fBdsV2pwuCVTG1a2lMz2zHSgqvhQ+CLS3eBqZ9APg/gg/HVG8PBhJa147C4OtSAoJb0Q1CNM9Fmi4iHoX91KM14b6g9LhOUpIH1ODtlpkiwQhA+ZBe8lyxZzgNgVL1NpaWBv6Z5WRBgdQmGRh5OUxhteTOp0iDG5pzVA7isLCfQyBf41mcrdMAWrNBlyGGVSIWjk82M4kHYbd7uRA9w+cr+YUkC2J8f2T3DuoRqxBDShUnlm9rn+PYYqYJjn5c+DIz6GMMVnrgURZd/8HHu5jbGCGnEgnTIvcP64zdUSzzMV9i6XE32Mw2Wse0qVVPEMYRPwkGAejvBh5NlwpSYaTHw4ePmGV5oKYma/Qoyxa0CxsZ6YFIgKI2RVsjUJBihixnfQU7JUcjwwMtJ1oVfyjmT7aDX5CGkwR9LfGyJQWAYDler441lRFw8Ci7D87h1H6sd2SY2Szy5HsWuNTwOl8IHgio6Yw1acpZSAUDJ8jhWV8pKITBq0oJvQX7VF8DjjYNN+zp4329U89yfH1kjaS79a5TJgBSUMU9UDZi2HilDzEaPLJJcZr8DctxoZrEsh1fozvlvwbAehRQcsHnBqTCVGWme47BY9Ia5eTipFlSYDo7Sl8V0gUQeiEOtca+f0sR6qvb85sW5EYDWuWXCaS4YR+taT9L5OxO25";

$accesToken="AgAAAA**AQAAAA**aAAAAA**fqSbVQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AGkISjAJWBpg6dj6x9nY+seQ**An0BAA**AAMAAA**F5lNYkkTF5+eh9ORJHXXaAi0kOFTeYMNzeVxybYeVyTcvJWc8bn4auZqxUK25zO8gqfChFLU1b3UbRcgJmhoQcVqb0L7rmNpFctACptDN7zUw+iv9ZLeePmxUFivtc5KUtPa7XLYKF4khJc7l5MWBwtzGC7+QKPWNRBoccYnpz5X6n7KHymsf1sH00toTpSczFBzQGFQcP65pyioz45/QQ//8f90jOyFXs60nR0RGHItNnwjjfQy/J2U6AhXSorLl3jOhqJhMErkNrmzkv9hjTYlpVoWhlJWGz93O5YKzneDW3h/pgikw7taeC63EUNCMHqM5eP16e+o2iOUFJ+AhvN0t4joK8/7JLuhUggOJLDQFvp9T5wzRMSmhhPobmI/ABfN0EgxFbiNb/9hDelf9HotFt2MvCsoupqVzat3Kz+hGWlovE+qieoKrQOzSi8Rzm/DTNBEequJtPd7MOSX/boW0Y/Hl0hnyzPoszj6wCepHtSilZrLHL0RO3+9ocSmmTJKgi038+oIJS4wC81YP0bTBReu3HHM9/cb5b457JJZ0TSo/mX9Mv+tPfrsWmzo4huyXspp3KdjeaTOvn+IzfiOekrE3JDRi7aPUFgY00A/gpQTkT1bgabdIm9V86zJVXvRDJXfa7vp2nCaA2BuQzJF2RLIoW6CYDnOV7oLJsYRo7QKRaCY6S8rDmiJTgrd99zZSusNYldBCJuFAj4g0abmEmiJr2aCKEtL5wFb9UDNWM7v0J2IELjzAf+p0dF1";


	$xml = '<?xml version="1.0" encoding="utf-8"?>
				<GetItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">
					<RequesterCredentials>
						<eBayAuthToken>'.$accesToken.'</eBayAuthToken>
					</RequesterCredentials>
					<DetailLevel>ReturnAll</DetailLevel>
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
	//echo "<pre>";print_r($output);die;
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
	foreach($specs as $keys=>$data){
		$std_equips[] = $keys."^".$data;
	}
	$std_equip = implode("~",$std_equips);

	$postalCode = (string)$item->PostalCode;
	$location = (string)$item->Location;
	$country = (string)$item->Country;
	$timeLeft = (string)$item->TimeLeft;
	
	if((int) $item->BuyItNowPrice == 0){
		$buyItNowAvailable = 0;
		$buyItNowPrice = (float)$item->SellingStatus->ConvertedCurrentPrice;
	}
	else{
		$buyItNowAvailable = 1;
		$buyItNowPrice = (float)$item->BuyItNowPrice;
	}
	$vin = (string)$item->VIN;
	$endTimes = (string)$item->ListingDetails->EndTime;
	$listingType = (string)$item->ListingType;
	$title = (string)$item->Title." ".(string)$item->SubTitle;
	$itemData = (array) $item;
	
	if( !empty($itemData)) {
	    $datArray = array("itemId"=>$itemId,
					      "galleryURL"=>mysql_escape_string($gallerystr),
					      "postalCode"=>$postalCode,
					      "location"=>$location,
					      "country"=>$country,
					      "endTime"=>$timeLeft,
					      "buyItNowPrice"=>$buyItNowPrice,
					      "listingType"=>$listingType,
					      "buyItNowAvailable"=>$buyItNowAvailable,
					      "ConditionDisplayName"=>$ConditionDisplayName,
					      "title"=>mysql_escape_string($title),
					      "description"=>base64_encode($description),
					      "stdequip"=>mysql_escape_string($std_equip),
					      "vin"=>$vin,
					      "Year"=>$specs['Year'],
					      "Make"=>$specs['Make'],
					      "Model"=>$specs['Model'],
					      "Mileage"=>$specs['Mileage'],
					      "endson"=>$endTimes,
					      "endtimestamp"=>strtotime($endTimes));
	    
	    
	    if($action == "update"){
		    $common->update("ebay_car",$datArray," itemId = ".$itemId);
	    }
	    elseif($action == "save"){
		    $common->save("ebay_car",$datArray);
	    }
	}
	return $common->CustomQuery("Select * from ebay_car where itemId = ".$itemId);
	
}
?>
