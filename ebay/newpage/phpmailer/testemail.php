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
		$mail->Host       = "mail.livemarketnews.com"; // SMTP server
		$mail->Username   = "mails@livemarketnews.com";     // SMTP server username
		$mail->Password   = "Stone!@#";            // SMTP server password
	
		$mail->IsSendmail();  // tell the class to use Sendmail
	
		$mail->AddReplyTo("no-reply@example.com","First Last");
	
		$mail->From       = "no-reply@example.com";
		$mail->FromName   = "First Last";
	

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