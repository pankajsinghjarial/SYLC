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
    
    
    $heading = 'Abonnez-vous &agrave; la newsletter Demande';
    $subHeading = 'Abonnez-vous &agrave; la newsletter nouvel e-mail : ';
    
    $emailData['Adresse Email'] = $email;
    $emailData["Vous avez re&ccedil;u un e-mail &agrave; partir d'ici"] = DEFAULT_URL;
    $message = emailContentsWrapper($emailData,$heading,$subHeading);
    //print_r($message); die;
    $adminEmails = $common->getAdminNotificationEmails();
    //print_r($adminEmails); die;
    foreach($adminEmails as $emailA ) {
        sendSmtpMail( $emailA, "Inscription à la newsletter", $message );
    }
    
    
    
   // $adminMessage = html_entity_decode(htmlentities($adminMessage, ENT_NOQUOTES, "UTF-8"));
    
    // Confirmation to User
    $heading = 'Merci';
    //die($heading);
    //$subHeading = 'Vous vous êtes inscrit à la Newsletter avec succès<br><br>Merci encore<br/>Americancarcentrale.com';
    $subHeading = 'Vous vous êtes inscrit à la Newsletter avec succès<br><br>Merci encore<br/>Sylc-export.com';
    $message = emailContentsWrapper(null,$heading,$subHeading);
    sendSmtpMail( $email, "Merci", $message );
    
   /* $_SESSION['sentmail_txt'] = '
    <script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
    <link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
    (function($){
            $(document).ready(function(){
                    $.msgBox({
                            title:"Merci",
                            content:"Nous avons ajout&eacute; votre demande avec succ&egrave;s",
                            type:"info",
                            timeOut:5000,
                            opacity:0.6,
                            autoClose:true
                    });
            });
    })(jQuery); 
    </script>';*/
    $_SESSION['success'] = 'ok';
    
    echo "1";
}
exit;

?>