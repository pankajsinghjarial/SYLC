<?php



require 'config/database.php';


if(!empty($_POST)) {

   // User information

   $username = mysql_real_escape_string($_POST['username']);

   $password = mysql_real_escape_string($_POST['password']);

   
   // Exists?

   $user = mysql_query(sprintf("SELECT * FROM users WHERE username = '%s' AND password = MD5('%s') AND role='admin'", $username, $password));


   if (mysql_num_rows($user) > 0) {

      $_SESSION['gold_admin'] = true;
      $useraccess =  mysql_fetch_array($user); 
      $_SESSION['gold_admin_access'] = $useraccess['access'];
      $_SESSION['gold_admin_user'] = $useraccess['username'];
      header('Location: dashboard.php');

   } else {

      $error = true;

   }

} else if (isset($_SESSION['gold_admin'])) {

   header('Location: dashboard.php');

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang='en' xml:lang='en' xmlns='http://www.w3.org/1999/xhtml'>

   <head>

      <meta content='text/html; charset=utf-8' http-equiv='Content-type' />

      <title></title>

      <link href="../stylesheets/admin_login.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="./images/favicon.ico" rel="shortcut icon">
   </head>

   <body>

      

      <div id="wrapper">         

         <form action="login.php" method="post">

            <?php if(isset($error)): ?>

               <div class="error">

                  Please enter a valid username and password.

               </div>

            <?php endif; ?>

            

            <p>

               <label for="username">Username</label> <input type="text" name="username" value="" id="username" />

            </p>

            <p>

               <label for="password">Password</label> <input type="password" name="password" value="" id="password" />

            </p>

            

            <p><input type="submit" name="submit" class="submit" value="Login" /></p>

         </form>

      </div>

   </body>

</html>