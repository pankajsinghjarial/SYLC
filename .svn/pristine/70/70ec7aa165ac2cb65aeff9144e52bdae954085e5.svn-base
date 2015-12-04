<?php 
extract($_GET);
extract($_POST);
if(isset($_POST['submit']) && $_POST['submit'] == 'sub_home')
{
	unset($_SESSION['mysearch']); 
	$_SESSION['mysearch'][] = $_POST;
	
}
if(isset($_GET['announces']) && $_GET['announces'] == 'announces')
{
	unset($_SESSION['mysearch']);
	$_SESSION['mysearch'][] = $_GET;
	//echo "<pre>";print_r($_SESSION['mysearch']);die;
	
}
if(isset($_REQUEST['manufacturer']))
{
	unset($_SESSION['mysearch']);
	$_SESSION['mysearch'][] = $_REQUEST;
}
extract($_SESSION['mysearch'][0]);

$search = new search();
$common = new common();

if(isset($_SESSION['User']['id']) && $_SESSION['User']['id']>0){
    $getSelectedCarListSQL = "SELECT car_id from wishlist where user_id = ".$_SESSION['User']['id'];
    $result = mysql_query($getSelectedCarListSQL);
    while($row = mysql_fetch_assoc($result)){
        $favList[] = $row['car_id'];
    }
}


$where = "";
$searched = '';
$addtopaging ="?";

if(isset($_POST) && isset($_POST["add_to_sel"])){
	global $db;
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"type"=>2);
	$common->save("contact",$arr);	
	
	$arr_new = array("itemId"=>$_POST['car_id'],"title"=>$_POST['title'],"buyItNowPrice"=>$_POST['buyItNowPrice'],"postalCode"=>$_POST['postalCode'],"location"=>$_POST['location'],"listingType"=>$_POST['listingType'],"endson"=>$_POST['endson'],"endtimestamp"=>$_POST['endtimestamp'],"buyItNowAvailable"=>$_POST['buyItNowAvailable']);
	$common->save("ebay_car",$arr_new);	
	
			// Your subject
			$subject= $_POST['name']." ".$_POST['prename'].' ajouter une voiture à sa sélection';
			// From
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			// Additional headers
			$headers .= 'From: '.$_POST['name'].'<'.$_POST['email'].'>' . "\r\n";
			$message = $_POST['name'].' '.$_POST['prename'].' ajouter une voiture à sa sélection.<br />
			 Les détails sont ci-dessous :<br/>
			 nom : '.$_POST['name'].' '.$_POST['prename'].'<br/>
			 Car Id : '.$_POST['car_id'].'<br/>
			 Adresse e-mail: '.$_POST['email'].'<br/>
			 Numéro de téléphone: '.$_POST['phone'];
			 
			 $subject = html_entity_decode(htmlentities($subject, ENT_QUOTES, "UTF-8"));
			$message = html_entity_decode(htmlentities($message, ENT_QUOTES, "UTF-8"));
		
			$adminEmails = $common->getAdminNotificationEmails();
			foreach($adminEmails as $email ) {
			    sendSmtpMail( $email, $subject, $message);
			}
	    
			//$sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, $subject, $message);

		$_SESSION['sentmail_txt'] = '<script type="text/javascript">
			$ = jQuery.noConflict();	
		</script>
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

