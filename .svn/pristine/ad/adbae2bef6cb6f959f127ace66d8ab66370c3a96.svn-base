<?php
$error = 0;
$error_msg = "";
$common = new common();

if(trim($_POST['email'])!=""){
	
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false){
		$error++;
		$error_msg = "S'il vous plaît fournir une adresse email valide";
	}
		
	if(strlen(trim($_POST['password']))<6){
		$error++;
		$error_msg = "Mot de passe doit être au minimum de 6 caractères.";
	}
	
	if(trim($_POST['password'])!= trim($_POST['confirm_password'])){
		$error++;
		$error_msg = "Mot de passe ne correspondent pas.";
	}	
	
	if($_POST['cgv']!=1){
		$error++;
		$error_msg = "Vous n'êtes pas d'accord avec la politique d'entreprise. S'il vous plaît accepter politique .";
	}
	
	$wherecondition = "email='".trim($_POST['email'])."'";
	$usercount = $common->numberOfRows("users",$wherecondition);
	if($usercount>0){
		$error++;
		$error_msg = "Cet e-mail est déjà enregistré.";
	}	
	
	if($error==0){		
		$dob = trim($_POST['birthday_year'])."-".trim($_POST['birthday_month'])."-".trim($_POST['birthday_day']);
		$insertQuery = "INSERT INTO users (prefix,firstname,name,dob,address,postal_code,city,country,phone_number,sec_phone_number,email,password,original_pswd,created)
		VALUES ('".trim($_POST['prefix'])."','".trim($_POST['firstname'])."','".trim($_POST['name'])."','".$dob."','".trim($_POST['address'])."','".trim($_POST['postal_code'])."','".trim($_POST['city'])."','".trim($_POST['country'])."','".trim($_POST['phone_number'])."','".trim($_POST['sec_phone_number'])."','".trim($_POST['email'])."','".base64_encode(trim($_POST['password']))."','".base64_encode(trim($_POST['confirm_password']))."',now())";
		$manf = $common->CustomQuery($insertQuery);
		$error_msg = "User created successfully.";
	}
	
	
}

?>