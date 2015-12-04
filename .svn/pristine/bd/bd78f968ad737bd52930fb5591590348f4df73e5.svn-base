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
						<eBayAuthToken>AgAAAA**AQAAAA**aAAAAA**4gqXUg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AGkISjAJWBpg6dj6x9nY+seQ**An0BAA**AAMAAA**5D3c3AfScHkf+mmuQBsiuSAHvJ5dvb5KeUGyfX43IK6P4wjRzo5Rj7MxubzlEB+QmPf+nrkYAUU8V0nczpqvYaFl8orKRmqEdXKW0JqUE72CHfNIeNkcE7usMZZ9g97D9Be4yfDdAILBxTOEh4TdV4U3YD19Gfq1aSalXtSnLNndWFKS3j4vO4yBcZImdPkoNgCj7gtwidbz8l6zv+EHBUIRXqoEMP6gAZIY2JLjGq1T/u96NqQj7UKyzwoCvAsmUWL/0JTieQXuKqlM5sFdwKdEUAJzgaiK93ghP2aLFde3Rxqgh5sijGeT+f2KIKODYO9PILnRsiEKFyamt5OPLRmPfFeKBAv9kYoj0plLHbeeEBMP+F6QdwHrnK8pq/xMMm1K71JpjN1hoI3MbrFzNLNh/6b8NTHjlbYqjn8e6TJ2j8CyQe8XaiB4BlI4aBdJXW2ikxaWtBP7SAHTSmTFKk7t7xNP3Ti+BAAr1Uc+kyMBLs7o2m5vvJxz6bj/fxgcoUAv+GNt5/PtuuB60o4x9bG1WWp50+zZsqBlLCEwBxDKhbZ49jJRNc8nbM9xUcaupLxVTxUwbqoPpWB2i/dZuA+7xxfB0AyCTzFU9xPpZUIoEfCUcSFtZ0euub2w9jET4imzeJCc41sE3Qo/wB2AubK5oMn6wJXTsvu2sHRQgIsM/vJOweg6uLIZ15gb6Pn7JD+trob9IzCXoSwK/ytCdDOWfT589Fg7tw6A4pK31eMUjIwaYuH+l1SoItIBWBLV</eBayAuthToken>
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
	
	//echo "<pre>";var_dump($item);die;
	
	// Your subject
	$heading = $subject= $_POST['name']." ".$_POST['prename'].' ajouter une voiture à sa sélection';
	
	$subHeading = 'Les détails sont comme ci-dessous : ';
	
	$emailData['Nom'] = $_POST['name'].' '.$_POST['prename'];
	$emailData['Adresse e-mail'] = $_POST['email'];
	$emailData['Numéro de téléphone'] = $_POST['phone'];
	
	// Cart details
	$emailData['Détails du véhicule'] = null;
	$emailData['Id de voiture'] =  $_POST['car_id'];
	$emailData['titre'] =  $item->title;
	$emailData['vin'] =  $item->vin;
	$emailData['Achat immédiat Prix'] =  $common->CurrencyConverter($item->buyItNowPrice).' &euro;';
	$emailData['Construire'] =  $item->Make;
	$emailData['Modèle'] =  $item->Model;
	$emailData['Kilométrage'] =  number_format($item->Mileage, 2).' Mi';
	$emailData["Vous avez reçu un e-mail à partir d'ici"] = DEFAULT_URL."/ebay/".$_POST['car_id'];
	
	$message = emailContentsWrapper($emailData,$heading,$subHeading);
	
	$adminEmails = $common_obj->getAdminNotificationEmails(); 
	foreach($adminEmails as $email ) {
	    sendSmtpMail( $email, $subject, $message);
	}
	
	//Send confirmation to User
	$heading = 'Merci';
	$subHeading = 'Vous ajoutez une voiture de votre choix avec les détails suivants.';
	$footerHeading = 'Merci encore<br/>Americamcarcentrale.com';
	$emailData = null;
	$emailData['Nom'] = $_POST['name'].' '.$_POST['prename'];
	$emailData['Adresse e-mail'] = $_POST['email'];
	$emailData['Numéro de téléphone'] = $_POST['phone'];
	
	$message = emailContentsWrapper($emailData, $heading, $subHeading, $footerHeading);
	
	sendSmtpMail($_POST['email'], 'Merci', $message);
	
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
	//error_reporting(E_ALL);
//ini_set('display_errors', '1');
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"email"=>$_POST['email'],"submit_date"=>date("Y-m-d H:i:s"));
	$common_obj->save("car_inquiry",$arr);	
	
	$mailHeading = (!empty($_POST['order']) && $_POST['order'] == 1 ) ? "A fait une demande de L’historique de cette voiture ici;" : "A fait une demande de fiche technique de cette voiture ici;";
	
	//Send confirmation to User
	
	$heading = 'Merci';
	$subHeading = 'Votre adresse e-mail a été reçu, un de nos représentants vous contactera avec les informations de la voiture.<br><br>Merci encore<br/>Americamcarcentrale.com';
	$message = emailContentsWrapper(null,$heading,$subHeading);
	sendSmtpMail($_POST['email'], 'Merci', $message);
	
	
	// Send admin Notifications
	
	$heading = "Un invité envoyé demande d'enquête pour une voiture";
	$subHeading = 'ce client '.$_POST['email'].' '.$mailHeading.'<br/>Détails du véhicule';
	$emailData['Id de voiture'] =  $_POST['car_id'];
	$emailData['titre'] =  $item->title;
	$emailData['vin'] =  $item->vin;
	$emailData['Achat immédiat Prix'] =  $common->CurrencyConverter($item->buyItNowPrice).' &euro;';
	$emailData['Construire'] =  $item->Make;
	$emailData['Modèle'] =  $item->Model;
	$emailData['Kilométrage'] =  number_format($item->Mileage, 2).' Mi';
	$emailData["Vous avez reçu un e-mail à partir d'ici"] = DEFAULT_URL."/ebay/".$_POST['car_id'];
	
	$message = emailContentsWrapper($emailData,$heading,$subHeading);
	
	$adminEmails = $common_obj->getAdminNotificationEmails();
	foreach($adminEmails as $email ) {
	    $sentmail = sendSmtpMail( $email, $heading,$message);
	}
	
	
	// Send Success message to User.
	
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