if(isset($_POST) && isset($_POST["consult_to_spacs"])){
	
	global $db;
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name']." ".$_POST['prename'],"email"=>$_POST['email'],"time"=>$_POST['recall'],"question"=>$_POST['question'],"phone"=>$_POST['phone'],"message"=>$_POST['message'],"type"=>3);
	$common->save("contact",$arr);	
	
	$carid = $_POST['car_id'];
	// get car details
	
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
	
	$arr_new = array("itemId"=>$_POST['car_id'],"title"=>$_POST['title'],"buyItNowPrice"=>$_POST['buyItNowPrice'],"postalCode"=>$_POST['postalCode'],"location"=>$_POST['location'],"listingType"=>$_POST['listingType'],"endson"=>$_POST['endson'],"endtimestamp"=>$_POST['endtimestamp'],"buyItNowAvailable"=>$_POST['buyItNowAvailable']);
	$common->save("ebay_car",$arr_new);	
	
	// Send Admin notifications
	
	$comment1 = str_replace("\'", "'", $_POST['message']);
	$question = str_replace("\'", "'", $_POST['question']);
	// Your subject
	$subject= $_POST['name']." ".$_POST['prename'].' demande à entrer en contact avec un spécialiste';
	 
	$heading = $subject;// = html_entity_decode(htmlentities($subject, ENT_NOQUOTES, "UTF-8"));
	$subHeading = 'Les détails sont ci-dessous:';
	
	$emailData['Nom'] = $_POST['name'].' '.$_POST['prename'];
	$emailData['Adresse e-mail'] = $_POST['email'];
	$emailData['Numéro de téléphone'] = $_POST['phone'];
	$emailData['Moment approprié pour appeler'] = $_POST['recall'];
	$emailData['Question'] = $question;
	$emailData['message'] = $comment1;
	
	
	// Cart details
	$emailData['Détails du véhicule'] = null;
	$emailData['Id de voiture'] =  $_POST['car_id'];
	$emailData['titre'] =  $item->title;
	$emailData['vin'] =  $item->vin;
	$emailData['Achat immédiat Prix'] =  $common->CurrencyConverter($item->buyItNowPrice).' &euro;';
	$emailData['Construire'] =  $item->Make;
	$emailData['Modèle'] =  $item->Model;
	$emailData['Kilométrage'] =  number_format($item->Mileage, 2).' Mi';
	$emailData["Vous avez reçu un e-mail à partir d'ici"] = DEFAULT_URL."/announces";
	
	$message = emailContentsWrapper($emailData,$heading,$subHeading);
	//$message = html_entity_decode(htmlentities($message, ENT_NOQUOTES, "UTF-8"));
	$adminEmails = $common->getAdminNotificationEmails();
	foreach($adminEmails as $email ) {
		sendSmtpMail( $email, $subject, $message);
	}
	
	
	
	// Send confirmation to User
	
	$heading = 'Merci';
	$subHeading = 'Votre demande a bien été reçue.<br><br>Merci encore<br/>Americamcarcentrale.com';
	$message = emailContentsWrapper(null,$heading,$subHeading);
	sendSmtpMail($_POST['email'], 'Merci', $message);
	
	
	$_SESSION['sentmail_txt'] = '<script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
   <link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
   <script type="text/javascript">
	   $(document).ready(function(){
		   $.msgBox({
			   title:"Merci",
			   content:"Nous avons ajouté votre demande avec succès",
			   type:"info",
			   timeOut:3000,
			   opacity:0.9,
			   autoClose:true
		   });
	   });
	   </script>';
     }
$addtopaging1 ='';

if($_GET)
{
	$args = explode("&",$_SERVER['QUERY_STRING']);
	foreach($args as $arg)
	{
		if($arg == '') continue;
		$keyval = explode("=",$arg);
		if($keyval[0] != "page" && $keyval[0] != "ipp" && $keyval[0] != "sort") $addtopaging1 .= "&" . $arg;
	}
	
}

$aspect_count = 0;


