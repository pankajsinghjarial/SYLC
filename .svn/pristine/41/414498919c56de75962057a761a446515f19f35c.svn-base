<?php
class LoginSystem
{
	var	$db_host,
		$db_name,
		$db_user,
		$db_password,
		$connection,
		$username,
		$password;

	/**	 * Constructor	 */
	function LoginSystem(){}
	
	/** * Check if the admin user is logged in  @return true or false */
	function isLoggedIn()
	{
		if($_SESSION['LoggedIn']!=1)
		  return false;
		else
		  return true;  
		
	}

        /** * Check if the user is logged in  @return true or false */
	function isUserLoggedIn()
	{
		if($_SESSION['UserLoggedIn']!=1)
		  return false;
		else
		  return true;

	}
	
	/** * Check username and password against DB *
	 * @return true/false */
	function doLogin($username, $password)
	{
		
		$this->username = $username;
		$this->password = $password;
	
			// check db for user and pass here.
		  $sql = "SELECT * FROM admins WHERE username = '".$this->clean($this->username)."' and password = '".$this->clean($this->password)."'";
		
			$result = mysql_query($sql) or die(mysql_error());
			
                        
			// If no user/password combo exists return false
			if(mysql_num_rows($result) != 1)
			{
				
				$this->disconnect();
				return false;
			}
			else // matching login ok
			{
				$row = mysql_fetch_array($result);
				@session_start();
				// more secure to regenerate a new id.
				@session_regenerate_id();
				
				//set session vars up
				$_SESSION['LoggedIn'] = true;
				$_SESSION['email'] = $row['email'];
				$_SESSION['userName'] = $row['fname']." ".$row['lname'];
				$_SESSION['TYPE'] = 'SUPER_ADMIN';
                                $_SESSION['LoggedInId'] = $row['id'];
				return true;                                
			}
		

}

	/** * Check username and password against DB *
	 * @return true/false */
	function doUserLogin($email, $password)
	{

		$this->email = $email;
		$this->password = $password;

			// check db for user and pass here.
		  $sql = "SELECT * FROM users WHERE email = '".$this->clean($this->email)."' and password = '".$this->clean($this->password)."' AND confirmed = 1";

			$result = mysql_query($sql) or die(mysql_error());


			// If no user/password combo exists return false
			if(mysql_num_rows($result) != 1)
			{

				$this->disconnect();
				return false;
			}
			else // matching login ok
			{
				$row = mysql_fetch_array($result);
				@session_start();
				// more secure to regenerate a new id.
				@session_regenerate_id();

				//set session vars up
				$_SESSION['UserLoggedIn'] = true;
                                $_SESSION['UserID'] = $row['id'];
				$_SESSION['Useremail'] = $row['email'];
                                //$_SESSION['Username'] = $row['username'];
				$_SESSION['Name'] = $row['fname']." ".$row['lname'];
				$_SESSION['USER_TYPE'] = 'USER';
				return true;
			}


}
	
	/**	 * Destroy session data/Logout.	 */
	function logout()
	{
		@session_start();
		$_SESSION['LoggedIn'] = false;
		unset($_SESSION['LoggedIn']);
		unset($_SESSION['userName']);
		unset($_SESSION['email']);
                unset($_SESSION['TYPE']);
		@session_destroy();
	}


        /**	 * Destroy user session data/Logout.	 */
	function userLogout()
	{
		@session_start();
		$_SESSION['UserLoggedIn'] = false;
		unset($_SESSION['UserLoggedIn']);
                unset($_SESSION['Useremail']);
		unset($_SESSION['Username']);
		unset($_SESSION['Name']);
                unset($_SESSION['USER_TYPE']);
		@session_destroy();
	}



	
	/**	 * Connect to the Database * 
	 * @return true/false	 */
	function connect()
	{
		$this->connection = mysql_connect($this->db_host, $this->db_user, $this->db_password) 
														or die("Unable to connect to MySQL");
		
		mysql_select_db($this->db_name, $this->connection) or die("Unable to select DB!");
		
		// Valid connection object? everything ok?
		if($this->connection)
		{
			return true;
		}
		else return false;
	}
	
	/** * Disconnect from the db */
	function disconnect()
	{
		mysql_close($this->connection);
	}
	
	/**	 * Cleans a string for input into a MySQL Database.
	 * Gets rid of unwanted characters/SQL injection etc. * 
	 * @return string */
	function clean($str)
	{
		// Only remove slashes if it's already been slashed by PHP
		if(get_magic_quotes_gpc())
		{
			$str = stripslashes($str);
		}
		// Let MySQL remove nasty characters.
		$str = mysql_real_escape_string($str);
		
		return $str;
	}
	
	/** * create a random password
	 * @param	int $length - length of the returned password
	 * @return	string - password * */
	function randomPassword($length = 8)
	{
		$pass = "";
		
		// possible password chars.
		$chars = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J",
			   "k","K","l","L","m","M","n","N","o","O","p","P","q","Q","r","R","s","S","t","T",
			   "u","U","v","V","w","W","x","X","y","Y","z","Z","1","2","3","4","5","6","7","8","9");
			   
		for($i=0 ; $i < $length ; $i++)
		{
			$pass .= $chars[mt_rand(0, count($chars) -1)];
		}
		
		return $pass;
	}
	
	/** * Check For Super Admin, For Additional privilege */
	function accessDenied()
	{
		@session_start();
		if(!$_SESSION['TYPE'] == 'SUPER_ADMIN')
		 {   
			 echo '<div style=" font-family:Trajan Pro; font-size:14px; border:#FF0000 dotted 1px; color:#FF0000; margin:200px 200px 200px 300px; padding:50px 50px 50px 50px;">You Do not have Permission  to Access This Page
<div style="float:right;"><a href="javascript:history.go(-1);">Back To Search Results</a></div>
</div>'; 
			 exit; 
		  }
	
	}
	

}
?>