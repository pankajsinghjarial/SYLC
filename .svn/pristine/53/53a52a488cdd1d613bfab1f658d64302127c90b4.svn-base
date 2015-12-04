<?php session_start();
$error = 0;
$error_login_msg = "";


if(trim($_POST['username'])!=""){
	$common = new common();
	
	$password = base64_encode(trim($_POST['password']));
	$wherecondition = "email='".trim($_POST['username'])."' AND password = '".$password."'";
	$usercount = $common->numberOfRows("users",$wherecondition);
	
	if($usercount==0){
		//$error_login_msg = "correo electrónico y la contraseña no match.please inténtelo de nuevo.";
		$error_login_msg = "Vous n'avez pas pu être identifié, veuillez recommencer!";
	}else{
		$userqry = "SELECT * from users where email='".trim($_POST['username'])."' AND password = '".$password."'";
		$userqrywhrcondition = "email='".trim($_POST['username'])."' AND password = '".$password."'";
		$user = $common->read("users",$userqrywhrcondition);
		$uservalue = mysql_fetch_object($user);
		$_SESSION['User']['id'] = $uservalue->id;
		$_SESSION['User']['name'] = $uservalue->name;
		$_SESSION['User']['email'] = $uservalue->email;	
                if(isset($_REQUEST['return']) && $_REQUEST['return']!=""){
                    echo "<script>window.location.href = '".$_REQUEST['return']."'</script>";
                }
		echo "<script>window.location.href = '".DEFAULT_URL."/wishlist'</script>";	
		
	}
}elseif(count($_POST)>0){
	$error_login_msg = "Vous n'avez pas pu être identifié, veuillez recommencer!";
}

?>