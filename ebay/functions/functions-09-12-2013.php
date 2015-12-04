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
?>
