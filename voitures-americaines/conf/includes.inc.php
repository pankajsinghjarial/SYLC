<?php

	
	# ----------------------------------------------------------------------------------------------------
	# INCLUDE GLOBAL CONSTANTS
	# ----------------------------------------------------------------------------------------------------
	include(LIST_ROOT."/conf/constants.inc.php");

        #-----------------------------------------------------------------------------------------------------
        // INCLUDE GLOBAL TABLES
        #-----------------------------------------------------------------------------------------------------
        include(LIST_ROOT."/conf/tables.inc.php");
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

	 date_default_timezone_set('America/New_York');

	/****************************Make connection to database***********************************/

	$db = new DB(DB_NAMES, DB_HOSTS, DB_USERS, DB_PASSS);

        //object of login class
	$loginCheck = new LoginSystem();
        
        $obj_common = new common();
        
     


?>