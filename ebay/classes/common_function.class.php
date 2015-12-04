<?php
//Added bY Kapil Verma 20110804


class commonFunction extends utility{
	
	var $stateTblName = "states";
	var $countryTblName = "countries";
	var $categoryTblName = "categories";
	
	//Constructor defined
	public function commonFunction(){}

/* State Related Function Start */
		/*****************************************
		*                                        *
		* Function to get All states from table  *
		*              Kapil Verma               *
		*****************************************/
		function getStates(){
			 global $db;
	
			 $sqlQuery = $this->am_createSelectAllQuery($this->stateTblName,'1=1','state');

			 $resultState = $db->execute($sqlQuery); 					 
			 return $resultState;

		}
	
		/********************************************
		*                                           *
		* Function to get State Name from table  *
		*           Kapil Verma                     *
		********************************************/
		
		function getStateName($id){
			global $db;
			$sqlQuery = $this->am_createSelectAllQuery($this->stateTblName,'id = '.$id);
			$resultStateName = $db->execute($sqlQuery);
			$result = $db->fetchNextObject($resultStateName);
			return $result->state;
		}
/* Country Related Function Start */
		/********************************************
		*                                           *
		* Function to get All countries from table  *
		*           Kapil Verma                     *
		********************************************/
		function getCountries(){
			 global $db;
	
			 $sqlQuery = $this->am_createSelectAllQuery($this->countryTblName,'1=1','name');

			 $resultCountry = $db->execute($sqlQuery); 					 
			 return $resultCountry;

		}
		

		/********************************************
		*                                           *
		* Function to get Country Name from table  *
		*           Kapil Verma                     *
		********************************************/
		
		function getCountryName($id){
			global $db;
			$sqlQuery = $this->am_createSelectAllQuery($this->countryTblName,'id = '.$id);
			$resultCountryName = $db->execute($sqlQuery);
			$result = $db->fetchNextObject($resultCountryName);
			return $result->name;
		}


/* Category Related Function Start */
		/********************************************
		*                                           *
		* Function to get Allcategories from table  *
		*           Kapil Verma                     *
		********************************************/
		function getCategories(){
			 global $db;
	
			 $sqlQuery = $this->am_createSelectAllQuery($this->categoryTblName,'1=1','category_name');

			 $resultCategory = $db->execute($sqlQuery); 					 
			 return $resultCategory;

		}
		
/*----------------------------spam checking code to stop unwanted spam-2----------------------------*/				
		function spam_checker($name, $email, $message)
		{
				/******** START OF CONFIG SECTION *******/
		
				// Select if you want to check form for standard spam text
				  $SpamCheck = "Y"; // Y or N
				  $SpamReplaceText = "*content removed*";
				  
				// Error message prited if spam form attack found
				$SpamErrorMessage = "<p align=\"center\"><font color=\"red\">Malicious code content detected.
				</font><br><b>Your IP Number of <b>".getenv("REMOTE_ADDR")."</b> has been logged.</b></p>";
				/******** END OF CONFIG SECTION *******/
				
				if ($SpamCheck == "Y") {                                    
				// Check for Website URL's in the form input boxes as if we block website URLs from the form,
				// then this will stop the spammers wastignt ime sending emails
				if (preg_match("/http/i", "$name")) {echo "$SpamErrorMessage"; exit();} 
				if (preg_match("/http/i", "$email")) {echo "$SpamErrorMessage"; exit();} 
				if (preg_match("/http/i", "$message")) {echo "$SpamErrorMessage"; exit();} 
				
				// Patterm match search to strip out the invalid charcaters, this prevents the mail injection spammer 
				  $pattern = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i'; // build the pattern match string 
											
				  $name = preg_replace($pattern, "", $name); 
				  $email = preg_replace($pattern, "", $email); 
				  $message = preg_replace($pattern, "", $message); 
				
				// Check for the injected headers from the spammer attempt 
				// This will replace the injection attempt text with the string you have set in the above config section
				  $find = array("/bcc\:/i","/Content\-Type\:/i","/cc\:/i","/to\:/i"); 
				  $email = preg_replace($find, "$SpamReplaceText", $email); 
				  $name = preg_replace($find, "$SpamReplaceText", $name); 
				  $message = preg_replace($find, "$SpamReplaceText", $message); 
				  
				// Check to see if the fields contain any content we want to ban
				 if(stristr($name, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
				 if(stristr($message, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
				 
				 // Do a check on the send email and subject text
				 if(stristr($sendto, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
				 if(stristr($subject, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
				}
				return 1;

		}
/*---------------------------------------------------------------------------------------------*/		


}
		
	
		
		
?>