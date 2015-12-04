<?php
if(isset($_POST) && isset($_POST["add_to_sel"]))
{
	global $db;
	$common_obj = new common();

	// Your subject
	$subject= 'americancarcentrale -  info de contact reçu';
	// From
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'From: '.$_POST['name'].'<'.$_POST['email'].'>' . "\r\n";
	
	$message = 'vous avez re&ccedil;u une nouvelle information d\'un client.<br />
		 Nom : '.$_POST['name'] .'<br/>
		 Prenom : '.$_POST['prename'].'<br/>
		 Email: '.$_POST['email'].'<br/>
		 Num&egrave;ro de telephone: '.$_POST['phone'].'<br/>
		 Voiture recherch&egrave; : '. $car_details->title . ' ' .$car_details->Make . ' ' .$car_details->Model . ' ' .$car_details->Year . ' ' .$car_details->vin . ' <br/>';
	 //[car information, make , model , year , vin ]	 	  
	$sentmail = sendSmtpMail( SITE_ADMIN_EMAIL, $subject, $message );	
	//mail("govind@planetwebsolution.com", $subject, $message , $headers);
	//sendSmtpMail( "govind@planetwebsolution.com", $subject, $message );	
	/* code added by G. Totla  DTJ task # 2034, 2035
	 * Different case for different mail output.
	 * Oct 10, 2013
	 *  */

        $title = "americancarcentrale -  Merci pour nous avoir contacter ";
        $message = 'merci pour nous avoir contact&eacute; envers cette voiture <br />
                un repr&eacute;sentant va vous contacter tres bient&ocirc;t<br />
                 Nom : '.$_POST['name'].'<br/>
                 Prenom : '.$_POST['prename'].'<br/>
                 Email : '.$_POST['email'].'<br/>
                 Num&eacute;ro de telephone : '.$_POST['phone'];
	
	sendSmtpMail( $_POST['email'],$title , $message );		
	/* code added by G. Totla  DTJ task # 2034, 2035
	 * Oct 10, 2013
	 *  */

		
	$_SESSION['sentmail_txt'] = '
	<script src="'.DEFAULT_URL.'/js/jquery.msgBox.js" type="text/javascript"></script>
	<link href="'.DEFAULT_URL.'/css/msgBoxLight.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		(function($){
			$(document).ready(function(){
				$.msgBox({
					title:"Merci",
					content:"Nous avons ajout&egrave; votre demande avec succ&eacute;s",
					type:"info",
					timeOut:5000,
					opacity:0.6,
					autoClose:true
				});
			});
		})(jQuery); 
	</script>';
}
	?>