if(isset($manufacturer)){
	
	$searched = '<br>You Searched for ';
	if(isset($manufacturer)){
		$where = "&outputSelector=AspectHistogram";                
		$where .= "&aspectFilter(".$aspect_count.").aspectName=Make";
                $manfCount = 0;                
                if(is_array($manufacturer)){
                    $searched .= ' Manufacturer: <span class="searched">';
                    $manufacturer = array_filter($manufacturer);
                    foreach($manufacturer as $mnf){
                        $where .= "&aspectFilter(".$aspect_count.").aspectValueName($manfCount)=".urlencode(urldecode($mnf));
                        $manfCount++;
                        if($manfCount<count($manufacturer)){
                            $searched .=$mnf.",";
                        }else{
                             $searched .=$mnf;
                        }
                    }
                    $searched .= '</span>';
                }else{
                    $where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($manufacturer));
                    $searched .= ' Manufacturer: <span class="searched">'.urldecode($manufacturer).'</span>';
                }		
		
		$dataArray['manufacturer'] = $common->getIdByOptionName(2,urldecode($manufacturer));
		$aspect_count++;
	}
	if(isset($madeYear)){
		$madeYearArr = array_filter($madeYear);
		if(count($madeYearArr) == 2){
			if($madeYearArr[0] < $madeYearArr[1]){
				$madeYearStr = 	$madeYearArr[0]."-".substr($madeYearArr[1],2);
				$where .= "&aspectFilter(".$aspect_count.").aspectName=Model%20Year";
				for($i= $madeYearArr[0],$k = 0;$i <= $madeYearArr[1] ; $i++,$k++){
					$where .= "&aspectFilter(".$aspect_count.").aspectValueName(".$k.")=".$i;
				}
				$searched .= ', Year: <span class="searched">'.$madeYearStr.'</span>';
				$dataArray['madeYear'] = $madeYearArr;
				$aspect_count++;
			}
		}
		else if(count($madeYearArr) == 1){
			$madeYearStr = 	$madeYearArr[0];
			$where .= "&aspectFilter(".$aspect_count.").aspectName=Model+Year";
			$where .= "&aspectFilter(".$aspect_count.").aspectValueName=".$madeYearStr;
			$searched .= ', Year: <span class="searched">'.$madeYearStr.'</span>';
			$dataArray['madeYear'] = $madeYearArr;
			$aspect_count++;
		}
	}
	if(isset($model) && $model != '' && $model != 'Not+Specified'){
		$where .= "&aspectFilter(".$aspect_count.").aspectName=Model";
		$where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($model));
		$searched .= ', Model: <span class="searched">'.urldecode($model).'</span>';
		$dataArray['carName'] = urldecode($model); 
		$aspect_count++;
	}
	
}
else{
	$where .= "&aspectFilter(0).aspectName=Make";
	$where .= "&aspectFilter(0).aspectValueName(0)=Mercedes-Benz";
	$where .= "&aspectFilter(0).aspectValueName(1)=Oldsmobile";
	$where .= "&aspectFilter(0).aspectValueName(2)=Buick";
	$where .= "&aspectFilter(0).aspectValueName(3)=Cadillac";
	$where .= "&aspectFilter(0).aspectValueName(4)=Chevrolet";
	$where .= "&aspectFilter(0).aspectValueName(5)=Chrysler";
	$where .= "&aspectFilter(0).aspectValueName(6)=Dodge";
	$where .= "&aspectFilter(0).aspectValueName(7)=Excalibur";
	$where .= "&aspectFilter(0).aspectValueName(8)=Ferrari";
	$where .= "&aspectFilter(0).aspectValueName(9)=Ford";
	$where .= "&aspectFilter(0).aspectValueName(10)=General+Motor+Corp.";
	$where .= "&aspectFilter(0).aspectValueName(11)=GMC";
	$where .= "&aspectFilter(0).aspectValueName(12)=Hummer";
	$where .= "&aspectFilter(0).aspectValueName(13)=Chrysler";
	$where .= "&aspectFilter(0).aspectValueName(14)=Morgan";
	$where .= "&aspectFilter(0).aspectValueName(15)=Plymouth";
	$where .= "&aspectFilter(0).aspectValueName(16)=Pontiac ";
	$where .= "&aspectFilter(0).aspectValueName(17)=Porsche";
	$where .= "&aspectFilter(0).aspectValueName(18)=Studebaker";
	$where .= "&aspectFilter(0).aspectValueName(19)=Toyota";
}


