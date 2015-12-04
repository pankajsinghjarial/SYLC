<?php


	# ----------------------------------------------------------------------------------------------------


	# * FILE: /classes/class_handle.php


	# ----------------------------------------------------------------------------------------------------








	class Handle {





		function Handle() {}





		function getString($field, $special_chars = true) {


			$value = $this->$field;


			if (!is_string($value)) return $value;


			$value = ($special_chars) ? htmlspecialchars($value) : $value ;


			return $value;


		}





		function getNumber($field, $special_chars = false) {


			$value = $this->$field;


			if (!is_string($value)) return $value;


			$value = ($special_chars) ? htmlspecialchars($value) : $value ;


			return $value;


		}











		function getDate($field) {





			$aux = explode("-", $this->$field);





			if (count($aux) == 3) {





				if (DEFAULT_DATE_FORMAT == "m/d/Y") {





					return $aux[1]."/".$aux[2]."/".$aux[0];





				} elseif (DEFAULT_DATE_FORMAT == "d/m/Y") {





					return $aux[2]."/".$aux[1]."/".$aux[0];





				}





			} else {





				return "00/00/0000";





			}





		}











		function getBoolean($field) {





			if ($this->$field) return true;





			else return false;





		}











		function setString($field, $string) {





			$this->$field = $string;





		}











		function setNumber($field, $number) {





			if (is_numeric($number)) $this->$field = $number;





			else $this->$field = 0;





		}











		function setBoolean($field, $bool) {





			if ($bool) $this->$field = 1;





			else $this->$field = 0;





		}











		function setDate($field, $date) {





			if (strpos($date, "/")) {


				$aux = explode("/", $date);


				if (count($aux) == 3) {





					if (DEFAULT_DATE_FORMAT == "m/d/Y") {





						$month = $aux[0];


						$day = $aux[1];


						$year = $aux[2];





					} elseif (DEFAULT_DATE_FORMAT == "d/m/Y") {


						$month = $aux[1];


						$day = $aux[0];


						$year = $aux[2];


					}











					if (checkdate((int)$month, (int)$day, (int)$year)) {


						$this->$field = $year."-".$month."-".$day;


					} else {


						$this->$field = "0000-00-00";


					}








				} else {


					$this->$field = "0000-00-00";


				}








			} else if (strpos($date, "-")) {


				$aux = explode("-", $date);


				if (count($aux) == 3) {


					if (checkdate((int)$aux[1], (int)$aux[2], (int)$aux[0])) {





						$this->$field = $date;





					} else {





						$this->$field = "0000-00-00";





					}








				} else {





					$this->$field = "0000-00-00";





				}





			} else {


				$this->$field = "0000-00-00";


			}





		}

















		function string_needs_addslashes($str) {





			if (($qp = strpos($str,"'")) !== false || ($qp = strpos($str,"\"")) !== false) {





				if ($str[$qp-1] != "\\") return true;





				else return $this->string_needs_addslashes(substr($str,$qp+1,strlen($str)));





			}





			return false;





		}











		


		


	function initGzip()


		{





			$do_gzip_compress = FALSE;


			$phpver = phpversion();


			$useragent = $_SERVER['HTTP_USER_AGENT'];


			$canZip = $_SERVER['HTTP_ACCEPT_ENCODING'];


	


			if ( $phpver >= '4.0.4pl1' && ( strpos($useragent,'compatible') !== false || strpos($useragent,'Gecko') !== false)) {


								


				// Check for gzip header or northon internet securities


				if ( isset($_SERVER['HTTP_ACCEPT_ENCODING']) ) {


					$encodings = explode(',', strtolower($_SERVER['HTTP_ACCEPT_ENCODING']));


				}


				


				


			if(is_array($encodings))


				  {


					  if ( (@in_array('gzip', $encodings) || isset( $_SERVER['---------------']) ) && extension_loaded('zlib') && function_exists('ob_gzhandler') && !ini_get('zlib.output_compression') && !ini_get('session.use_trans_sid') ) {


						// You cannot specify additional output handlers if


						// zlib.output_compression is activated here


						


						ob_start( 'ob_gzhandler' );


						return;


					  }


					else {


							ob_start();


							return;


						 }


				 } 


				else {


						ob_start();


						return;


					 }


			} 


			


			 if ( $phpver > '4.0' ) {


				if ( strpos($canZip,'gzip') !== false ) {


					if (extension_loaded( 'zlib' )) {


						$do_gzip_compress = TRUE;


						ob_start();


						ob_implicit_flush(0);


						header( 'Content-Encoding: gzip' );


						return;


					}


				}


			}


		ob_start();


	}


	


	








	function metaData($url=''){

		global $db;	
				
/*echo basename($_SERVER['PHP_SELF']);
echo "<pre>";print_r($_REQUEST);print_r($_SERVER);echo "</pre>";*/
			if((!$url || $url=='') and basename($_SERVER['PHP_SELF'])!='about_us.php' and basename($_SERVER['PHP_SELF'])!='what_duty_free.php' and basename($_SERVER['PHP_SELF'])!='vendor_request.php' and basename($_SERVER['PHP_SELF'])!='faq.php' and basename($_SERVER['PHP_SELF'])!='careers.php' and basename($_SERVER['PHP_SELF'])!='terms.php' and basename($_SERVER['PHP_SELF'])!='privacy.php' and basename($_SERVER['PHP_SELF'])!='contact_us.php' and basename($_SERVER['PHP_SELF'])!='products.php' and basename($_SERVER['PHP_SELF'])!='products_detail.php' and basename($_SERVER['PHP_SELF'])!='locations.php' and basename($_SERVER['PHP_SELF'])!='locations_result.php'){


				
						$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 33");


						$dataMeta ='<meta name="robots" content="noindex, nofollow" />


									<meta name="keywords" content="'.$line->meta_keyword.'" />


									<meta name="description" content="'.$line->meta_description.'" />


									<title>'.$line->page_title.'</title>';
		

			}else{


					global $db;


					if(strpos($_SERVER['REQUEST_URI'],'/')==false){


						$url = explode('/',$_SERVER['REQUEST_URI']);
						//$url = $url[2];
						$url = $url[count($url)-1];
						

					}else{


						$url = $url;


					}				
					
					switch($url){
						case 'about_us.php':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 26");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'what_duty_free.php':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 31");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'vendor_request.php':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 38");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'faq.php':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 29");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'careers.php':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 32");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'terms.php':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 42");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'privacy.php':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 41");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'contact_us.php':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 47");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'contact_us.php?type=us':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 43");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'contact_us.php?type=airport':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 44");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'contact_us.php?type=US':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 45");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'contact_us.php?type=international':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 46");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;
						
						case 'product':
							$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM article WHERE id = 30");
							$dataMeta ='<meta name="robots" content="noindex, nofollow" />
									<meta name="keywords" content="'.$line->meta_keyword.'" />
									<meta name="description" content="'.$line->meta_description.'" />
									<title>'.$line->page_title.'</title>';
						break;						
						
					}						
					
					if(isset($_REQUEST['cid']) && isset($_REQUEST['sid']) && isset($_GET['pid'])){ 
						$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM products WHERE p_slug = '".$_REQUEST['pid']."'");
						$dataMeta ='<meta name="robots" content="noindex, nofollow" />
								<meta name="keywords" content="'.$line->meta_keyword.'" />
								<meta name="description" content="'.$line->meta_description.'" />
								<title>'.$line->page_title.'</title>';
					}elseif(isset($_REQUEST['cid']) && isset($_REQUEST['sid'])){
						$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM sub_category WHERE sub_cat_slug = '".$_REQUEST['sid']."'");
						$dataMeta ='<meta name="robots" content="noindex, nofollow" />
								<meta name="keywords" content="'.$line->meta_keyword.'" />
								<meta name="description" content="'.$line->meta_description.'" />
								<title>'.$line->page_title.'</title>';
					}elseif(isset($_REQUEST['cid'])){
						$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM category WHERE category_slug = '".$_REQUEST['cid']."'");
						$dataMeta ='<meta name="robots" content="noindex, nofollow" />
								<meta name="keywords" content="'.$line->meta_keyword.'" />
								<meta name="description" content="'.$line->meta_description.'" />
								<title>'.$line->page_title.'</title>';
					}elseif($_REQUEST['search_type'] == 1){
						$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM location_seo WHERE id = '".$_REQUEST['search_type']."'");
						$dataMeta ='<meta name="robots" content="noindex, nofollow" />
								<meta name="keywords" content="'.$line->meta_keyword.'" />
								<meta name="description" content="'.$line->meta_description.'" />
								<title>'.$line->page_title.'</title>';
					}elseif($_REQUEST['search_type'] == 2){
						$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM location_seo WHERE id = '".$_REQUEST['search_type']."'");
						$dataMeta ='<meta name="robots" content="noindex, nofollow" />
								<meta name="keywords" content="'.$line->meta_keyword.'" />
								<meta name="description" content="'.$line->meta_description.'" />
								<title>'.$line->page_title.'</title>';
					}elseif($_REQUEST['search_type'] == 4 || !isset($_REQUEST['search_type'])){
						$_REQUEST['search_type']=4;
						$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM location_seo WHERE id = '".$_REQUEST['search_type']."'");
						$dataMeta ='<meta name="robots" content="noindex, nofollow" />
								<meta name="keywords" content="'.$line->meta_keyword.'" />
								<meta name="description" content="'.$line->meta_description.'" />
								<title>'.$line->page_title.'</title>';
					}elseif($_REQUEST['search_type'] == 5){
						$line = $db->queryUniqueObject("SELECT page_title,meta_keyword,meta_description FROM location_seo WHERE id = '".$_REQUEST['search_type']."'");
						$dataMeta ='<meta name="robots" content="noindex, nofollow" />
								<meta name="keywords" content="'.$line->meta_keyword.'" />
								<meta name="description" content="'.$line->meta_description.'" />
								<title>'.$line->page_title.'</title>';
					}
					
			}
			return $dataMeta;
	}


	//main Head area for front Panel


	function mainHead($alias=''){


		global $db;





			$mainHeaderCode =	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


								<html xmlns="http://www.w3.org/1999/xhtml">


								<head>


								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


								<noscript><meta http-equiv="refresh" content="0; URL='.DEFAULT_URL.'/noscript.php"></noscript>


								'.$this->metaData($alias).'


								<link href="'.DEFAULT_URL.'/css/style.css" rel="stylesheet" type="text/css" />


								<link rel="shortcut icon" type="image/x-icon" href="'.DEFAULT_URL.'/favicon.ico">


								<script type="text/javascript" src="'.DEFAULT_URL.'/js/gen_validatorv31.js"></script>


								


								<script language="javascript">


								  // catch screen display area width


								 function alertSizeW() {


								  var myWidth = 0;


								  if( typeof( window.innerWidth ) == \'number\' ) {


									//Non-IE


									myWidth = window.innerWidth;


								  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {


									//IE 6+ in \'standards compliant mode\'


									myWidth = document.documentElement.clientWidth;


								  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {


									//IE 4 compatible


									myWidth = document.body.clientWidth;


								  }


								  


								  return myWidth ;


								}


								 // catch screen display area height


								function alertSizeH() {


								  var  myHeight = 0;


								  if( typeof( window.innerWidth ) == \'number\' ) {


									//Non-IE


									myHeight = window.innerHeight;


								  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {


									//IE 6+ in \standards compliant mode\'


									myHeight = document.documentElement.clientHeight;


								  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {


									//IE 4 compatible


									myHeight = document.body.clientHeight;


								  }


								


								  return myHeight ;


								}


								


								writeCookie();


								// function to set screen display area width and height in browser\'s cookie


								function writeCookie()


								{


										var today = new Date();


										var the_date = new Date("December 31, 2010");


										var the_cookie_date = the_date.toGMTString();


										var the_cookie = "users_resolution="+ alertSizeW() +"x"+ alertSizeH();


										var the_cookie = the_cookie + ";expires=" + the_cookie_date;


										document.cookie=the_cookie


								} 


								</script>


								</head>'."\n";


			echo $mainHeaderCode;


	


	}


	


	//main Heading for Admin Panel


	function mainAdminHead(){


	


			$mainHeaderCode =	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


								<html xmlns="http://www.w3.org/1999/xhtml">


								<head>


								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


								<meta name="robots" content="index, follow" />


								<meta name="keywords" content="" />


								<meta name="description" content="" />


								<meta name="generator" content="" />


								<title>'.SITE_TITLE_ADMIN.'</title>


								<link rel="shortcut icon" type="image/x-icon" href="'.DEFAULT_URL.'/favicon.ico">


								<link href="'.DEFAULT_URL.'/admin/css/style.css" rel="stylesheet" type="text/css" />


								<script type="text/javascript" src="'.DEFAULT_URL.'/admin/scripts/messages.js"></script>


								</head>'."\n";


			echo $mainHeaderCode;


	


	}


	


	








	


	


	function mainFoot(){


	


					if(SHOWDIBUG){


	?>


						<table width="100%" border="0" cellspacing="0" cellpadding="3" style="background-color:#FFFF66;" border="1">


							  <tr style="background-color:#33CCFF;">


								<td align="left" valign="top">Session array:</td>


								<td align="left" valign="top">Get array</td>


								<td align="left" valign="top">Post array</td>


								<td align="left" valign="top">cookie array</td>


							  </tr>


							  <tr>


								<td align="left" valign="top"><pre><? print_r($_SESSION);?></pre></td>


								<td align="left" valign="top"><pre><? print_r($_GET);?></pre></td>


								<td align="left" valign="top"><pre><? print_r($_POST);?></pre></td>


								<td align="left" valign="top"><pre><? print_r($_COOKIE);?></pre></td>


							  </tr>


							</table>





			<?php


			}				


	


			ob_end_flush();


	


	}





	function mainFootAdmin(){


	


			ob_end_flush();


	


	}


	


	//function to make proper alias name for url rewriting


	function makeAlias($data){


	


		 $string_alias = $data;


		 $string_alias = preg_replace('/\W/', ' ', $string_alias);


		 // replace all white space sections with a dash


		 $string_alias = preg_replace('/\ +/', '-', $string_alias);


		 // trim dashes


		 $string_alias = preg_replace('/\-$/', '', $string_alias);


		 $string_alias = preg_replace('/^\-/', '', $string_alias);


		 $string_alias = strtolower($string_alias);


		 $string_alias = ($string_alias);


	     return $string_alias;


	}


	


	function screenResolution(){


			global $screenwidth;


			echo $screenwidt;


			$infoAgent = $_SERVER['HTTP_USER_AGENT'];


			if(strpos($infoAgent,'MSIE') !== false && $screenwidth=='1276'){


				$width = "76.7%";


			}else if(strpos($infoAgent,'MSIE') !== false && $screenwidth=='1148')


			{


				$width = "74.3%";


			}


			else if(strpos($infoAgent,'MSIE') !== false && $screenwidth=='1225')


			{


				$width = "75.7%";


			}else if(strpos($infoAgent,'Mozilla') !== false && $screenwidth=='1152')


			{


				$width = "74.3%";


			}else if(strpos($infoAgent,'Mozilla') !== false && $screenwidth=='1280')


			{


				$width = "76.7%";


			}else


			{


				$width = "937px";


			}


			return $width;


	}


	


/*Function to get Main head for News Section ...*/


	function metaNewsData($alias=''){


			if(!$alias || $alias==''){


					$dataMeta ='<meta name="robots" content="index, follow" />


								<meta name="keywords" content="'.SITE_TITLE.'" />


								<meta name="description" content="'.SITE_TITLE.'" />


								<meta name="generator" content="'.SITE_TITLE.'" />


								<title>'.SITE_TITLE.'</title>';


			}else{


					global $db;


					$line = $db->queryUniqueObject("SELECT `news_title`,`news_meta_key`,`news_meta_desc`,`news_meta_author`,`news_meta_robots` FROM wm_news WHERE news_alias='".$alias."'");


					$dataMeta ='<meta name="robots" content="index, follow" />


								<meta name="keywords" content="'.$line->news_meta_key.'" />


								<meta name="description" content="'.$line->news_meta_desc.'" />


								<meta name="generator" content="'.$line->news_meta_author.'" />


								<title>'.$line->news_title.'</title>';


			


			}


			return $dataMeta;


	


	}


	//main Head area for front Panel


	function mainNewsHead($alias=''){


	


			$mainHeaderCode =	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


								<html xmlns="http://www.w3.org/1999/xhtml">


								<head>


								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


								'.$this->metaNewsData($alias).'


								<link href="'.DEFAULT_URL.'/css/style.css" rel="stylesheet" type="text/css" />


								<link rel="shortcut icon" type="image/x-icon" href="'.DEFAULT_URL.'/favicon.ico">


								<script type="text/javascript" src="'.DEFAULT_URL.'/script/gen_validatorv31.js"></script>


								<script language="javascript">


								  // catch screen display area width


								 function alertSizeW() {


								  var myWidth = 0;


								  if( typeof( window.innerWidth ) == \'number\' ) {


									//Non-IE


									myWidth = window.innerWidth;


								  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {


									//IE 6+ in \'standards compliant mode\'


									myWidth = document.documentElement.clientWidth;


								  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {


									//IE 4 compatible


									myWidth = document.body.clientWidth;


								  }


								  


								  return myWidth ;


								}


								 // catch screen display area height


								function alertSizeH() {


								  var  myHeight = 0;


								  if( typeof( window.innerWidth ) == \'number\' ) {


									//Non-IE


									myHeight = window.innerHeight;


								  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {


									//IE 6+ in \standards compliant mode\'


									myHeight = document.documentElement.clientHeight;


								  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {


									//IE 4 compatible


									myHeight = document.body.clientHeight;


								  }


								


								  return myHeight ;


								}


								


								writeCookie();


								// function to set screen display area width and height in browser\'s cookie


								function writeCookie()


								{


										var today = new Date();


										var the_date = new Date("December 31, 2010");


										var the_cookie_date = the_date.toGMTString();


										var the_cookie = "users_resolution="+ alertSizeW() +"x"+ alertSizeH();


										var the_cookie = the_cookie + ";expires=" + the_cookie_date;


										document.cookie=the_cookie


								} 


								</script>


								</head>'."\n";


			echo $mainHeaderCode;


	


	}


	


  /* Select Particular Country */


	function getCountryName($country)


	{


		global $db;


		$whereCondition = "CountryID = $country";


		$sqlQuery = "SELECT * FROM `country` WHERE $whereCondition";


		$getCountry = $db->query($sqlQuery);


		$fetchCountry = $db->fetchNextObject($getCountry);


		


		return $fetchCountry->Name;


	}


	


	/*Get All Countries..*/


	function getCountries()


	{


		global $db;


		$sqlQuery = "SELECT * FROM `country` ORDER BY `Name` ASC ";


		return $getCountry = $db->query($sqlQuery);


	}


	


	


	


	/*


	  Function isValidEmailAddress is to check for  email address validataion


	  It checks if the email format is correct also email id is valid or a bogus


	  email id.s


	*/


	function isValidEmailAddress($email) {


        //check email format 


		$flag=0;


		if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {


		   	$flag=1;


		   }


		 //check is email domain valid 


		 if($flag)  {


				$mailparts					=	explode( '@', $email, 2 );


				$domain						=	$mailparts[1];


				return checkdnsrr($domain,'MX');//return true on success and false on failure


			}


		 else{


		   		return false;


			}	


	   }  	


	   


	   


	   


}//end class








?>


