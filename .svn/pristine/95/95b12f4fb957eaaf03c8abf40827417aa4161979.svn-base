<?
	/*************************************************************/
	# coder:Kapil Verma
	# checking that if admin is logged in or not if not
	# then redirect to login page if yes then redirect to home page
	/*************************************************************/
	include_once('../conf_superadmin/config.inc.php');
	$loginCheck = new LoginSystem();
 
	if($loginCheck->isLoggedIn())	
	{
			echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/home/home.php";</script>';
			exit;		
	}
	else
	{
			echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/login/login.php";</script>';
			exit;
	}
?>