if(isset($_POST) && $submit == 'sub_home'){
	if(isset($_POST['mileage']) && $_POST['mileage'] != ''){
		$where .= "&aspectFilter(".$aspect_count.").aspectName=Vehicle+Mileage";
		$where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode(number_format($_POST['mileage'])));
		$searched .= ', Vehicle Mileage: <span class="searched">'.urldecode(number_format($_POST['mileage'])).'</span>';
		$aspect_count++;
	}
	if(isset($_POST['fuel']) && $_POST['fuel'] != ''){
		$where .= "&aspectFilter(".$aspect_count.").aspectName=Fuel+Type";
		$where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($_POST['fuel']));
		$searched .= ', Fuel Type: <span class="searched">'.urldecode($_POST['fuel']).'</span>';
		$aspect_count++;
	}
	if(isset($_POST['bodyStyle']) && ($_POST['bodyStyle'] != '')){ 
                if(is_array($_POST['bodyStyle'])){
                    if(array_filter($array)){
                        $where .= "&aspectFilter(".$aspect_count.").aspectName=Body+Type";	
                        $bodyCount = 0;                
                        if(is_array($_POST['bodyStyle'])){
                            $searched .= ', Body Type: <span class="searched">';
                            $_POST['bodyStyle'] = array_filter($_POST['bodyStyle']);
                            foreach($_POST['bodyStyle'] as $bodyStyle){
                                $where .= "&aspectFilter(".$aspect_count.").aspectValueName($bodyCount)=".urlencode(urldecode($bodyStyle));
                                $bodyCount++;
                                if($bodyCount!=count($_POST['bodyStyle'])){
                                    $searched .=$bodyStyle.",";
                                }else{
                                     $searched .=$bodyStyle;
                                }
                            }
                            $searched .= '</span>';
                        }else{
                            $where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($_POST['bodyStyle']));
                            $searched .= ', Body Type: <span class="searched">'.urldecode($_POST['bodyStyle']).'</span>';
                        }
                        $aspect_count++;
                    }
                }else{
                    $where .= "&aspectFilter(".$aspect_count.").aspectName=Body+Type";	
                    $bodyCount = 0;                
                    if(is_array($_POST['bodyStyle'])){
                        $searched .= ', Body Type: <span class="searched">';
                        $_POST['bodyStyle'] = array_filter($_POST['bodyStyle']);
                        foreach($_POST['bodyStyle'] as $bodyStyle){
                            $where .= "&aspectFilter(".$aspect_count.").aspectValueName($bodyCount)=".urlencode(urldecode($bodyStyle));
                            $bodyCount++;
                            if($bodyCount!=count($_POST['bodyStyle'])){
                                $searched .=$bodyStyle.",";
                            }else{
                                 $searched .=$bodyStyle;
                            }
                        }
                        $searched .= '</span>';
                    }else{
                        $where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($_POST['bodyStyle']));
                        $searched .= ', Body Type: <span class="searched">'.urldecode($_POST['bodyStyle']).'</span>';
                    }
                    $aspect_count++;
                }
		
		
	}
	if(isset($_POST['extColor']) && $_POST['extColor'] != ''){
		$where .= "&aspectFilter(".$aspect_count.").aspectName=Exterior+Color";
		$where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($_POST['extColor']));
		$searched .= ', Exterior Color: <span class="searched">'.urldecode($_POST['extColor']).'</span>';
		$aspect_count++;
	}
	if(isset($_POST['interColor']) && $_POST['interColor'] != ''){
		$where .= "&aspectFilter(".$aspect_count.").aspectName=Interior+Color";
		$where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($_POST['interColor']));
		$searched .= ', Interior Color: <span class="searched">'.urldecode($_POST['interColor']).'</span>';
		$aspect_count++;
	}
	if(isset($_POST['transmission']) && $_POST['transmission'] != ''){
		$where .= "&aspectFilter(".$aspect_count.").aspectName=Transmission";
		$where .= "&aspectFilter(".$aspect_count.").aspectValueName=".urlencode(urldecode($_POST['transmission']));
		$searched .= ', Transmission: <span class="searched">'.urldecode($_POST['transmission']).'</span>';
	}
}


$filterarray = array();

