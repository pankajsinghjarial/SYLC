<?php
 
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
/**
  * Adds Slashes to sent value.
  *
  * @param string $buffer the text to add slashes to.
  *
  * @return string $buffer the converted string.
  */
function my_addslashes($what){
  
  if(is_array($what)){
     while (list($key, $val) = each($what)) {
       $what[$key] = my_addslashes($val);
     }
     return $what;
  } else {   	
   if (!(get_magic_quotes_gpc()))
    return addslashes($what);
   else
    return $what;
  }
}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
/**
  * Removes Slashes from sent value.
  *
  * @param string $buffer the text to remove slashes from.
  *
  * @return string $buffer the converted string.
  */
function my_stripslashes($what){
	if(is_array($what)){
     while (list($key, $val) = each($what)) {
       $what[$key] = my_stripslashes($val);
     }
     return $what;
  } else {    
    if (!(get_magic_quotes_gpc())) 
       return $what;
    else
       return stripslashes($what);
  }
}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
/**
  * Reads all values from the Request Object either adding slashes or 
  * Removing them based on preference.
  *
  * @param string $buffer the text to remove slashes from.
  *
  * @return string $buffer the converted string.
  */
function parse_incoming($addslashes=false){
   global $_REQUEST;

   if($addslashes)
      return my_addslashes($_REQUEST);               
   else 
      return my_stripslashes($_REQUEST);     
}


//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/**
  * Makes a SQL insert value "safe" by escaping quotes and optionally  
  * casting as a integer if needed.
  *
  * @param string $buffer the text to make sql safe.
  * @param bool $addslashes add slashes to string if not already done.
  * @param bool $numeric  cast value as int.
  * @param int $maxsize  max size of string 0 is unlimited.
  *
  * @return string $buffer the converted string.
  */
function filter_sql($what,$addslashes=true,$numeric=false,$maxsize=0){	 
	 
	 if($addslashes)
	   $what = addslashes($what);
	 else
	   $what = addslashes(stripslashes($what));
	   
	 if($numeric)
	   $what = intval($what);
	   
	 if($maxsize!=0)
	   $what = substr($what,0,$maxsize);
   
	 $what = str_replace("`","",$what);
	 
   // un-comment the following lines for compatability with Microsoft SQL server:
   // may cause problems with txt-db-api if uncommented...
	  //$what = str_replace("\'", "''", $what);
	  //$what = str_replace("\"", "\"\"", $what);
	 
	 return $what;	   
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/**
  * Checks to make sure a e-mail is vaild...
  *
  * @param string $email - email address to check.
  *
  * @return bool true if valid false otherwise...
  */
function good_emailaddress($email){		
if (!(preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*?[a-z]+$/is', $email)))
	return false;	
 else
  return true;   
}
 
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/**
  * Makes a string insert value "safe" by escaping HTML chars 
  *
  * @param string $buffer the text to make sql safe.
  *
  * @return string $buffer the converted string.
  */
function filter_html($what){      
  
 
   ///.. BASIC ASCII Entities with new Entity Names 
     $what = str_replace( "&#"           , "(^)-(^)"       , $what ); 
     $what = str_replace( "&"            , "&amp;"         , $what ); 
     $what = str_replace( ">"            , "&gt;"          , $what ); 
     $what = str_replace( "<"            , "&lt;"          , $what ); 
     $what = preg_replace( "/\"/"          , "&quot;"        , $what ); 
     $what = str_replace( "!"            , "!"         , $what ); 
     $what = str_replace( "'"            , "'"         , $what ); 
     $what = str_replace( "(^)-(^)"       , "&#"            , $what ); 
     $what = str_replace("`"             ,""               , $what ); 
     $what = preg_replace("/\n/"        , "<br>"          , $what ); 
     $what = preg_replace("/\r/"        , ""              , $what );        
 

   // for some really strange reason this is replacing all characters:   
   $what = str_replace("&Acirc;&"            , "&"      , $what );    
    
   //$what = str_replace("Ã"            , "&Atilde;"      , $what );  
   //$what = str_replace("ã"            , "&atilde;"      , $what );          
  
     return $what;        
}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/**
  * Makes sure string is only alpha numeric. 
  *
  * @param string $buffer the text to make sql safe.
  *
  * @return string $buffer the converted string.
  */
function alphanumeric($string){
	$string =  preg_replace("/[^a-zA-Z0-9]/","", $string);
  return $string;
}


//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/**
  * Makes sure string is filterd before sending to system command 
  * no piping, passing possible environment variables ($),
  * seperate commands, nested execution, file redirection,
  * background processing, special commands (backspace, etc.), quotes
  * newlines, or some other special characters
  *
  * @param string $buffer the text to make what safe
  *
  * @return string $buffer the converted string.
  */
function filter_what($string){
	return escapeshellwhat($string);
  //$pattern = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i'; 
  //$string = preg_replace($pattern, '', $string);
  //$string = '"'.preg_replace('/\$/', '\\\$', $string).'"'; //make sure this is only interpretted as ONE argument
  //return $string;
  
}
?>