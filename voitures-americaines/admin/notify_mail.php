<?php require_once '../conf/config.inc.php'; ?>
<?php 

require_once LIST_ROOT.'/class.phpmailer.php';

extract($_GET);


$clientInfo = $objCommon->read('leads','id='.$id);
$fetch=$db->fetchNextObject($clientInfo);
$first_name = $fetch->first_name;
$name = $fetch->name;
$email = $fetch->email;


try {
	$to_email = $email;
 //$to_email = '4011@dothejob.org';
	$message = "<html>
	<body>
	<p>Bonjour $name $first_name
certaines modifications ont été apportées à votre compte.<br/>
S'il vous plaît cliquer sur le lien ci-dessous pour vous connecter à votre compte SYLC-export.<br/>
<a href='http://www.sylc-export.com'>Cliquez Ici</a>
<br/><br/>

Merci de votre confiance, SYLC Corporation<br/></p>
<br/>
<table width='100%' border='0' cellspacing='0' cellpadding='0' style='table-layout:fixed'>
  <tr>
    <td valign='top' height='20'><span style='font-size:14px; color:#000000;'><strong>Sylc Corporation</strong></span></td>
  </tr>
  <tr>
    <td valign='top' height='30'><span style='font-size:14px; color:#000000;'><strong>Tracking Departement</strong></span><br />
</td>
  </tr>
</table>



</body>
</html>
";
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$body             = $message;
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "localhost"; // SMTP server
	$mail->Username   = "test@sylc-export.com";     // SMTP server username
	$mail->Password   = "Sylc!@34";            // SMTP server password

	//$mail->IsSendmail();  // tell the class to use Sendmail

	$mail->AddReplyTo("no-reply@example.com","First Last");

	$mail->From       = "info@sylc-export.com";
	$mail->FromName   = "Sylc-Export Update";


	$mail->AddAddress($to_email);

	//$mail->Subject  = html_entity_decode('Nouvelles mises à jour de SYLC_EXPORT sur votre voiture', ENT_COMPAT, "utf-8");
	$mail->Subject  = "Nouvelles mises à jour de votre voiture sur SYLC-EXPORT";

	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($body);

	$mail->IsHTML(true); // send as HTML

	$mail->Send();

	$notice="Sent Successfully";
	?><script language="javascript">location.href='customer_info.php?id=<?php echo $id;?>&notice=<?php echo $notice;?>'</script><?php 
	//header('Location:customer_info.php?id='.$id.'&custlogerrorMsg='.$custlogerrorMsg.'');
exit;
} catch (phpmailerException $e) {
	echo $e->errorMessage();
	$notice="Error Occured";
	?><script language="javascript">location.href='customer_info.php?id=<?php echo $id;?>&notice=<?php echo $notice;?>'</script><?php
	exit;
}

?>




