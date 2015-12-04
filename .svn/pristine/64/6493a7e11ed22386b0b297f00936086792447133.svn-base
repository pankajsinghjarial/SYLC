<?php 
extract($_POST);
extract($_GET);
$common = new common();
$emailQuery = $common->CustomQuery("select * from admins where id = 1");
$toemail = mysql_fetch_object($emailQuery);
if($submit_form!='' && $submit_form == "submitted" && $website == "")
  {
  $obj = new validation();
	  		
          $error='';	  
		  $obj->add_fields($fname, 'req', 'S\'il vous plaît Entrez le Nom');		  		  
		  $obj->add_fields($email, 'req', "S'il vous plaît Entrez l'adresse e-mail");
          $obj->add_fields($email, 'email', "S'il vous plaît Entrez l'adresse e-mail valide");
		   $obj->add_fields($phone, 'req', "S'il vous plaît Entrez numéro de téléphone");
		  $obj->add_fields($phone, 'phone,us', "S'il vous plaît Entrez votre numéro de téléphone valide");
		  /*if($phone != ''){
          	$obj->add_fields($phone, 'phone,us', "S'il vous plaît Entrez votre numéro de téléphone valide");
		  }*/
		  $obj->add_fields($massage, 'req', "S'il vous plaît Entrez votre message");		  
                  $obj->add_fields($massage, 'min=2', "Message doit être d'au moins 2 caractères");
		  
		  
		// $obj->add_fields($_POST['6_letters_code'], 'req', 'Please Enter Captcha Code');	
          //$obj->add_fields($message, 'max=100', 'Message should not be more than 100 characters long');		  
		  
		  $error = $obj->validate();
		  if($error){
		  	
			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
                        $_SESSION['msg'] = $errorMsg;
		    }   
          else
		   {	
		   $content = '<table width="75%" border="0" cellpadding="2" cellspacing="0">
			
			<tr>
			<td>Adresse Email:</td>
			<td>'.$email.'</td>
			</tr>
			
			<tr>
			<td>nom:</td>
			<td>'.$fname.' '.$lname.'</td>
			</tr>
			
			<tr>
			<td>téléphone:</td>
			<td>'.$phone.'</td>
			</tr>                        
          
			<tr>
			<td>un message:</td>
			<td>'.$massage.'</td>
			</tr>			
			</table>';
			
//		echo $content;exit;
				
				$to = $toemail->email;   
				$subject = "Contactez-nous"; //send my mail
				                              
                $headers  =  "From:".$email."\r\n".'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$time= time();
				$currentTimestamp   = getCurrentTimestamp();
					//if(mail($to, $subject, $content, $headers) ){
					sendSmtpMail($to, $subject, $content);
					sendSmtpMail($email, 'Merci', 'Votre demande de contact a été reçu avec succès.');
					$dataArray = array('name'=>$fname." ".$lname,'email'=>$email,'phone'=>$phone,'message'=>$massage,'type'=>1,'mail_date'=>$currentTimestamp);
		     	    $save = $common->save("contact",$dataArray)	;
					$send=1;
					$_SESSION['success'] = "ok";
					echo "<script>location.href='".DEFAULT_URL."/contacts';</script>";exit;
				
				
		   }
		   unset($obj);
  }	

  else if($website != ""){
  	$errorMsg= "<font color='#FF0000' family='verdana' size=2>Please provide all fields value.</font>";
  	$_SESSION['msg'] = $errorMsg;
  }

?>