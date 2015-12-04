<?php

/*************************************************************************************************************

#Coder         : Kapil Verma

#Description : This Code is used to manage Admin login settings 


*************************************************************************************************************/



extract($_GET);

extract($_POST);



$obj_setting = new common();

 $obj = new validation();

 /* Get Current Date Time Stamp */



 $currentTimestamp = getCurrentTimestamp();

 

    		

	 

	 if(isset($submit1) && $submit1 != "" && $_SERVER['REQUEST_METHOD']=='POST')

	     {

		  $error='';

		  $obj->add_fields($fname, 'req', 'Please Enter First Name');

		  $obj->add_fields($lname, 'req', 'Please Enter Last Name');			  

		  $obj->add_fields($phone, 'req', 'Please Enter Phone Number');	
		  
		   $obj->add_fields($address, 'req', 'Please Enter Address');
		   
		   $obj->add_fields($email, 'req', 'Please Enter Email Address');

		  $error = $obj->validate();

		  if($error){

			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }

		  else

		    {	 

		  	$dataArr = array('fname'=>$fname,'lname'=>$lname,'phone'=>$phone, 'address'=>$address,'email'=>$email,'creation_date'=>$currentTimestamp);

		    $update_site=$obj_setting->update(TBL_ADMIN, $dataArr, 'id = '.$_SESSION['LoggedInId']);

			$_SESSION['msg_main']='Account Information Successfully updated';
			
			echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/user_setting/settings.php";</script>'; 

			exit;

			}

		}

	 

	 if(isset($submit2) && $submit2 != "" && $_SERVER['REQUEST_METHOD']=='POST')

	     {

		  if(trim($username)=='' || trim($new_password)=='' || trim($old_password)=='' || trim($new_password_again)=='')
		  {
			    $_SESSION['msg']='Please fill all required fields(*)';

				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/user_setting/settings.php";</script>'; 

				exit;
		  }
		  elseif($old_password!=$password)

			   {

			    $_SESSION['msg']='Old password is not correct';

				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/user_setting/settings.php";</script>'; 

				exit;

			   }

			else if($new_password!=$new_password_again)

			  {

				$_SESSION['msg']='New password doesn\'t not match';

				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/user_setting/settings.php";</script>'; 

				exit;

			  }

			else

			  {     

			   $_SESSION['msg']='Login Information Successfully updated';

			   $dataArr = array('username'=>$username ,'password'=>$new_password ,'creation_date'=>$currentTimestamp );

		       $update_site=$obj_setting->update(TBL_ADMIN, $dataArr, 'id = '.$_SESSION['LoggedInId']);

			   echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/user_setting/settings.php";</script>'; 

			   exit;

			  } 

		}

		     

			 #Code to Fetch seleted ID's data  

		     $fetchSetting = $obj_setting->read(TBL_ADMIN, 'id = '.$_SESSION['LoggedInId']);

			 $getSetting = $db->fetchNextObject($fetchSetting);

			$fname = $getSetting->fname ;

			 $lname = $getSetting->lname ;

			 $phone = $getSetting->phone ;
			 
			 $address = $getSetting->address ;

			 $password = $getSetting->password ;		 
			 
			 $phone = $getSetting->phone;
			 
			 $email = $getSetting->email;	
                         
             $username = $getSetting->username;
			
?>