if(isset($price) && $price != ''){
	$price = explode('~', $price);	
	$filterarray[] = array(
						'name' => 'MaxPrice',
						'value' => (string)($price[1] * 1000),
						'paramName' => 'Currency',
						'paramValue' => 'USD');
	$filterarray[] = array(
						'name' => 'MinPrice',
						'value' => (string)($price[0] * 1000),
						'paramName' => 'Currency',
						'paramValue' => 'USD');
	
	$searched .= " with price range <span class=\"searched\"> $".$price[0] * 1000 ." USD  to $".$price[1] * 1000 ." USD </span>";
	
	
	$dataArray['price'] = array('0'=>(int)$price[0]*1000,'1'=>(int)$price[1]*1000);
	
}

if(isset($filter) && $filter != ''){
	if($filter == 1){
		$val = array('FixedPrice','StoreInventory','AuctionWithBIN');
	}
	else{
		$val = array('AuctionWithBIN','Auction');
	}
	
	$filterarray[] =  array(
						'name' => 'ListingType',
						'value' => $val,
						'paramName' => '',
						'paramValue' => '');
}
else{
	$filterarray[] =  array(
				'name' => 'ListingType',
				'value' => array('FixedPrice','StoreInventory','AuctionWithBIN','Auction'),
				'paramName' => '',
				'paramValue' => '');
}


$userTblName = 'temp_'.$_SESSION['unique_id'][0];

if(!isset($_SESSION['announces'])){
	
	$common->customQuery('DROP TABLE IF EXISTS `'.$userTblName.'`');
	$common->customQuery('CREATE TABLE `'.$userTblName.'` (
							  `type` int(10) NOT NULL,
							  `itemId` bigint(20) NOT NULL,
							  `title` varchar(255) NOT NULL,
							  `Price` float NOT NULL,
							  `content` longtext
							) ENGINE=MyISAM DEFAULT CHARSET=latin1');
	$common->customQuery('INSERT INTO master_temp (user_id, tbl_name, lastAct) VALUES ("'.$_SESSION['unique_id'][0].'","'.$userTblName.'",'.getCurrentTimestamp().')');
	$common->customQuery("DELETE FROM ".$userTblName);
}


if(!isset($_GET['page'])){
	$_SESSION['announces'] = array();
	$_SESSION['announces']['fill'] = true;
	$page = 1;
	$_SESSION['announces']['page'] = 8;
	$_SESSION['announces']['fillfor'] = 1;
	$common->customQuery("DELETE FROM ".$userTblName);
}
else{
	$DbPage = ceil($page/$_SESSION['announces']['page']);
	if($_SESSION['announces']['fillfor'] != $DbPage){
		$_SESSION['announces']['fill'] = true;
		$_SESSION['announces']['fillfor'] = $DbPage;
	}
}

