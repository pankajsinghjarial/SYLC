<?php session_start();
$error = 0;
$error_login_msg = "";


if(trim($_POST['useremail'])!=""){
	$common = new common();
	
	
	$wherecondition = "email='".trim($_POST['useremail'])."'";
	$usercount = $common->numberOfRows("users",$wherecondition);
	
	if($usercount==0){
		$error_login_msg = '<span class="error_msg">Email non reconnu! Veuillez réessayer ou créer un nouveau compte.</span>';
	}else{
		$userqrywhrcondition = "email='".trim($_POST['useremail'])."'";
		$user = $common->read("users",$userqrywhrcondition);
		$uservalue = mysql_fetch_object($user);		
		//$password = base64_decode($uservalue->original_pswd);
		$password = base64_decode($uservalue->password);
		// Your subject
		$subject= 'mot de passe oublié';		
		$message = nl2br("Message  de La Centrale  : compte utilisateur
							La Centrale
							
							------------------------------
							
							Vous avez oublié votre mot de passe : 
							
							Identifiant :  ".trim($_POST['useremail'])."
							
							Mot de passe :  {$password}");
		
		
		$message = html_entity_decode(htmlentities($message, ENT_QUOTES, "UTF-8"));
		
		$sentmail = sendSmtpMail(trim($_POST['useremail']), $subject, $message );
		$error_login_msg = '<span class="success_msg">Mot de passe envoyé !  Si le message n\'apparaît pas d\'ici quelques minutes, vérifiez les courriers indésirables.</span>';
		
		//echo "<script>window.location.href = '".DEFAULT_URL."/wishlist'</script>";
	}
}else if(isset($_POST['useremail'])){
	$error_login_msg = '<span class="error_msg">S\'il vous plaît entrez l\'adresse e-mail valide pour obtenir votre mot de passe.</span>';
}

?>