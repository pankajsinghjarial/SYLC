<?php
# ----------------------------------------------------------------------------------------------------
# * FILE: /classes/class_handle.php
# ----------------------------------------------------------------------------------------------------

class Handle {
	function Handle() {
	}

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
		if((!$url || $url=='')  and basename($_SERVER['PHP_SELF'])!='page.php' and basename($_SERVER['PHP_SELF'])!='contact.php' and basename($_SERVER['PHP_SELF'])!='faq.php' and basename($_SERVER['PHP_SELF']) !='announces.php' and basename($_SERVER['PHP_SELF']) !='nos_stock.php'){



			$line = $db->queryUniqueObject("SELECT site_title,meta_keywords,meta_description FROM admins WHERE id = 1");


			$dataMeta ='<meta name="keywords" content="'.$line->meta_keywords.'" />


					<meta name="description" content="'.$line->meta_description.'" />


							<title>'.$line->site_title.'</title>';
		}elseif( ($url=='announces' || basename($_SERVER['PHP_SELF']) =='announces.php') && (isset($_SERVER['argv']['0']) && $_SERVER['argv']['0']!='' && $_SERVER['argv']['0']=='manufacturer=Excalibur&groupby=fullName')){
			$dataMeta ='<meta name="keywords" content="Consultez les annonces d’American car centrale : y figurent de nombreux modèles de voitures Américaines neuves ou de voitures anciennes americaines." />
						<meta name="description" content="Consultez les annonces d’ american car centrale : y figurent de nombreux modèles de voitures Américaines neuves ou de voitures anciennes americaines." />
						<title>Meilleur sélections de voiture américaine neuve ou d\'occasion</title>';

		}elseif( ($url=='announces' || basename($_SERVER['PHP_SELF']) =='announces.php') && (isset($_SERVER['argv']['0']) && $_SERVER['argv']['0']!='' && $_SERVER['argv']['0']=='manufacturer=Ford&groupby=fullName')){
			$dataMeta ='<meta name="keywords" content="Sur American Car Centrale, un choix d’américain voiture Ford Mustang présente et met en valeur les différents modèles de cette voiture americain de légende. " />
						<meta name="description" content="Sur American Car Centrale, un choix d’américain voiture Ford Mustang présente et met en valeur les différents modèles de cette voiture americain de légende" />
						<title>Meilleur sélections de voiture américaine neuve ou d\'occasion</title>';

		}elseif( ($url=='announces' || basename($_SERVER['PHP_SELF']) =='announces.php') && (isset($_SERVER['argv']['0']) && $_SERVER['argv']['0']!='' && $_SERVER['argv']['0']=='manufacturer=Dodge&groupby=fullName')){
			$dataMeta ='<meta name="keywords" content="Plus de 2000 modèles de la Dodge, voiture américaine que vous rêvez de conduire, sont sur American Car Centrale, Voitures américaine à l’achat ou aux enchères." />
						<meta name="description" content="Plus de 2000 modèles de la Dodge, voiture américaine que vous rêvez de conduire, sont sur American Car Centrale, Voitures américaine à l’achat ou aux enchères" />
						<title>Meilleur sélections de voiture américaine neuve ou d\'occasion</title>';
		}else if( $url=='announces' || basename($_SERVER['PHP_SELF']) =='announces.php'){
			
			$dataMeta ='<meta name="keywords" content="Les Voitures américaines à l’achat ou aux enchères sont sur American Car Centrale avec les caractéristiques de chaque voitur americaine (année, puissance …)." />
						<meta name="description" content="Les Voitures américaines à l’achat ou aux enchères sont sur American Car Centrale avec les caractéristiques de chaque voitur americaine (année, puissance …)" />
						<title>Meilleur sélections de voiture américaine neuve ou d\'occasion</title>';
		
		}elseif( ($url=='nosstock' || basename($_SERVER['PHP_SELF']) =='nos_stock.php') && (isset($_SERVER['argv']['0']) && $_SERVER['argv']['0']!='' && $_SERVER['argv']['0']=='stockType=classic')){
			$dataMeta ='<meta name="keywords" content="camion americain, american car, voiture américaine, voitures américaines, voiture usa, voiture occasion usa, voitures anciennes americaines, voitures usa, piece voiture americaine, voiture américaines, voitures us, voiture us occasion, marque américaine voiture, voiture usa occasion, voitur americaine, voiture american, voitures américaine, voiture américain, les voitures américaines" />
						<meta name="description" content="Nous présentons une gamme importante de modèles de Voitures Américaines neuves ou de superbes Voitures anciennes americaines avec des descriptifs complets" />
						<title>Tapez la marque de la voiture US convoitée, sa photo apparaît</title>';
								
		}else if( $url=='nosstock' || basename($_SERVER['PHP_SELF']) =='nos_stock.php'){
			
			$dataMeta ='<meta name="keywords" content="camion americain, american car, voiture américaine, voitures américaines, voiture usa, voiture occasion usa, voitures anciennes americaines, voitures usa, piece voiture americaine, voiture américaines, voitures us, voiture us occasion, marque américaine voiture, voiture usa occasion, voitur americaine, voiture american, voitures américaine, voiture américain, les voitures américaines" />
						<meta name="description" content="American Car Centrale fournit votre voiture américaine de rêve. Trouvez la marques américaine de voiture populaire neuve ou d’occasion à meilleur prix." />
						<title>Le modèle de voitures usa de vos rêves en ligne sur notre site</title>';
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
				case 'services':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 52");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;

				case 'presentation':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 53");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;

				case 'contacts':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 17");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;

				case 'faq':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 46");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;

				case 'nos-garanties':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 47");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;

				case 'logistique':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 48");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;

				case 'conseils':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 49");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;

				case 'calculateur':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 50");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;

				case 'devis':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 51");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;

				case 'dmca-policy':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 44");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;
						
				case 'product-label':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 45");
					$dataMeta ='<meta name="keywords" content="Le véhicule mis en ligne par nous Voiture d’occasion par exemple est présenté avec toute son étiquette détaillée en tant que voiture d’occasion États-Unis." />
									<meta name="description" content="Le véhicule mis en ligne par nous Voiture d’occasion par exemple est présenté avec toute son étiquette détaillée en tant que voiture d’occasion États-Unis." />
											<title>Nos voitures américaines affichent fièrement leur label en ligne</title>';
					break;

				case 'privacy-policy':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 13");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;

				case 'terms-and-conditions':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 12");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;
				case 'notre-mission':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 54");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;
				case 'neuf':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 55");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;
				case 'classic-car':
					$line = $db->queryUniqueObject("SELECT metatitle,metakeyword,metadescription FROM pages WHERE id = 56");
					$dataMeta ='<meta name="keywords" content="'.$line->metakeyword.'" />
									<meta name="description" content="'.$line->metadescription.'" />
											<title>'.$line->metatitle.'</title>';
					break;
			}
				
				
				
		}
		
		
		$dataMeta .= '<meta name="msvalidate.01" content="848A369DB6BD3DF603EFC1344F2564F5" />'; 
		
		
		return $dataMeta;
	}












	function mainFoot(){





		if(SHOWDIBUG){


			?>


<table width="100%" border="0" cellspacing="0" cellpadding="3"
	style="background-color: #FFFF66;" border="1">


	<tr style="background-color: #33CCFF;">


		<td align="left" valign="top">Session array:</td>


		<td align="left" valign="top">Get array</td>


		<td align="left" valign="top">Post array</td>


		<td align="left" valign="top">cookie array</td>


	</tr>


	<tr>


		<td align="left" valign="top"><pre>
				<? print_r($_SESSION);?>
			</pre></td>


		<td align="left" valign="top"><pre>
				<? print_r($_GET);?>
			</pre></td>


		<td align="left" valign="top"><pre>
				<? print_r($_POST);?>
			</pre></td>


		<td align="left" valign="top"><pre>
				<? print_r($_COOKIE);?>
			</pre></td>


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