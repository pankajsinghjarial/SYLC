<?php  
extract($_POST);
extract($_GET);
$search = new search();
$common = new common();
 
if(isset($_SESSION['User']['id']) && $_SESSION['User']['id']>0){ 
    $getSelectedCarListSQL = "SELECT count(id) from wishlist where car_id = $carid AND user_id = ".$_SESSION['User']['id'];
    $result = mysql_query($getSelectedCarListSQL);
    $isSelect = mysql_fetch_assoc($result);    
}
function fetchEbayCar($itemId, $action){
	
	$common = new common();
	
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
	
	return $common->CustomQuery("Select * from ebay_car where itemId = ".$itemId);
	
}


$ebayid = $common->CustomQuery("Select * from ebay_car where itemId = ".$carid);
$item = '';
if(mysql_num_rows($ebayid) > 0){
	$item = mysql_fetch_object($ebayid);
	//echo "<pre>";print_r($item);die;
	if($item->vin == ''){
		$ebayid = fetchEbayCar($carid, "update");
	}
	
}
else{
	$ebayid = fetchEbayCar($carid,"save");
	$item = mysql_fetch_object($ebayid);
}


if(isset($_POST) && isset($_POST["add_to_sel"]))
{
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"type"=>0);
	$common_obj->save("contact",$arr);
	
	// Your subject
	$subject= $_POST['name']." ".$_POST['prename'].' add a car to his selection';
	// From
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'From: '.$_POST['name'].'<'.$_POST['email'].'>' . "\r\n";
	$message = $_POST['name'].' '.$_POST['prename'].'added a car to his selection.<br />
		Details are as below :<br/>
		Name : '.$_POST['name'].' '.$_POST['prename'].'<br/>
		Car Id : '.$_POST['car_id'].'<br/>
		E-mail: '.$_POST['email'].'<br/>
		Phone Number: '.$_POST['phone'];

	$sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, $subject, $message );
	$message = 'You add a car to your selection with following details.<br />
			 Name : '.$_POST['name'].' '.$_POST['prename'].'<br/>
			 E-mail: '.$_POST['email'].'<br/>
			 Phone Number: '.$_POST['phone'];
	sendSmtpMail( $_POST['email'], "Thank you", $message );

	$_SESSION['sentmail_txt'] = '
	<script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
	<link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			$.msgBox({
				title:"Merci",
				content:"Nous avons ajouté votre demande avec succès",
				type:"info",
				timeOut:5000,
				opacity:0.6,
				autoClose:true
			});
		});
	})(jQuery); 
	</script>';
}
elseif(isset($_POST) && isset($_POST["add_to_enquire"]))
{
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"email"=>$_POST['email'],"submit_date"=>date("Y-m-d H:i:s"));
	$common_obj->save("car_inquiry",$arr);	
	// Your subject
	// From
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	// Additional headers
	//$headers .= 'From:  . \r\n';
	$message = "Address Votre email a &egrave;t&egrave; enregistr&egrave; pour une voiture. Contactez l'administrateur du site Hars Peu";
	$sentmail = sendSmtpMail( $_POST['email'], "Merci",  utf8_encode($message) ,$headers );
	$sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, "Merci",  "Un invité envoyé demande d'enquête pour une voiture" ,$headers );
	$_SESSION['sentmail_txt'] = '
	<script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
	<link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			$.msgBox({
				title:"Merci",
				content:"Nous avons ajouté votre demande avec succès",
				type:"info",
				timeOut:60000,
				opacity:0.4,
				autoClose:true
			});
		});
	})(jQuery); 
	</script>';
}
elseif(isset($_POST) && isset($_POST["send_invite"]))
{
	global $db;
	// Your subject
	// From
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	//$headers .= 'From:  . \r\n';
	$message = '
		-----------------------------------------------
		One of your friend send you a link for a car. 
		Please visit the below link to view the detail of car
		<a href="'.DEFAULT_URL.'/ebay/'.$_POST['car_id'].'"> '.DEFAULT_URL.'/ebay/'.$_POST['car_id'].'</a>
			Thank you
		-----------------------------------------------';
	$sentmail = sendSmtpMail( $_POST['email'], "Merci", $message );
	
	$_SESSION['sentmail_txt'] = '
		<script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
			<link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
			<script type="text/javascript">
				(function($){
					$(document).ready(function(){
						$.msgBox({
							title:"Merci",
							content:"Lien envoy� avec succ�s",
							type:"info",
							timeOut:60000,
							opacity:0.4,
							autoClose:true
						});
					});
				})(jQuery); 
		</script>';
}


$Make= $common->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");

$car_meta_values['title'] = $item->title;

$_SESSION['ebay_desc'] = base64_decode($item->description);
$dsadasda = explode("~",$item->stdequip);
foreach($dsadasda as $asdadsasd)
{
	$asdadsa = explode("^",$asdadsasd)	;
	$car_meta_values['description'] .= $asdadsa[0].": ". $asdadsa[1].", ";
}

