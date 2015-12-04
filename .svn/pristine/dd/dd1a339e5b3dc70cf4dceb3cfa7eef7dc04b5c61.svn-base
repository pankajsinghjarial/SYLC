<?php 
extract($_POST);
extract($_GET);
$flagview = 1;
$unicount =  count($_SESSION['unique_id']['view']);
if(isset($_SESSION['User']['id']) && $_SESSION['User']['id']>0){
    $getSelectedCarListSQL = "SELECT count(id) from wishlist where car_id = $carid AND user_id = ".$_SESSION['User']['id'];
    $result = mysql_query($getSelectedCarListSQL);
    $isSelect = mysql_fetch_assoc($result);    
}
for($i=1; $i<$unicount;$i++)
{
	if($_SESSION['unique_id']['view'][$i] == $carid)
	{ $flagview =0;}
	}



$common = new common();


if($flagview == 1)
{
$_SESSION['unique_id']['view'][] = $carid;
$view = $common->mostView($carid);
}




$options =
array('madeYear',
    'manufacturer',
    'carName',
    'model',
    'features',
    'std_equip',
    'images',
    'price',
    'mileage',
    'fuel',
    'bodyStyle',
    'engine',
    'extColor',
    'interColor',
    'transmission',
    'drivetrain',
    'doors',
    'wheelbase',
    'fullName',
    'featured',
    'siteName',
    'popular',
    'stockType',
    'sub_model',
    'warranty',
    'vehicle_title',
    'options',
    'power_options',
    'for_sale_by',
    'number_cylinders',
    'trim',
    'cab_type_trucks',
    'cab_type',
    'description',
    
    
);

$temp = $common->getCarWithAttrList($carid ,$options); 
$tempimg = $common->getAllImage($carid);
$carInfo = $temp[$carid];
$manf= $common ->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `sort_order`");

//pr($temp); exit();

$car_meta_values['title'] = $temp[$carid]["fullName"];
$car_meta_values['description'] = ($temp[$carid]["engine"] != '') ? "Engine: ".$temp[$carid]["engine"]: '';
$car_meta_values['description'] .= ($temp[$carid]["extColor"] != '') ? ", Exterior Color: ".$temp[$carid]["extColor"]: '';
$car_meta_values['description'] .= ($temp[$carid]["interColor"] != '') ? ", Interior Color: ".$temp[$carid]["interColor"]: '';
$car_meta_values['description'] .= ($temp[$carid]["transmission"] != '') ? ", Transmission: ".$temp[$carid]["transmission"]: '';
$car_meta_values['description'] .= ($temp[$carid]["drivetrain"] != '') ? ", Drive Train: ".$temp[$carid]["drivetrain"]: '';
$car_meta_values['description'] .= ($temp[$carid]["doors"] != '') ? ", Doors: ".$temp[$carid]["doors"]: '';
$car_meta_values['description'] .= ($temp[$carid]["wheelbase"] != '') ? ", Wheel Base: ".$temp[$carid]["wheelbase"]: '';



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
	$emailData['titre'] =  $carInfo['fullName'];
	$emailData['vin'] =  $carInfo['vin'];
	$emailData['Achat immédiat Prix'] =  $common->CurrencyConverter($carInfo['price']).' &euro;';
	$emailData['Construire'] =  $carInfo['manufacturer'];
	$emailData['Modèle'] =  $carInfo['model'];
	$emailData['Kilométrage'] =  number_format($carInfo['mileage'], 2).' Mi';
	$emailData["Vous avez reçu un e-mail à partir d'ici"] = DEFAULT_URL."/car/".$_POST['car_id'];
	
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
	
	$mailHeading = (!empty($_POST['order']) && $_POST['order'] == 1 ) ? "A fait une demande de L’historique de cette voiture ici." : "A fait une demande de fiche technique de cette voiture ici.";
	
	//Send confirmation to User
	
	$heading = 'Merci';
	$subHeading = 'Votre adresse e-mail a été reçu, un de nos représentants vous contactera avec les informations de la voiture.<br><br>Merci encore<br/>Americamcarcentrale.com';
	$message = emailContentsWrapper(null,$heading,$subHeading);
	sendSmtpMail($_POST['email'], 'Merci', $message);
	
	
	// Send admin Notifications
	
	$heading = "Un invité envoyé demande d'enquête pour une voiture";
	$subHeading = 'ce client '.$_POST['email'].' '.$mailHeading.'<br/>Détails du véhicule';
	$emailData['Id de voiture'] =  $_POST['car_id'];
	$emailData['titre'] =  $carInfo['fullName'];
	$emailData['vin'] =  $carInfo['vin'];
	$emailData['Achat immédiat Prix'] =  $common->CurrencyConverter($carInfo['price']).' &euro;';
	$emailData['Construire'] =  $carInfo['manufacturer'];
	$emailData['Modèle'] =  $carInfo['model'];
	$emailData['Kilométrage'] =  number_format($carInfo['mileage'], 2).' Mi';
	$emailData["Vous avez reçu un e-mail à partir d'ici"] = DEFAULT_URL."/car/".$_POST['car_id'];
	
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


$Make= $common->CustomQuery("SELECT * FROM `attribute_option_value` WHERE `attribute_id` = '2' ORDER BY `value`,`sort_order` ASC");