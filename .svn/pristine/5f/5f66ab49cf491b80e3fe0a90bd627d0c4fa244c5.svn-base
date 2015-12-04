<?php

/*
 * SimpleModal Contact Form
 * http://www.ericmmartin.com/projects/simplemodal/
 * http://code.google.com/p/simplemodal/
 *
 * Copyright (c) 2009 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Revision: $Id: contact-dist.php 254 2010-07-23 05:14:44Z emartin24 $
 *
 */

// User settings
//$to = "mohan@planetwebsolution.com";
//$subject = "SimpleModal Contact Form";

// Include extra form fields and/or submitter data?
// false = do not include


// Process

include_once('../../../../conf/config.inc.php');

$action = isset($_POST["action"]) ? $_POST["action"] : "";
if (empty($action)) {
	// Send back the contact form HTML
	$output = "<div style='display:none'>
	<div class='contact-top'></div>
	<div class='contact-content'>
		<h1 class='contact-title'>Recover password:</h1>
		<div class='contact-loading' style='display:none'></div>
		<div class='contact-message' style='display:none'></div>
		<form action='#' style='display:none' method='post'>
			
			<label for='contact-email'>*Email:</label>
			<input type='text' id='contact-email' class='contact-input' name='email' tabindex='1002' />";

	

	

	$output .= "
			<label>&nbsp;</label>
			<button type='submit' class='contact-send contact-button' tabindex='1006'>Send</button>
			<button type='submit' class='contact-cancel contact-button simplemodal-close' tabindex='1007'>Cancel</button>
			<br/>
			<input type='hidden' name='token' value='".$to."'/>
		</form>
	</div>
	<div class='contact-bottom'></div>
</div>";

	echo $output;
}
else if ($action == "send") {
	// Send the email
	
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	
	//$message = isset($_POST["message"]) ? $_POST["message"] : "";
	

	
	
		//mysql_connect('localhost','root','root');
		//mysql_select_db('dfa');
		
		$sql="select * from `settings` where `admin`='".$_POST["email"]."'";
		//echo $sql;
			$query=mysql_query($sql);
			
	
	
	
	if(mysql_num_rows($query)>=1)
			{
				$data=mysql_fetch_object($query);
				$password=$data->password;
				
				$to=$email;
				//$to='kuldeep@planetwebsolution.com';
				$subject='Password recovery mail';
				$content='your password is:-'.$password;
				$headers  =  "From:admin \r\n".'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				if( mail($to, $subject, $content, $headers) )
				  {
				  echo 'Password sent at  '.$_POST["email"];
				  }
				  else
				  echo 'mail sending failed...';
	
	}
	else {
		echo "Your mail id '".$_POST["email"]."' not found in our database.";
		
	}
}





exit;

?>