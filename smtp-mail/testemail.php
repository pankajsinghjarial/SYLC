<?php

require 'class.phpmailer.php';
if(isset($_POST['submit'])){
	try {
		$to_email = $_POST['email'];
		$mail = new PHPMailer(true); //New instance, with exceptions enabled
	
		$body             = file_get_contents('contents.html');
		$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
	
		$mail->IsSMTP();                           // tell the class to use SMTP
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Port       = 25;                    // set the SMTP server port
		$mail->Host       = "localhost"; // SMTP server
		$mail->Username   = "test@sylc-export.com";     // SMTP server username
		$mail->Password   = "Sylc!@34";            // SMTP server password
	
	//$mail->IsSendmail();  // tell the class to use Sendmail
	
		$mail->AddReplyTo("no-reply@example.com","First Last");
	
		$mail->From       = "testerbox1@hotmail.com";
		$mail->FromName   = "Greme Smith";
	

		$mail->AddAddress($to_email);
	
		$mail->Subject  = "First PHPMailer Message";
	
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$mail->WordWrap   = 80; // set word wrap
	
		$mail->MsgHTML($body);
	
		$mail->IsHTML(true); // send as HTML
	
		$mail->Send();
		echo 'Message has been sent.';
	} catch (phpmailerException $e) {
		echo $e->errorMessage();
	}
}

?>
<form name="frm1" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
Enter Your Email id: <input type="text" name="email" value="" />&nbsp;<input type="submit" name="submit" value="Submit" />
</form>