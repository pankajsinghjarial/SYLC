<?php

	/*==================================================================*\

	#   Coder		: Kapil Verma

	\*==================================================================*/


        /*error_reporting(E_ALL | E_STRICT);

		ini_set('display_startup_errors', 1);

		ini_set('display_errors', 1);*/



        # ----------------------------------------------------------------------------------------------------

	# DATABASE CONNECTION PARAMETERS

	# ----------------------------------------------------------------------------------------------------



        define("DB_HOST","localhost");

        define("DB_USER","sylcexpo_syadmin");

        define("DB_PASS","admin1234");

        define("DB_NAME","sylcexpo_sylcorp");		
		
        define("LIST_FOLDER","/voitures-americaines");


        # ----------------------------------------------------------------------------------------------------

	# DEFINE ROOT

	# ----------------------------------------------------------------------------------------------------

	//checking if last char in DOCUMENT_ROOT is '/' than remove it

	$lastchar	= substr($_SERVER["DOCUMENT_ROOT"], -1, 1);

	if($lastchar=='/'){

		$rest = substr($_SERVER["DOCUMENT_ROOT"], 0, -1);

		define('LIST_ROOT', $rest.LIST_FOLDER);

	}else{

		define('LIST_ROOT', $_SERVER["DOCUMENT_ROOT"].LIST_FOLDER);

	}



        # ----------------------------------------------------------------------------------------------------

	# DEFAULT URL

	# ----------------------------------------------------------------------------------------------------

	if ((!isset($_SERVER["HTTPS"])) || ($_SERVER["HTTPS"] == "off")) {



		define('HTTPS_MODE', "off");

		define('DEFAULT_URL', "http://".$_SERVER["HTTP_HOST"].LIST_FOLDER);

	} else {

		define('HTTPS_MODE', "on");

		define('DEFAULT_URL', "https://".$_SERVER["HTTP_HOST"].LIST_FOLDER);

	}



        #------------------------------------------------------------------------------------------------------

        # Startting Session

        #------------------------------------------------------------------------------------------------------

        session_start();



	include(LIST_ROOT."/conf_superadmin/includes.inc.php");

        



?>

