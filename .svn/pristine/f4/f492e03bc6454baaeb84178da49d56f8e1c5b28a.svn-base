<?php  require_once '/home1/sylcexpo/public_html/voitures-americaines/class.phpmailer.php';
			//SMTP MAIL STARTS

			try {
				$to_email = '4010@dothejob.org';
				$mail = new PHPMailer(true); //New instance, with exceptions enabled
			
				$body             = $message;
				$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
			
				$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "localhost"; // SMTP server
	$mail->Username   = "test@sylc-export.com";     // SMTP server username
	$mail->Password   = "Sylc!@34";            // SMTP server password
			
			//	$mail->IsSendmail();  // tell the class to use Sendmail
			
				$mail->AddReplyTo("no-reply@example.com","First Last");
			
				$mail->From       = "info@sylc-export.com";
				$mail->FromName   = "Administrator";
			
			
				$mail->AddAddress($to_email);
			
				$mail->Subject  = "Test";
			
				//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
				$mail->WordWrap   = 80; // set word wrap
			
				$mail->MsgHTML('Test');
			
				$mail->IsHTML(true); // send as HTML
			
				$mail->Send();
				$custlogerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Updated</font>";
				//echo 'Message has been sent.';
			} catch (phpmailerException $e) {
				echo $e->errorMessage();
			}
			
			
			/*

include("/home/ladilapp/public_html/rags-to-rupees/SMTPconfig.php");
include("/home/ladilapp/public_html/rags-to-rupees/SMTPclass.php");
$to = 'seobranddevelopers@gmail.com';//$adminEmail;
$subject='User Enroll';// Your subject
$message = 'The person that contacted you is  '.$first_name." ".$last_name
.'<br/>	E-mail: '.'asdasdas'.'<br/>
					Phone: '.'asdasdas'.'<br/>
					Address: '.'asdasdas'.'<br/>
					City: '.'asdasdas'.'<br/>
					State: '.'asdasdas'.'<br/>
					Zip Code: '.'asdasdas' .'<br/>'
							;
							/*echo $headers;
							 echo $message1; exit;/
							//send the email
							$SMTPMail = new SMTPClient ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $email, '4010@dothejob.org', 'asdasdas','asdasdas',$headers);
							$SMTPChat = $SMTPMail->SendMail();*/ 
		