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
		   
			
			      $massage =  htmlspecialchars_decode(htmlspecialchars($massage, ENT_NOQUOTES, "UTF-8"));
			      $massage = str_replace("\'", "'", $massage);
			      
			      $heading = $subject = "Contactez-nous reuest"; //send my mail
			      
			      
			      // Send Admin Notifications
			      
			      $subHeading = 'Les détails sont comme ci-dessous';
			      $emailData['Nom'] =  $fname;
			      $emailData['Prénom'] =  $lname;
			      $emailData['Adresse Email'] =  $email;
			      $emailData['téléphone'] =  $phone;
			      $emailData['Un message'] =  $massage;
			      $emailData["Vous avez reçu un e-mail à partir d'ici"] =  DEFAULT_URL."/contacts";
			      
			      $message = emailContentsWrapper($emailData,$heading,$subHeading);
			      
			      $adminEmails = $common->getAdminNotificationEmails();
			      foreach($adminEmails as $emaiA ) {
				  $sentmail = sendSmtpMail( $emaiA, $subject,  $message );
			      }
					  
			      
			      //Send confirmation to User
			      $heading = 'Merci';
			      $subHeading = 'Votre demande de contact a été reçu avec succès.';
			      $footerHeading = 'Merci encore<br/>Americamcarcentrale.com';
			      
			      $message = emailContentsWrapper(null, $heading, $subHeading, $footerHeading);
			      
			      sendSmtpMail($_POST['email'], 'Merci', $message);
	
	
			      // Save request for admin leads
			      $time= time();
			      $currentTimestamp   = getCurrentTimestamp();
					
			      $dataArray = array('name'=>$fname." ".$lname,'email'=>$email,'phone'=>$phone,'message'=>$massage,'type'=>1,'mail_date'=>$currentTimestamp);
			      $save = $common->save("contact",$dataArray)	;
			      $send=1;
			      $_SESSION['success'] = "ok";
			      echo "<script>location.href='".DEFAULT_URL."/thank_you.php';</script>";exit;
				
				
		   }
		   unset($obj);
  }	

  else if($website != ""){
  	$errorMsg= "<font color='#FF0000' family='verdana' size=2>Please provide all fields value.</font>";
  	$_SESSION['msg'] = $errorMsg;
  }

?>