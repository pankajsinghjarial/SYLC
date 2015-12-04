<?php

	extract($_GET);
 	extract($_POST); 
    extract($_COOKIE);
	# ----------------------------------------------------------------------------------------------------

	if((isset($submit))){
		if($user_name!='' &&  $password!=''){
			$objLogin = new LoginSystem();
			if($objLogin->doLogin($user_name, $password)){
                            if(isset($remember) && $remember == '1'){
                                setcookie ('user_name1',$user_name , time()+24*60*60*30);
                                setcookie ('password1',$password , time()+24*60*60*30);
                            }
                                
								if(isset($referer) and $referer!=''){

									if(strpos($referer,'logout')!==false){
										redirectUrl(DEFAULT_ADMIN_URL.'/dashboard/index.php');
									}else{

										if(strpos($referer,'login/login.php')!==false){
											redirectUrl(DEFAULT_ADMIN_URL.'/dashboard/index.php');
										}else{
											redirectUrl($referer);
										}
									}

								}else{
									redirectUrl(DEFAULT_ADMIN_URL.'/dashboard/index.php');
								}
								exit;
                           }
						   else
						   {
								$result = "Invalid username or password";
							}
		 }
		 else
		 {
							    $result = "Please fill all the required fields.";

		 }
                
		 unset($objLogin);
     }
	 else if(isset($forgot_submit))
	 {           
               $objValidation = new validation();               
               $objValidation->add_fields($email, 'req', 'Please Enter Email Address');               
               $error = $objValidation->validate();
               if($error){
                   $errorForgot = $error;
                   $flag = 1;
                   unset($objValidation);
               }else{
                   $objLogin = new LoginSystem();
                   $objCommon = new common();
                   $result_forgot = $objCommon->read(TBL_ADMIN, "email='".$objLogin->clean($email)."'");
                   $row_forgot = $db->fetchNextObject($result_forgot);
                   //pr($row_forgot);exit;
                   if($row_forgot->email == $email && isset($row_forgot->email)){                       
                       $message = '
									<p>Your Login Details are as follows :</p>
									<table width="75%" border="0" cellpadding="2" cellspacing="0">
									<tr>
									<td>Username:</td>
									<td>'.$row_forgot->username.'</td>
									</tr>
									<tr>
									<td>Password:</td>
									<td>'.$row_forgot->password.'</td>
									</tr>
									</table>';
			
                       $subject 		= "Login Information For Take My Registartion"; //send my mail
                       $to				= $email;               
                       $from 			= 'admin@takemyregistration.com';                  
                       $headers  		.=  "From:".$from."\r\n".'MIME-Version: 1.0' . "\r\n";
                       $headers 		.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					   
                       if(mail($to, $subject, $message, $headers)){
                           $successForgot = "Email has been Sent on your email address.";
                           $flag = 1;
                       }
                   }
				   else
				   {
                       $errorForgot = "Entered Email Address Doesn't Exist";
                       $flag = 1;
                   }               
               }
       }
           
?>