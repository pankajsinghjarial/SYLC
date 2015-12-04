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

		

		

?>

