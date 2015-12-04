<?php

	include_once('../../conf_superadmin/config.inc.php');

	$logout = new LoginSystem();

	$logout->logout();

	//echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/login/login.php";</script>';
        redirectUrl(DEFAULT_ADMIN_URL.'/login/login.php');

	exit;

?>



	







