<?php
include("conf/config.inc.php");

$phone = $phone1 = $_POST['phone'];



$common = new common();

//$chkSql = "select count(id) as count from phone_leads where phone_number = '".$phone."'";
//$countRec = mysql_fetch_assoc(mysql_query($chkSql));
$countRec['count'] = 0;
if($countRec['count']>0){
    echo "0";
}elseif(trim($phone) == ""){
    echo "0";
}else{
    $insertQuery = "INSERT into phone_leads set phone_number = '".$phone."', add_date = now()";
    mysql_query($insertQuery);
    
    
    $heading = 'Appel Demande';
    $subHeading = 'Vous avez re&ccedil;u une demande de rappel  de : '.$phone1;
    $subHeading .= "<br/><br/><span style='font-size:18px;'>Vous avez re&ccedil;u un e-mail &agrave; partir d'ici : ".DEFAULT_URL.'</span>';
    $footerHeading = 'Merci encore<br/>Americancarcentrale.com';
    
    $message = emailContentsWrapper(null, $heading, $subHeading, $footerHeading);
    $adminEmails = $common->getAdminNotificationEmails();
     foreach($adminEmails as $emailA ) {
        sendSmtpMail( $emailA, "Appel Demande", $message );
    } 

   /* $_SESSION['sentmail_txtt'] = '
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