if($_SESSION['announces']['fill']){
	
	$fillfor = $_SESSION['announces']['fillfor'];

	// API request variables
	$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
	$version = '1.0.0';  // API version supported by your application
	$appid = 'dothejob-c9de-4e5d-adf2-73a736a2651a';  // Replace with your own AppID
	$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
	$query = 'car';  // You may want to supply your own query
	$safequery = urlencode($query);  // Make the query URL-friendly
	$i = '0';  // Initialize the item filter index to 0
	
	
		// Create a PHP array of the item filters you want to use in your request
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
	$apicall .= ($where == '') ? "&keywords=$safequery": '' ;
	$apicall .= "&categoryId=6001";
	$apicall .= "&paginationInput.entriesPerPage=90";
	if(isset($page)){
		$apicall .= "&paginationInput.pageNumber=".$fillfor;
	}
	$apicall .= "&sellingStatus.sellingState=Active";
	$apicall .= "&descriptionSearch=true";
	$apicall .= "$urlfilter";
	if(isset($sort) && $sort != ''){
		
		$orderBy = explode('~',$sort);
		$order = '';
		if($orderBy[0] == 'buyItNowPrice'){
			if($orderBy[1] == 'asc') $order ='&sortOrder=CurrentPriceHighest';
			else $order = '&sortOrder=PricePlusShippingLowest';
		}
		if($orderBy[0] == 'time'){
			if($orderBy[1] == 'asc') $order ='&sortOrder=EndTimeSoonest';
			else $order = '&sortOrder=StartTimeNewest';
		}
		
		$orderfield = '<input type="hidden" name="sort" value="'.$orderBy[0].'~'.$orderBy[1].'">';
		$apicall .= $order;
	}
	$apicall .= $where;
	
	//echo $apicall;die;
	// Load the call and capture the document returned by eBay API
	$resp = simplexml_load_file($apicall);

	$ebay_total = (int)$resp->paginationOutput->totalEntries; 
	
	/*$pages = new Paginator;
	$pages->items_per_page = 110;
	$pages->current_page = $fillfor;
	
	if(count($dataArray) >= 1){
			
		if($groupby != "" && $sort != "")
		{ 
			$order = explode("~",$sort);
			$orderby = $groupby.",".$order[0];
			$total_rows = $search->attributeSearchCount($dataArray,$groupby);
			$pages->items_total +=  $total_rows;
			$pages->paginate();
			$cars = $search->attributeSearch($dataArray,$orderby,$order[1],$pages->limit);
			
		}
		else if($groupby == "" && $sort != "")
		{  $order = explode("~",$sort);
		
			$total_rows = $search->attributeSearchCount($dataArray,$groupby);
			$pages->items_total +=  $total_rows;
			$pages->paginate();
			$cars = $search->attributeSearch($dataArray,$order[0],$order[1],$pages->limit);
		
		}
		else if($groupby != "" && $sort == "")
		{ 
			$total_rows = $search->attributeSearchCount($dataArray,$groupby);
			$pages->items_total +=  $total_rows;
			$pages->paginate();
			$cars = $search->attributeSearch($dataArray,$groupby,'ASC',$pages->limit);
		
		}
		else{
			$total_rows = $search->attributeSearchCount($dataArray);
			$pages->items_total +=  $total_rows;
			$pages->paginate();
			$cars = $search->attributeSearch($dataArray,'fullName','ASC',$pages->limit);
		}
	}
	else{
		$total_rows = $common->numberOfRows("car",'');
		$pages->items_total +=  $total_rows;
		$pages->paginate();
		
		$result = $common->customQuery("select car_id from car order by RAND() ".$pages->limit);
		$car = array();
		while($res = mysql_fetch_object($result)){
			$cars[] = $res->car_id;
		}
	}
	unset($pages);
	
	
	$dbCarCount = 0;
	*/
	$ins_str = '';
	$ebay_arr = array();
	foreach($resp->searchResult->item as $item) {
		$dbCarCount++;
		
		$itemId = (string)$item->itemId;
		$link = $item->viewItemURL;
		$postalCode = $item->postalCode;
		$location = $item->location;
		$country = $item->country;
		$listingType = $item->listingInfo->listingType;
		$buyItNowAvailable = $item->listingInfo->buyItNowAvailable;
		$buyItNowPrice = $item->sellingStatus->convertedCurrentPrice;
		if($item->listingInfo->buyItNowAvailable == 'true'){
			$buyItNowPrice = $item->listingInfo->buyItNowPrice;
			$buyItNowAvailable = 1;
		}
		else{
			$buyItNowAvailable = 0;
		}
		
		$time = convertTimeLeft($item->sellingStatus->timeLeft);
		$endson = $item->listingInfo->endTime;
		$endtimestamp = strtotime($endson);
		$galleryURL = (isset($item->galleryPlusPictureURL)) ?$item->galleryPlusPictureURL : $item->galleryURL;
				
		
		$forward_str = "&title=".urlencode($item->title)."&buyItNowPrice=".$buyItNowPrice."&postalCode=".$postalCode."&location=".urlencode($location)."&listingType=".$listingType."&endson=".$endson."&endtimestamp=".$endtimestamp."&buyItNowAvailable=".$buyItNowAvailable;
		
		$arr = array(
				"link"=>DEFAULT_URL."/ebay/".$itemId,
				"time"=>$time,
				"title" => (string)$item->title,
				"buyItNowPrice" => (int)$buyItNowPrice,
				"galleryURL" => (string)$galleryURL,
				"forward_str" => $forward_str
				);
				
		$ebay_arr[$itemId] = $arr;	
		
		$ins_str .= "(2, $itemId, \"".mysql_real_escape_string($arr[title])."\", $arr[buyItNowPrice],'".base64_encode(serialize($arr))."'),";	
	}
	/*
	$cars_arr = array();
	if(count($cars) >=1){
		foreach($cars as $car) {
			$dbCarCount++;
			
			$temp = $common->getCarWithAttrList($car ,array("fullName","images","price","mileage","features")); 
			if($temp[$car]["images"] != "") {
				$imgpath = $commons->getImageUrl($temp[$car]["images"]);
			} else{
				$imgpath = LIST_ROOT."/images/default.jpg";
			}
			
			$arr = array(
					"fullName"=> $temp[$car]["fullName"],
					"imgpath"=>$imgpath,
					"mileage" => $temp[$car]["mileage"],
					"price" => $temp[$car]["price"],
					"features" => $common->getFeatureForListing($temp[$car]['features'],3)
					);
					
			$cars_arr[$car] = $arr;	
			
			$ins_str .= "(1, $car, \"".mysql_real_escape_string($arr[title])."\", $arr[price],'".base64_encode(serialize($arr))."'),";
		}
	}
	*/
	if($ins_str != ''){
		$common->customQuery("DELETE FROM ".$userTblName);
		$ins_str = substr($ins_str, 0, strlen($ins_str)-1);
		$query = "INSERT INTO ". $userTblName ." Values " . $ins_str;
		$common->customQuery($query);
	}
	
	$_SESSION['announces']['page'] = ceil($dbCarCount/25);
	
	$_SESSION['announces']['total'] = $ebay_total + $total_rows;
	$_SESSION['announces']['fill'] = false;
}


