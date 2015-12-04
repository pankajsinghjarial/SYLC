<?php



/*

coder : Anoop sharma

common functions to use in every page lihe page redirection ,

set a session or get a session value or print session or cookie array 

and check javascript suport in browser

*/

	function openZip($file_to_open) {

		global $target;

		global $unique_folder;

		$zip = new ZipArchive();

			$x = $zip->open($file_to_open);

			if ($x === true) {

				$zip->extractTo($target . $unique_folder);

				$zip->close();



				unlink($file_to_open); #deletes the zip file. We no longer need it.

			} else {

				die("There was a problem. Please try again!");

			}

		}

		

		//function for common redirection from one page to another

		function redirectUrl($urlToRedirect){

				echo '<script language="javascript">location.href="'.$urlToRedirect.'";</script>';

		}

		

		//function to check javascript support for browser and if no support then redirect to a page

		function checkJavascriptSupport($urlToRedirect){

				echo '<noscript><meta http-equiv="refresh" content="0; URL="'.$urlToRedirect.'"></noscript>';

		

		}

		

		//common function to set a session insteed of using $_SESSION directly

		function setSession($sessionName,$value){

				@session_start();

				$_SESSION[$sessionName] = $value;

		}

		

		//common function to get a session value insteed of using $_SESSION directly

		function getSession($sessionName){

				@session_start();

				return $_SESSION[$sessionName];

		}

		

		//common function to show session array

		function getSessionArray(){

				@session_start();

				print_r($_SESSION);

		}

		

		//common function to show session array

		function getCookieArray(){

				print_r($_COOKIE);

		}
		
		//Kapil verma
		function pr($dataArray){
			echo "<pre>";
			print_r($dataArray);
			echo "</pre>";
		}
		
		// Function to validate against any email injection attempts
		function IsInjected($str){
		  $injections = array('(\n+)',
					  '(\r+)',
					  '(\t+)',
					  '(%0A+)',
					  '(%0D+)',
					  '(%08+)',
					  '(%09+)'
					  );
		  $inject = join('|', $injections);
		  $inject = "/$inject/i";
		  if(preg_match($inject,$str))
			{
			return true;
		  }
		  else
			{
			return false;
		  }
		}
		
		
		
	//ADDED BY KAPIL VERMA 20111220	
	function strReplaceAssoc(array $replace, $subject) {
   		return str_replace(array_keys($replace), array_values($replace), $subject);   
	}
        //ADDED BY KAPIL VERMA TO FILTER BAD WORDS.
        // It returns 1 if found any bad words in $texto.
        // Pass Your Bad Words Separated by comma in $badwords
        // If $reemplazo is true then your string is returned with dirty words replaced by 1
   function filter_bad_words($texto, $badwords ,$reemplazo = false){            
            $f = explode(',', $badwords);
            $f = array_map('trim', $f);
            $filtro = implode('|', $f);     
            return ($reemplazo) ? preg_replace("#$filtro#i", $reemplazo, $texto) : preg_match("#$filtro#i", $texto) ;
    }
	
	#function to automatically show menu selected when the realted page is opened
	function menuStatus($menu=''){
	
		if(strpos($_SERVER['REQUEST_URI'],'/'.$menu)!==false){
				$class = 'current';
		}else{
				$class = 'select';
		}
		
		return $class;
	
	}
		
	#function to automatically show submenu when the realted page is opened
	function subMenuStatus($menu=''){
	
		if(strpos($_SERVER['REQUEST_URI'],'/'.$menu)!==false){
				$class = ' show';
		}else{
				$class = '';
		}
		
		return $class;
	
	}
	
	function pageStatus($status){
	
		if($status==1){
				$status = 'Yes';
		}else{
				$status = 'No';
		}
		
		return $status;
	
	}
	
	# Function 2 remove all special charactors from a string	
	function removeSpecialChars($str) {
	
		return preg_replace("/[^A-Za-z0-9 ]/","",$str);
	
	}
	
	function imageUpload($uploadPath,$fileName,$tmp_name,$defaultFileName) {
	
			@chmod($uploadPath,0777);
			
			if(move_uploaded_file($tmp_name,$uploadPath.$fileName)){
					return $fileName;
			}else{
					return $defaultFileName;
			
			}
	
	}
	
	function fileUpload($uploadPath,$fileName,$fileFieldName,$imageTypes=array('image/gif','image/jpeg','image/pjpeg'),$fileSize=200,$oldImageNameName='',$defaultFileName=''){
	
					if(in_array($_FILES[$fileFieldName]['type'],$imageTypes)){

							#checking if image size is greater then 200kb or not.if greater then 200kb 
							#then we are not updating image but we are updating other data
							$fileSizeNew 						= $_FILES[$fileFieldName]['size'] / 1024;
							if((int)$fileSizeNew > $fileSize){
								$imgsuccess 					=  0;
								return $imgsuccess;						
							}
							else
							{
								$fileName 						= imageUpload($uploadPath,$fileName,$_FILES[$fileFieldName]['tmp_name'],$defaultFileName);
								@unlink(LIST_ROOT_ADMIN.'/images/logo_header/'.$oldImageNameName);
								$imgsuccess 					=  1;	
								return $imgsuccess;
							}
					}
					else
					{
								$imgsuccess 					=  2;	
								return $imgsuccess;					
					
					}
	}
	
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
	
	
	function convertTimeLeft($str){
		$time;
		$str = substr($str, 1);
		$time = substr($str, 0, strpos($str,"DT"))."d ";
		$str = substr($str, strpos($str,"T")+1);
		$time .= substr($str, 0, strpos($str,"H"))."h ";
		$str = substr($str, strpos($str,"H")+1);
		$time .= substr($str, 0, strpos($str,"M"))."m";
		return $time;
	}

	
	function sendSmtpMail( $to = '', $subject = '', $message = '', $html = true){
		
		
		$subject = html_entity_decode(htmlentities($subject, ENT_NOQUOTES, "UTF-8"));
		
		$mail = new PHPMailer(true); //New instance, with exceptions enabled
		
		/*$mail->IsSMTP();                           // tell the class to use SMTP
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		/* $mail->SMTPDebug  = 2; */
		//$mail->Port       = '25';   
		/* $mail->SMTPSecure = 'ssl'; */                 // set the SMTP server port
		//$mail->Host       = "mail.seobranddev.com"; // SMTP server
		/*$mail->Host       = "mail.americancarcentrale.com"; // SMTP server
		$mail->Username   = "smtp@americancarcentrale.com";     // SMTP server username
		$mail->Password   = "india123";            // SMTP server password
		*/
		$mail->IsSendmail();  // tell the class to use Sendmail
	
		$mail->AddReplyTo("sylc.corp@gmail.com","AmericanCarCentrale");
		
		$mail->SetFrom("info@americancarcentrale.com","AmericanCarCentrale");
		
		$mail->AddAddress($to);
	
		$mail->Subject  = $subject;
	
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$mail->WordWrap   = 80; // set word wrap
	
		$mail->MsgHTML($message);
	
		//$mail->IsHTML($html); // send as HTML
	
		if(!$mail->Send()) {
			return true;
		}
		else{
			return false;
		}
	}
	
	function renderSpecialChars($text) {
		return  html_entity_decode(htmlentities($text, ENT_NOQUOTES, "UTF-8"));
	}
	function emailHeader(){
		return '<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>
			<td style="background:#ededed; border-bottom:3px solid #e3e3e3;"><table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
			    <tr>
			      <td><img src="' .DEFAULT_URL. '/images/logo.jpg" alt="" /></td>
			      <td><img src="' .DEFAULT_URL. '/images/car.jpg" alt="" /></td>
			    </tr>
			  </table></td>
		      </tr>';
	}
	
	function emailFooter(){
		return '<tr>
					<td style="background:#e7e7e7; border-top:1px solid #e7e7e7;"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-top:1px solid #f2f2f2;">
						<tr>
						  <td><table width="650" border="0" cellspacing="0" cellpadding="0" align="center" style="padding-bottom : 20px;">
							  <tr>
								<td style="border-right:#ffffff 1px solid;" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; color:#272727; font-size:12px; line-height:20px;">
									<tr>
									  <td style="font-family:Arial, Helvetica, sans-serif; color:#c70000; font-size:17px; padding:15px 0 10px;">Accueil</td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '/page/qui-sommes-nous" style="color:#272727; text-decoration:none;">Qui Sommes-Nous?</a></td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '/page/presentation" style="color:#272727; text-decoration:none;">Présentation</a></td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '#recherche_id" style="color:#272727; text-decoration:none;">Recherche</a></td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '#most_viewed_id" style="color:#272727; text-decoration:none;">Véhicules Populaires</a></td>
									</tr>
								  </table></td>
								<td style="border-right:#ffffff 1px solid; border-left:1px solid #b9b9b9; padding:0 0 0 22px;" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; color:#272727; font-size:12px; line-height:20px;">
									<tr>
									  <td style="font-family:Arial, Helvetica, sans-serif; color:#c70000; font-size:17px; padding:15px 0 10px;"><a href="' .DEFAULT_URL. '/announces" style="color:#c70000; text-decoration:none;">Les Annonces</a></td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '/nosstock" style="color:#272727; text-decoration:none;">Nos Stocks</a></td>
									</tr>
								  </table></td>
								<td style="border-right:#ffffff 1px solid; border-left:1px solid #b9b9b9; padding:0 0 0 22px;" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; color:#272727; font-size:12px; line-height:20px;">
									<tr>
									  <td style="font-family:Arial, Helvetica, sans-serif; color:#c70000; font-size:17px; padding:15px 0 10px;">
									  <a href="' .DEFAULT_URL. '/page/services" style="color:#c70000; text-decoration:none;">Services</a></td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '/page/nos-garanties" style="color:#272727; text-decoration:none;">Nos Garanties</a></td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '/page/logistique" style="color:#272727; text-decoration:none;">Logistiques</a></td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '/page/conseils" style="color:#272727; text-decoration:none;">Conseils</a></td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '/page/calculateur" style="color:#272727; text-decoration:none;">Calculateur</a></td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '/faq" style="color:#272727; text-decoration:none;">FAQ</a></td>
									</tr>
								  </table></td>
								<td style="border-left:1px solid #b9b9b9; padding:0 0 0 22px;" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; color:#272727; font-size:12px; line-height:auto;">
									<tr>
									  <td style="font-family:Arial, Helvetica, sans-serif; color:#c70000; font-size:17px; padding:15px 0 10px;">
									  <a href="' .DEFAULT_URL. '/contacts" style="color:#c70000; text-decoration:none;">Contact</a></td>
									</tr>
									<tr>
									  <td><a href="' .DEFAULT_URL. '/page/devis" style="color:#272727; text-decoration:none;">Devis</a></td>
									</tr>
								  </table></td>
							  </tr>
							</table></td>
						</tr>
					  </table></td>
				  </tr>
				  <tr>
					<td><table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
						<tr>
						  <td style="font-family:Arial, Helvetica, sans-serif; color:#282828; text-align:center; font-size:12px; padding:10px 0 6px 0;">Copyright © 2011. All Rights Reserved.</td>
						</tr>
						<tr>
						  <td  style=" padding:0 0 15px 0; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#282828; font-size:11px;">
						  <a href="' .DEFAULT_URL. '/page/terms-and-conditions" style="font-family:Arial, Helvetica, sans-serif; color:#282828; font-size:11px; text-decoration:none;">Terms &amp; Conditions</a>
						  &nbsp; | &nbsp;<a href="' .DEFAULT_URL. '/page/privacy-policy" style="font-family:Arial, Helvetica, sans-serif; color:#282828; font-size:11px; text-decoration:none;">Privacy Policy</a>
						  &nbsp; | &nbsp;<a href="' .DEFAULT_URL. '/page/dmca-policy" style="font-family:Arial, Helvetica, sans-serif; color:#282828; font-size:11px; text-decoration:none;">DMCA Policy</a>
						  &nbsp; | &nbsp;<a href="' .DEFAULT_URL. '/page/" style="font-family:Arial, Helvetica, sans-serif; color:#282828; font-size:11px; text-decoration:none;">Product Label</a>
						  &nbsp; | &nbsp;<a href="' .DEFAULT_URL. '/sitemap" style="font-family:Arial, Helvetica, sans-serif; color:#282828; font-size:11px; text-decoration:none;">Site Map</a></td>
						</tr>
					  </table></td>
				  </tr></table>';
	}
	function emialHeading( $heading = null){
		return '<tr>
		  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
		      <tr>
			<td style="line-height:0;"><img src="'.DEFAULT_URL.'/images/headingback.jpg" alt="" /></td>
		      </tr>
		      <tr>
			<td style="font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#FFFFFF; background-color:#a30000; padding:0 0 7px 11px; text-align:left;">' . renderSpecialChars($heading) . '</td>
		      </tr>
		    </table></td>
		</tr>';
	}
	
	function emailContentsHeading( $heading = null ) {
		return '<tr>
		  <td  style="font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#000000; padding:17px 0 10px 11px; text-align:left;">' . renderSpecialChars($heading) . '</td>
		</tr>';
	}
	
	function emailContentsWrapper( $contents = array(), $heading = null, $subHeading = null,$footerHeading = null ) {
		$contentsWrapper = emailHeader();
		$contentsWrapper .= '<tr>
			<td style="background:#FFFFFF; padding:20px 0;"><table width="650" border="0" cellspacing="0" cellpadding="0" align="center" style="background:#f4f4f4;">
				'.emialHeading( $heading ) .
				emailContentsHeading( $subHeading );
				
				if( $contents ) {
					$contentsWrapper .= '<tr>
					  <td style="padding:0 10px 10px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff; border:2px solid #e6e6e6;
					  font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#000000;">
						  '.emailContents( $contents ).'
						</table></td>
					</tr>';
				}
				if($footerHeading)
				$contentsWrapper .= emailContentsHeading( $footerHeading );
			  $contentsWrapper .= '</table></td>
		</tr>';
		$contentsWrapper .= emailFooter();
		
	  return $contentsWrapper;
	}
	
	function emailContents ( $data = null) {
		
		$contents = null;
		$counter = 1;
		if( $data  == null ) return null;
		foreach( $data as $key => $value ) {
			$back = ($counter % 2 == 0 ) ? ' style="background:#f4f4f4;"' : "";
			$key = renderSpecialChars($key);
			$value = renderSpecialChars($value);
			if( $value == null ) {
				$contents .='<tr' .$back.'>
							<td valign="top" width="100%" colspan="2" style="padding:6px 10px 8px 0; text-align:center;"> <b>' . $key. ' :</b></td>
						</tr>';
			}
			else {
				$contents .='<tr' .$back.'>
							<td valign="top" width="45%" style="padding:6px 10px 8px 0; text-align:right;"> ' . $key. ' :</td>
							<td valign="top" width="55%" style="padding:6px 10px 8px 0;">' .$value.'</td>
						</tr>';
			}
			
			$counter++;
		}
		return $contents;
	}
?>
