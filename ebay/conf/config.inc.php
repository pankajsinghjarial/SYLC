<?php
	/* if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler");
	else ob_start(); */
	//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) header('Content-Encoding: gzip');
     session_start();
     
	/*==================================================================*\
	#   Coder		: Kapil Verma
	\*==================================================================*/

    error_reporting(E_ALL | E_STRICT);
	ini_set('display_startup_errors', 0);
	ini_set('display_errors', 0);
	
    # ----------------------------------------------------------------------------------------------------
	# DATABASE CONNECTION PARAMETERS
	# ----------------------------------------------------------------------------------------------------

        define("DB_HOST","localhost");
        define("DB_USER","sylcexpo_acc");
        define("DB_PASS","acc@098");
        define("DB_NAME","sylcexpo_acc");

        define("LIST_FOLDER","/ebay");

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
	/*define('LIST_ROOT', "/home/httpsylc/public_html/");
	define('DEFAULT_URL', "http://199.102.229.146/~httpsylc");*/
	
	include(LIST_ROOT."/conf/includes.inc.php");
