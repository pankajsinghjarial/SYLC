<?php
	# ----------------------------------------------------------------------------------------------------
	# INCLUDE GLOBAL CONSTANTS
	# ----------------------------------------------------------------------------------------------------
	date_default_timezone_set(date_default_timezone_get());
	include(LIST_ROOT."/conf/constants.inc.php");

	#-----------------------------------------------------------------------------------------------------
	// INCLUDE GLOBAL TABLES
	#-----------------------------------------------------------------------------------------------------
	include(LIST_ROOT."/conf/tables.inc.php");

	
	# ----------------------------------------------------------------------------------------------------
	# INCLUDE GLOBAL CLASSES
	# ----------------------------------------------------------------------------------------------------

	include_once(CLASSES_DIR."/db.class.php");
	include_once(CLASSES_DIR."/LoginSystem.class.php");
	include_once(CLASSES_DIR."/utility.cls.php");
	include_once(CLASSES_DIR."/common.php");
	include_once(CLASSES_DIR."/validation.class.php");        
	include_once(CLASSES_DIR."/class_handle.php");
	include_once(CLASSES_DIR."/search.class.php");
	include_once(CLASSES_DIR."/common_function.class.php");
	include_once(CLASSES_DIR."/ImportClass.php");
	include_once(CLASSES_DIR."/ImportClass.php");
	include_once(CLASSES_DIR."/class_imageResizer.php");
	include_once(CLASSES_DIR."/paginator.class.2.php");
	include_once(CLASSES_DIR."/AdminPaginator.class.2.php");
	

	include_once(CLASSES_DIR."/phpmailer/class.phpmailer.php");
	include_once(CLASSES_DIR."/phpmailer/class.smtp.php");
	# ----------------------------------------------------------------------------------------------------
	# INCLUDE GLOBAL FUNCTIONS
	# ----------------------------------------------------------------------------------------------------

	include_once(FUNCTIONS_DIR.'/time_funct.php');
	include_once(FUNCTIONS_DIR.'/functions.php');
	include_once(FUNCTIONS_DIR.'/car_functions.php');
	include_once(FUNCTIONS_DIR.'/exportMysqlToCsv.php');

	/****************************Make connection to database***********************************/

	$db = new DB(DB_NAME, DB_HOST, DB_USER, DB_PASS);
        //object of login class
	$loginCheck = new LoginSystem();
    //object of Common class
    $objCommon = new common();

    #-----------------------------------------------------------------------------------------------------
    // Last Activity
    #-----------------------------------------------------------------------------------------------------
    include(LIST_ROOT."/conf/lastActivity.inc.php");
    include(LIST_ROOT."/includes/code/whitelist_ips.php");
$common = new common();
    $emailQuery = $common->CustomQuery("select * from admins where id = 1");
    $toemail = mysql_fetch_object($emailQuery);
    define('SITE_ADMIN_EMAIL', $toemail->email);
