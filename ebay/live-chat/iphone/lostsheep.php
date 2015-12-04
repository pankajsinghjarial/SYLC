<?php
//===========================================================================
//* --    ~~                Crafty Syntax Live Help                ~~    -- *
//===========================================================================
//           URL:   http://www.craftysyntax.com/    EMAIL: livehelp@craftysyntax.com
//         Copyright (C) 2003-2012 Eric Gerdes   (http://www.craftysyntax.com )
// ----------------------------------------------------------------------------
// Please check http://www.craftysyntax.com/ or REGISTER your program for updates
// --------------------------------------------------------------------------
// NOTICE: Do NOT remove the copyright and/or license information any files. 
//         doing so will automatically terminate your rights to use program.
//         If you change the program you MUST clause your changes and note
//         that the original program is Crafty Syntax Live help or you will 
//         also be terminating your rights to use program and any segment 
//         of it.        
// --------------------------------------------------------------------------
// LICENSE:
//     This program is free software; you can redistribute it and/or
//     modify it under the terms of the GNU General Public License
//     as published by the Free Software Foundation; 
//     This program is distributed in the hope that it will be useful,
//     but WITHOUT ANY WARRANTY; without even the implied warranty of
//     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//     GNU General Public License for more details.
//
//     You should have received a copy of the GNU General Public License
//     along with this program in a file named LICENSE.txt .
//===========================================================================
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
 require_once("..\admin_common.php");
else
 require_once("../admin_common.php");

$message = "";
if(!(isset($UNTRUSTED['proccess']))){ $UNTRUSTED['proccess'] = "no"; }
if(!(isset($UNTRUSTED['email']))){ $UNTRUSTED['email'] = ""; }
if($UNTRUSTED['proccess'] == "yes"){   
  $query = "SELECT * 
            FROM livehelp_users 
            WHERE email='".filter_sql($UNTRUSTED['email'])."'
             AND isoperator='Y'";
  $data = $mydatabase->query($query);
  if( $data->numrows() == 0){
  if(!($serversession))
      $mydatabase->close_connect();
      $message = "<font color=990000><b>" . $lang['txt97'] . " </b></font> <font color=000077> ".filter_html($UNTRUSTED['email'])." </font><br>";
  } else {   
        $message .= "\n<br>--------------------------------<br> ";
        $message .= "A request was made to reset the password <br> ";
        $message .= " for the following accounts.. You will need to ";
        $message .= " visit the urls below in order to reset the passwords: <br> ";
        $message .= "--------------------------------<br> ";  	   
      while($row = $data->fetchRow(DB_FETCHMODE_ASSOC)){
        $emailadd = $row['email'];
        $message .= "\n<br>";
        $message .= "username:  " . $row['username'] . " <br><a href=";
        $message .= $CSLH_Config['webpath'] . "lostsheep.php?changepass=".$row['password'] . "&username=".$row['username'];
        $message .= ">\n";
        $message .= $CSLH_Config['webpath'] . "lostsheep.php?changepass=".$row['password'] . "&username=".$row['username'];
        $message .= "</a>\n";
      }
     // to avoid relay errors make this lostpasswords@currentdomain.com
     if(!(empty($_SERVER['HTTP_HOST']))){
        $host = str_replace("www.","",$_SERVER['HTTP_HOST']);
        $contactemail  = "CSLH@" . $host;
      } else {
      	$contactemail  = $UNTRUSTED['email'];
      }  
         
     if (!(send_message("CSLH", $contactemail, "Customer", $UNTRUSTED['email'], "CSLH Lost Password", $message, "text/html", $lang['charset'], false))) {
        send_message("CSLH", $contactemail, "Customer", $UNTRUSTED['email'], "CSLH Lost Password", $message, "text/html", $lang['charset'], true);
     }   
                
     $message = "<br><font color=007700>Sent   to ".filter_html($UNTRUSTED['email'])." with log in information.</font>  <br>";

   }
}
?>

<html>
<head>
<title>Lost password</title>
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> 
<link type="text/css" rel="stylesheet" href="css/base.css" />
</head>
<body>
<DIV STYLE="width:310px;">
	
<img src=images/top.png width=310 height=47><br>
 
<div class="login_form">
 
<DIV style="float:right;"> Version <?php echo $CSLH_Config['version']; ?> </DIV>
<br/> 

 
<form action=lostsheep.php METHOD=post>
 <?php echo $message; ?>
 <?php if(!(empty($UNTRUSTED['changeit']))){
 	  $sql = "SELECT * FROM livehelp_users WHERE password='".filter_sql($UNTRUSTED['changeit'])."' AND user_id='".intval($UNTRUSTED['user_id'])."'";
 	  $data = $mydatabase->query($sql);
    if( $data->numrows() == 0){
        print "<font color=#990000>Invalid Input/Link</font>";
   	} else { 	
 	      $sql = "UPDATE livehelp_users SET password='".filter_sql(md5($UNTRUSTED['newpass']))."' WHERE user_id='".intval($UNTRUSTED['user_id'])."'";
 	      $mydatabase->query($sql);

 	      print "<br><br><br><b>Password has been changed..</b><br><br> <a href=login.php>Log in</a><br><br><br><br><br><br><br><br>";
 	  }
   
   }
   if(!(empty($UNTRUSTED['changepass']))){ 
 	
 	  $sql = "SELECT * FROM livehelp_users WHERE password='".filter_sql($UNTRUSTED['changepass'])."' AND username='".filter_sql($UNTRUSTED['username'])."'";
 	  $data = $mydatabase->query($sql);
    if( $data->numrows() == 0){
        print "<font color=#990000>Invalid Input/Link</font>";
   	} else {
   		 $row = $data->fetchRow(DB_FETCHMODE_ASSOC);
   		 $user_id = $row['user_id'];
    
 		  ?>
 		  <input type=hidden name=changeit value="<?php echo $UNTRUSTED['changepass']; ?>">
<table  width=250>
<tr><td nowrap=nowrap><b>Re-set password for:</b></td><td><b><?php echo $UNTRUSTED['username']; ?></b><input type=hidden name=user_id value=<?php echo $user_id; ?>></td></tr>
<tr><td nowrap=nowrap><b>New Password:</b></td><td><input type=password name=newpass size=20></td></tr>
<tr><td colspan=2 align=center><input type=submit value=change password></td></tr></table><br><br><br>
 		  <?php
   	}
 	?>
 
<?php } else { ?> 

 <?php if(empty($UNTRUSTED['changeit'])){ ?>
<input type=hidden name=proccess value=yes>
<table   width=250>
<tr><td colspan=2><?php echo $lang['txt167']; ?></td></tr>
<tr><td nowrap=nowrap><b>e-mail:</b></td><td><input type=text name=email size=20></td></tr>
<tr><td colspan=2 align=center><input type=submit value=send></td></tr></table>
<?php }} ?> 
</form>
 
 </form><br/>