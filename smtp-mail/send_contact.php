 <?php

// Contact subject
$subject ="$subject";

// Details
$message="$detail";


// Mail of sender
$mail_from="$customer_mail";

// From
//$header="from: $name <$mail_from>";

$headers = 'From: '.$mail_from."\r\n".
'Reply-To: '.$mail_from."\r\n" .
'X-Mailer: PHP/' . phpversion();

// Enter your email address
$to ='4009@dothejob.org';

$send_contact=mail($to,$subject,$message,$headers);


// Check, if message sent to your email
// display message "We've recived your information"
if($send_contact){
echo "We've recived your contact information";
}
else {
echo "ERROR";
}
?>