<?php session_start();
$common = new common();
$error_msg = "";
$error = 0;

$userqrywhrcondition = "id='".$_SESSION['User']['id']."'";
$user = $common->read("users",$userqrywhrcondition);
$uservalue = mysql_fetch_assoc($user);
extract($uservalue);

if(trim($_POST['email'])!=""){	
	
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false){
		$error++;
		$error_msg = "S'il vous plaît fournir une adresse email valide";
	}
	
	if(strlen(trim($_POST['password']))>0 && strlen(trim($_POST['password']))<6){
		$error++;
		$error_msg = "Mot de passe doit être au minimum de 6 caractères.";
	}
	
	if(trim($_POST['password'])!= trim($_POST['confirm_password'])){
		$error++;
		$error_msg = "Mot de passe ne correspondent pas.";
	}	
	
	if(trim($_POST['email'])!=$_SESSION['User']['email']){
		$wherecondition = "email='".trim($_POST['email'])."'";
		$usercount = $common->numberOfRows("users",$wherecondition);
		if($usercount>0){
			$error++;
			$error_msg = "Cet e-mail est déjà enregistré.";
		}
	}
	
	if($error==0){
		$updateQuery = "UPDATE users SET
						name 	= '".trim($_POST['name'])."',
						address = '".trim($_POST['address'])."',
						postal_code = '".trim($_POST['postal_code'])."',
						city = '".trim($_POST['city'])."',
						phone_number = '".trim($_POST['phone_number'])."',
						sec_phone_number = '".trim($_POST['sec_phone_number'])."',
						email = '".trim($_POST['email'])."'";
		
		if(trim($_POST['password'])!=""){
			$updateQuery .= ", password 		= '".base64_encode(trim($_POST['password']))."',
							 original_pswd 	= '".base64_encode(trim($_POST['password']))."'";
		}
						
		$updateQuery .=	" WHERE id = '".$_SESSION['User']['id']."'";		
		$ok = $common->CustomQuery($updateQuery);
		if($ok===true){
			$_SESSION['User']['name'] = trim($_POST['name']);
			$_SESSION['User']['email'] = trim($_POST['email']);
			$error_msg = '<span class="success_msg">User profile updated successfully.</span>';
			extract($_POST);	
		}else{
			$error_msg = '<span class="error_msg">Database Problem!Please Try Again.</span>';
		}
	}else{
		$error_msg = '<span class="error_msg">'.$error_msg.'</span>';
	}
	
}

?>