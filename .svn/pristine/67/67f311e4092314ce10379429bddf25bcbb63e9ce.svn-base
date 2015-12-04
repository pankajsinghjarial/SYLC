<?php
include("conf/config.inc.php");
$email	= $_POST['email'];

$common = new common();

$chkSql = "select count(id) as count from newsletter_subscriber where email = '".$email."'";
$countRec = mysql_fetch_assoc(mysql_query($chkSql));

if($countRec['count']>0){
    echo "0";
}else{
    $insertQuery = "INSERT into newsletter_subscriber set email = '".$email."', add_date = now(), status = 1";
    mysql_query($insertQuery);
    // From
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // Additional headers
    //$headers .= 'From:  . \r\n';
    $message = 'Vous avez vous abonner à la newsletter succès. Merci!!';
    $adminMessage = 'Abonnez-vous à la newsletter nouvel e-mail <br/><br/>';
    $adminMessage .= 'Adresse Email :  '.$email;
    $sentmail = sendSmtpMail( $email, "Thank you", $message );
    $sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, "Inscription à la newsletter", $adminMessage );
    echo "1";
}
exit;

?>