if($sort == ""){
	$now_sort = "price";
	$now_order = "ASC";
}
else{
	$oder = explode("~",$sort);
	$now_sort = $oder[0];
	$now_order = $oder[1];
}


$num = $common->numberOfRows($userTblName);
if(!isset($_GET['page'])){
	$page = 1;
}
$pages = new Paginator;
$pages->default_ipp = 25;
$pages->items_total = $_SESSION['announces']['total'] ;
$pages->paginate();

if($num != 0){
	if( $page % $_SESSION['announces']['page'] == 0){
		$startLim = ( $_SESSION['announces']['page'] - 1 ) * 25;
	}  
	else{
		$startLim = ( ( $page % $_SESSION['announces']['page'] ) - 1 ) * 25;
	}
	
	$list = $common->customQuery("SELECT * FROM ".$userTblName." ORDER BY $now_sort $now_order LIMIT $startLim ,25");
	
	if(!isset($cars_arr) && !isset($ebay_arr)){
		$cars_arr = array();
		$ebay_arr = array();
		while($resource_data = mysql_fetch_object($list)){
			if($resource_data->type == 1){
				$cars_arr[$resource_data->itemId] = unserialize(base64_decode($resource_data->content));
			}
			elseif($resource_data->type == 2){
				$ebay_arr[$resource_data->itemId] = unserialize(base64_decode($resource_data->content));
			}
		}
		mysql_data_seek($list, 0);
	}
}


if(count($_GET) == 0 && count($_POST)==0 && !is_array($_SESSION['mysearch'][0])){
	$my_file = 'file.txt';
	$handle = fopen($my_file, 'w+') or die('Cannot open file:  '.$my_file);
	fwrite($handle, $pages->items_total);
	fclose($handle);
}



$modelList = array();
$manf= $common ->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");
while($row = mysql_fetch_assoc($manf)){
    $modelList[] = $row;
}

/*pr($resp);
pr($cars_arr);
exit;*/
//$Make= $common->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");

