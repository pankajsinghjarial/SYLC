<?php

$first_name = "First name";
$last_name = "Last name";
$email = "test@test.com";
$phone = "1323456454";


// send e-mail to ...
	//$to = '4006@dothejob.org';//$adminEmail;
	$to='4006@dothejob.org';
	// Your subject
	$subject='User Enroll';
	// From
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'From: '.$first_name.'<'.$email.'>' . "\r\n";
	$message = 'The person that contacted you is  '.$first_name .' '.$last_name
	.'<br/>	E-mail: '.$email.'<br/>
	Phone Number: '.$phone.'<br/>';


//send the email

$sentmail = mail( $to, $subject, $message, $headers );