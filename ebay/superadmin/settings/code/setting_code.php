<?php
/*************************************************************************************************************
#Coder         : Keshav Sharma
#Description : This Code is used to manage Admin login settings
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting = new common();
$obj = new validation();
 
/* Get Current Date Time Stamp */ 
$currentTimestamp = getCurrentTimestamp();
 
if($_SERVER['REQUEST_METHOD']=='POST')
    {
		  $error='';
		  
		  $password_error = '';
		  
		  $obj->add_fields($fname, 'req', 'Please Enter First Name');
		  $obj->add_fields($lname, 'req', 'Please Enter Last Name');			  
 		  $obj->add_fields($phone, 'req', 'Please Enter Phone Number');	
 		  $obj->add_fields($address, 'req', 'Please Enter Address');
 		  $obj->add_fields($email, 'req', 'Please Enter Email Address');
 		  $error = $obj->validate();		   
		   
		   if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
     				$email_error = 'Please Enter valid Email';
   			} 
			
		   if(!preg_match("/^\(?(\d{3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})$/", $phone)) {
     				$phone_error = 'Please Enter valid Phone';
   			}
		  
		  if(isset($old_password) && $old_password!='') {
 			if($old_password != $password) {
 				$password_error1 = 'Old password is not correct';
 			}
			
		  }
		  
		if ($username=='' && $new_password!='') {
 				$username_error = 'Please Enter Username';
 		}	
		  
		  if (isset($new_password) && $new_password!='') {		    	
		  
			if($new_password != $new_password_again) {
 				$password_error2 = 'New password and Confirm Password doesn\'t match';
 			}
			
		  }	
		  if($error){
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>Please fill all required fields.</font>";
 		    }
			else if($phone_error) {
			
				$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$phone_error."</font>";
			}			
			else if($email_error) {
			
				$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$email_error."</font>";
			}			
			else if($password_error1) {
			
				$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$password_error1."</font>";
			}
			 else if($username_error) {
			
				$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$username_error."</font>";
			}
			else if($password_error2) {
			
				$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$password_error2."</font>";
			}

		  else

		    {
			
				$_SESSION['success_msg'] = 'Your information has been Successfully saved.';
				
				if(isset($new_password) && $new_password!='') {
				
					$dataArr = array('password'=>$new_password,'fname'=>$fname,'lname'=>$lname,'phone'=>$phone, 'address'=>$address,'email'=>$email,'creation_date'=>$currentTimestamp);
				
				} else {				
				
					$dataArr = array('fname'=>$fname,'lname'=>$lname,'phone'=>$phone, 'address'=>$address,'email'=>$email,'creation_date'=>$currentTimestamp);
				}	
	
				$update_site=$obj_setting->update(TBL_ADMIN, $dataArr, 'id = '.$_SESSION['LoggedInId']);
	
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/settings";</script>'; 
	
				exit;

			}

		}
		
		 #Code to Fetch seleted ID's data  

		 $fetchSetting 	= $obj_setting->read(TBL_ADMIN, 'id = '.$_SESSION['LoggedInId']);
		 $getSetting 	= $db->fetchNextObject($fetchSetting);
		 $fname 		= $getSetting->fname ;
		 $lname 		= $getSetting->lname ;
		 $phone			= $getSetting->phone ;
		 $address 		= $getSetting->address ;
		 $password 		= $getSetting->password ;		 
		 $phone 		= $getSetting->phone;
		 $email 		= $getSetting->email;	
		 $username 		= $getSetting->username;
			
?>