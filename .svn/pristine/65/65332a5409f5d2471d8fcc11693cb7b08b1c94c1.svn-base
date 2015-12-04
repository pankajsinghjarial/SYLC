<?php include("../../conf/config.inc.php"); 

extract($_POST);
extract($_GET);
$common = new common();

if(isset($_POST) && $_POST["form"] == 'index_enquiry'){
    
    $colors = array(
    'White' => 'Blanc',
    'Blue' => 'Bleu',
    'Burgundy' => 'Bourgogne',
    'Tan' => 'Bronzer',
    'Brown' => 'Brun',
    'Gray' => 'Gris',
    'Yellow' => 'Jaune',
    'Black' => 'Noir',
    'Gold' => 'Or',
    'Orange' => 'Orange',
    'Purple' => 'Pourpre',
    'Silver' => "Pi&egrave;ces d'argent",
    'Red' => 'Rouge',
    'Teal' => 'Sarcelle',
    'Green' => 'Vert',
    'Red' => 'Rouge',
    
    );
    // meke a string to all search criteria to send in admin emails
    $searchData = null;
    
    if(!empty($_POST['bodyStyle'])) {
	$types = array_filter($_POST['bodyStyle']);
	if( !empty($types) )
	$searchData['Type']  = implode(",",$types). "<br/>";
    }
    if( !empty($_POST['manufacturer'])) {
	$menufactures = array_filter($_POST['manufacturer']);
	if( !empty($menufactures) ) 
	$searchData['marquee'] = implode(",",$menufactures). "<br/>";
    }
    if( !empty($_POST['model']))
    $searchData['modele'] = $_POST['model']."<br/>";
    
    if( !empty($_POST['extColor']))
    $searchData['couleur exterieur'] = @$colors[$_POST['extColor']]. "<br/>";
    
    if( !empty($_POST['interColor']))
    $searchData['couleur interieur'] = @$colors[$_POST['interColor']]. "<br/>";
    
    
    if( !empty($_POST['price'])) { 
	$prices = explode('~', $_POST['price']);
	
	if( !empty($prices[1]) && $prices[1] > 0 ) {
	    $searchData['game de prix'] = " ENTRE $". $prices[0] * 10000 .' - $'. $prices[1] * 10000;
	}
    }
    
    if( !empty($_POST['mileage']))
    $searchData['kilometrage '] = str_replace(array("+",'miles'),array(" ",'km'),$_POST['mileage'])."<br/>";
    
    if( !empty($_POST['madeYearRange']))
    $years = explode(';', $_POST['madeYearRange'] );
    $searchData['année'] = $years[0].' - '.$years[1];
    
    //echo "<pre>";print_r($menufactures);echo "</pre>";die;
    $obj = new validation();
    $obj->add_fields($name, 'req', "S'il vous pla&icirc;t entrer un nom");
    $obj->add_fields($prename, 'req', "S'il vous pla&icirc;t entrer pr&eacute;nom");
    $obj->add_fields($phone, 'req', "S'il vous pla&icirc;t entrer le num&eacute;ro de t&eacute;l&eacute;phone");
    $obj->add_fields($email, 'req', "S'il vous pla&icirc;t entrez l'adresse e-mail");
    $obj->add_fields($email, 'email', "S'il vous pla&icirc;t entrer une adresse email valide");
    $obj->add_fields($password, 'req', "S'il vous pla&icirc;t entrez le mot de passe");
    $obj->add_fields($confirm_password, 'req', "S'il vous pla&icirc;t entrez le mot de passe de confirmation");
    $obj->add_fields($cgv, 'req', "Vous n'&ecirc;tes pas d'accord avec la politique d'entreprise. S'il vous plaît accepter politique");
    
    
    $error = $obj->validate();
    
    if(strlen(trim($password)) < 6){
	    $error = "Mot de passe doit &ecirc;tre au minimum de 6 caract&egrave;res.";
    }
    
    $wherecondition = "email='".trim($email)."'";
    $usercount = $common->numberOfRows("users",$wherecondition);
    
    if($usercount > 0 ){
	$error = "Cet e-mail est d&eacute;j&agrave; enregistr&eacute;.";
    }
	
    
    if($password  != $confirm_password ) {
	
	$error = 'Mot de passe et confirmer le mot de passe ne correspondent pas';
    }
    if( $error ) {
	echo $error;die;
    }
    else {
	
	$subject= "Index Page enquête";
	// From
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "<br/>";
	// Additional headers
	$headers .= 'From: '.$_POST['name'].'<'.$_POST['email'].'>' . "<br/>";
	
	$message .= emialHeading('Vous avons reçu une nouvelle index page  enquête');
	$message .= emailContentsHeading('Les détails sont comme ci-dessous:');
	
	$emailData['nom'] = $_POST['name'];
	$emailData['Prénom'] = $_POST['prename'];
	$emailData['E-mail'] = $_POST['email'];
	$message .= emailContents($emailData);
	
	$message .= emailContentsHeading('information de la recherche:');
	$message .= emailContents($searchData);
	$emailData = null;
	$emailData["Vous avez reçu un e-mail à partir d'ici "] = DEFAULT_URL;
	$message .= emailContents($emailData);
	
	$message = emailContentsWrapper($message);
	
	
	$dataArray = array('name'=>$name." ".$prename,'email'=>$email,'phone'=>$phone,'message'=>$massage,'type'=>101,'mail_date'=>$currentTimestamp);
	
	$password = base64_encode(trim($password));
	$userData = array('firstname'=>$name,
			  'name' =>mysql_real_escape_string($prename),
			  'email'=>mysql_real_escape_string($email),
			  'phone_number'=>mysql_real_escape_string($phone),
			  'password'=>$password,
			  'created'=>date('Y-m-d H:i:s'),
			  );
	$saveUsr = $common->save("users",$userData);
	
	if( $saveUsr ) {
	    
	    // send enquiry to admin ...
	    $common->save("contact",$dataArray);
	    
	    //Send email notification.
	    
	   sendSmtpMail($email, 'Merci', 'Votre demande de contact a été reçu avec succès.');
	   
	    $adminEmails = $common->getAdminNotificationEmails();
	    foreach($adminEmails as $emailA ) {
		sendSmtpMail( $emailA, $subject, $message);
	    }
	   
	    $userqrywhrcondition = "email='".trim($email)."' AND password = '".$password."'";
	    $user = $common->read("users",$userqrywhrcondition);
	    $uservalue = mysql_fetch_object($user);
	    
	    $_SESSION['User']['id'] = $uservalue->id;
	    $_SESSION['User']['name'] = $uservalue->name;
	    $_SESSION['User']['email'] = $uservalue->email;	
	}
	
	echo "1";die;
    }
     
}
echo "0";die;

?>