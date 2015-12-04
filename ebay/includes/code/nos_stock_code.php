<?php 
extract($_GET);
extract($_POST);
$search = new search();
$common = new common();

if($sorter == "")
{ $sorter = "price~DESC";}

$sort = explode("~",$sorter);
$conditions = ' cars.site_name = 2 and brand.publish = 1';

$join = null;

if(isset($stockType) && $stockType != ''){
	$value = 0;
	$stockType = strtolower($stockType);
	if($stockType == 'neuf') $value = 388;
	else if ($stockType == 'classic') $value = 389;
	$join .= ' join car_int on cars.car_id = car_int.car_id and car_int.attribute_id = 26 and car_int.value = '.$value;
	
}
	$join .= ' join car_decimal as prices on cars.car_id = prices.car_id and prices.attribute_id = 11 ';
	$join .= ' join car_varchar as model on cars.car_id = model.car_id and model.attribute_id = 22 ';
	$cars = $common->CustomQuery("select cars.car_id,prices.value as price,model.value as model, brand.logo from car as cars join brands as brand on cars.brand_id = brand.id  ".$join." where  ".$conditions." group by cars.car_id order by $sort[0] $sort[1] $pages->limit");
	$total_rows = mysql_num_rows($cars);
	
	$pages = new Paginator; 
	$pages->items_total =  $total_rows;
	$pages->default_ipp=15;
	$pages->paginate();

$options =
array('madeYear',
    'carName',
    'images',
    'extColor',
    'interColor',
    'fullName',
    'stockType',
	'model',
	'price'
);


//$temp = $common->getCarWithAttrList($carid ,$options); 


if(isset($_POST) && isset($_POST["submit_inq"])){
	global $db;
	$common_obj = new common();
	$arr = array("car_id"=>$_POST['car_id'],"name"=>$_POST['name'],"email"=>$_POST['email'],"phone"=>$_POST['phone'],"message"=>$_POST['message'],"type"=>0);
	$common_obj->save("contact",$arr);	
	
			// Your subject
			$heading = $subject ='Inquiry À propos de voitures';
			
			$subHeading = 'La personne qui vous a contacté est '.$_POST['name'];
			$massage = str_replace("\'", "'", $_POST['message']);
			$emailData['Nom'] = $_POST['name'].' '.$_POST['prename'];
			$emailData['Adresse e-mail'] = $_POST['email'];
			$emailData['Numéro de téléphone'] = $_POST['phone'];
			$emailData['Message'] = $massage;
			
			$emailData["Vous avez reçu un e-mail à partir d'ici"] = DEFAULT_URL."/nosstock/";
			
			$message = emailContentsWrapper($emailData,$heading,$subHeading);
	
			$adminEmails = $common->getAdminNotificationEmails();
			foreach($adminEmails as $emaiA ) {
				$sentmail = sendSmtpMail( $emaiA, $subject,  $message );
			}
					  
	
		
			$heading = 'Merci';
			$subHeading = 'Vous ajoutez une voiture à votre sélection avec les détails suivants.';
			$footerHeading = 'Merci encore<br/>Americamcarcentrale.com';
			$emailData = null;
			$emailData['Nom'] = $_POST['name'];
			$emailData['Adresse e-mail'] = $_POST['email'];
			$emailData['Numéro de téléphone'] = $_POST['phone'];
			
			$message = emailContentsWrapper($emailData, $heading, $subHeading, $footerHeading);			
			sendSmtpMail($_POST['email'], 'Merci', $message);
	
		?>
       <script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
       <script type="text/javascript">
			$ = jQuery.noConflict();	
		</script>
        <script src="<?php echo DEFAULT_URL; ?>/js/jquery.msgBox.js" type="text/javascript"></script>
        <link href="<?php echo DEFAULT_URL; ?>/css/msgBoxLight.css" rel="stylesheet" type="text/css">
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
		</script>
    <?php 
}
