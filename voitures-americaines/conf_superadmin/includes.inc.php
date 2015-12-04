<?php

	
	# ----------------------------------------------------------------------------------------------------
	# INCLUDE GLOBAL CONSTANTS
	# ----------------------------------------------------------------------------------------------------
	include(LIST_ROOT."/conf_superadmin/constants.inc.php");

        #-----------------------------------------------------------------------------------------------------
        // INCLUDE GLOBAL TABLES
        #-----------------------------------------------------------------------------------------------------
        include(LIST_ROOT."/conf_superadmin/tables.inc.php");
        //
        //
        //
	# ----------------------------------------------------------------------------------------------------
	# INCLUDE GLOBAL CLASSES
	# ----------------------------------------------------------------------------------------------------

        include_once(CLASSES_DIR."/db.class.php");
        include_once(CLASSES_DIR."/LoginSystem.class.php");
		include_once(CLASSES_DIR."/utility.cls.php");
        include_once(CLASSES_DIR."/common.php");
        include_once(CLASSES_DIR."/validation.class.php");        
        include_once(CLASSES_DIR."/class_handle.php");
	
	
	# ----------------------------------------------------------------------------------------------------
	# INCLUDE GLOBAL FUNCTIONS
	# ----------------------------------------------------------------------------------------------------

        include_once(FUNCTIONS_DIR.'/time_funct.php');
        include_once(FUNCTIONS_DIR.'/functions.php');
	    //include_once(LIST_ROOT.'/conf/global_message.php');
        //include_once(LIST_ROOT.'/conf/global_keywords.php');

	date_default_timezone_set('Asia/Calcutta');

	/****************************Make connection to database***********************************/

	$db = new DB(DB_NAME, DB_HOST, DB_USER, DB_PASS);

        //object of login class
	$loginCheck = new LoginSystem();
        
        $obj_common = new common();
        
     


?>