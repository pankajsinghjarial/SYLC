<?php

	extract($_GET);

 	extract($_POST); 

	# ----------------------------------------------------------------------------------------------------

	if((isset($submit) || isset($submit_x)) && ($submit != "" || $submit_x!='')){



		if($user_name!='' &&  $password!=''){

			

			$objLogin = new LoginSystem();

			

			

			if($objLogin->doLogin($user_name, $password))

			{

				//echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/home/home.php";</script>';
                                redirectUrl(DEFAULT_ADMIN_URL.'/home/home.php');

				exit;

			}

			else{

				$result = "Invalid username or password";

			}

		}else{

			$result = "please fill all the required fields.";

		}

		

}

				

?>