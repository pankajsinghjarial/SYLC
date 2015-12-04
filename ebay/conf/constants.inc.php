<?php
   
	define('SITE_TITLE', "Website");
	define('SITE_TITLE_ADMIN', "Administrator Panel");
	/* define('SITE_ADMIN_EMAIL', "info@americancarcentrale.com"); */
//	define('SITE_ADMIN_EMAIL', "sylc.corp@gmail.com");
//define('SITE_ADMIN_EMAIL', "ashley.damon999@gmail.com");
	define('DEFAULT_DATE_FORMAT', "d-M-Y");

	# ----------------------------------------------------------------------------------------------------
	# IMAGE FOLDER CONSTANTS
	# ----------------------------------------------------------------------------------------------------

	define('IMAGE_RELATIVE_PATH', "/images");
	define('IMAGE_DIR', LIST_ROOT.IMAGE_RELATIVE_PATH);
	define('IMAGE_URL', DEFAULT_URL.IMAGE_RELATIVE_PATH);
    define('ADMIN_IMAGE_URL',DEFAULT_URL."/superadmin".IMAGE_RELATIVE_PATH);


	# ----------------------------------------------------------------------------------------------------
	# CONSTANTS
	# ----------------------------------------------------------------------------------------------------

	define('INCLUDES_DIR',  LIST_ROOT."/includes");
	define('CLASSES_DIR',   LIST_ROOT."/classes");
	define('FUNCTIONS_DIR', LIST_ROOT."/functions");
	define('LIST_ROOT_ADMIN',  LIST_ROOT."/superadmin");
    define('LIST_ROOT_ADMIN_INCLUDES',  LIST_ROOT."/superadmin/includes");
	define('DEFAULT_ADMIN_URL',DEFAULT_URL."/superadmin");

	# ----------------------------------------------------------------------------------------------------
	# USER ATRIBUTES
	# ----------------------------------------------------------------------------------------------------

	define('PAGING_LIMIT',10);  //Paging by default limit
	define('UPLOAD_CAR_IMAGES',  LIST_ROOT."/uploads/car");
	define('CAR_IMAGES_URL',  DEFAULT_URL."/uploads/car");
	define('UPLOAD_IMPORT_FILES',  LIST_ROOT."/uploads/import");
