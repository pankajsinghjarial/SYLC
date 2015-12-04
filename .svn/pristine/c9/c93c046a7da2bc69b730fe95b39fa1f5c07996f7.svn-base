<?php 
extract($_GET);
extract($_POST);
$search = new search();
$common = new common();

if($sorter == "")
{ $sorter = "prix~asc" ;}
$sort = explode("~",$sorter);

if(isset($stockType) && $stockType != ''){
	
	$cars = $common->CustomQuery("select cars.*,brand.logo from new_car as cars join brands as brand on cars.brand_id = brand.id  where cars.publish = 1 and brand.publish = 1 and cars.stockType LIKE '%".urldecode($stockType)."%'");
	$total_rows = mysql_num_rows($cars);
	
	$pages = new Paginator; 
	$pages->items_total =  $total_rows;
	$pages->default_ipp=15;
	$pages->paginate();
	
	
	$cars = $common->CustomQuery("select cars.*,brand.logo from new_car as cars join brands as brand on cars.brand_id = brand.id  where cars.publish = 1 and brand.publish = 1 and cars.stockType LIKE '%".urldecode($stockType)."%' order by $sort[0] $sort[1] $pages->limit");
}
else{
	$cars = $common->CustomQuery("select cars.*,brand.logo from new_car as cars join brands as brand on cars.brand_id = brand.id  where cars.publish = 1 and brand.publish = 1");
	$total_rows = mysql_num_rows($cars);
	
	$pages = new Paginator; 
	$pages->items_total =  $total_rows;
	$pages->default_ipp=15;
	$pages->paginate();
	
	
	$cars = $common->CustomQuery("select cars.*,brand.logo from new_car as cars join brands as brand on cars.brand_id = brand.id  where cars.publish = 1 and brand.publish = 1 order by $sort[0] $sort[1] $pages->limit");
}


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
