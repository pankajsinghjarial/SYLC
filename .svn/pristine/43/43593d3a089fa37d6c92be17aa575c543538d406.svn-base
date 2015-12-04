<?php
require_once '../conf/config.inc.php';
	//require_once "../config/connection.php";

	

require 'config/database.php';



if(!isset($_SESSION['gold_admin'])) {

	//header('Location: login.php');
	?><script language="javascript">location.href='login.php'</script><?php

}



$flag = 0;

$msg = '';

if($_POST){	

if(isset($_POST['new_pass'])){



	$new_pass = $_POST['new_pass'];

	$old_pass = $_POST['old_pass'];

	$new_pass_conf = $_POST['new_pass_conf'];	
	$username1 = $_POST['admin_username'];
	$email1 = $_POST['admin_email'];
	

	//$username = $_SESSION['gold_admin'];

	$sel_query2="Select * from users WHERE role='admin' and id = '2'";
	
	$rs_sel2=mysql_query($sel_query2) or die(mysql_error());
	while($arr_sel2=mysql_fetch_array($rs_sel2))
	{
	
	$username = $arr_sel2['username'];
	$adminemail = $arr_sel2['email'];
	}
		
	//if($username == ''){
		

	//}

	if($new_pass!='' && $new_pass_conf !=''){

	if(!strcmp($new_pass,$new_pass_conf)){

		  //$result = mysql_query(sprintf("SELECT * FROM users WHERE username = '%s' AND password = MD5('%s')", $username, $old_pass));
		  $result = mysql_query(sprintf("SELECT * FROM users WHERE username = '%s' AND password = MD5('%s')", $username, $old_pass));

		  if(mysql_num_rows($result)>0)	{

		  		  $check_old_password = mysql_fetch_array($result);

				  //echo  md5($old_pass);

				  //exit;

			//print_r($check_old_password);

				  if($check_old_password['password'] == md5($old_pass))

				  {				 
//echo  md5($new_pass);die;
				
				   $user = mysql_query("UPDATE users SET username = '$username1',email = '$email1',password = MD5('$new_pass') WHERE id = 2 ");	

				   
				   
				   $flag = 1;

				   $msg =  'Information updated successfully.';
				   
				   
				  	}			  

				  }else{
				  	
				  	

				  $flag = 2;

				  $msg = 'All fields must be valid.';

				  }
				  
				  
				  

		  }	

		  else{

		  $flag = 2;

		  $msg = "All fields must be valid.";

		  }

		 }else{
		 	
		 	
		 	if($username1 != '' && filter_var($email1, FILTER_VALIDATE_EMAIL)){
		 		
		 		$user = mysql_query("UPDATE users SET username = '$username1',email = '$email1' WHERE id = 2 ");
		 		
		 		$flag = 1;
		 		
		 		$msg =  'Information updated successfully.';
		 		
		 	}else{
		 			$flag = 2;
		 			 
		 			$msg =  'All fields must be valid.';
		 			
		 	}
		 	
		 	

		//$flag = 2;

		//$msg = "Vous avez entr&eacute; un mauvais code dans le champ Confirmation.";

		 
		  
	
		 }

		} else{

		  $flag = 2;

		  $msg = "All fields are required.";

		 }

		 }

	

	

	//$tid = $_GET['tid'];

	/*$sel_query="Select * from leads where id='".$tid."'";

	$rs_sel=mysql_query($sel_query) or die(mysql_error());	

	$arr_sel=mysql_fetch_array($rs_sel);*/

	



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link href="<?php echo DEFAULT_ADMIN_URL?>/images/favicon.ico" rel="shortcut icon" type="image/ico" >  
<?php /*?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><?php */ ?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<title>Syl Corporation</title>

<link href="../stylesheets/admin.css" media="screen" rel="stylesheet" type="text/css" />

<link type="text/css" href="../stylesheets/smoothness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />

<style type="text/css">

<!--

body {

	background-image: url(images/bx-bg.jpg);

}

.style7 {

	font-weight: normal;

	/*font-style: italic;*/

	color: #A8C076;

	font-size: 16px;

	font-family:Arial, Helvetica, sans-serif;

}

.style9 {font-size: 16px; font-weight: bold; color: #A8C076; }

.style12 {color: #A8C076}

.submit {

  background: url('../images/track_bg.png') no-repeat;

  width: 78px; height: 27px;

  border: 0;

  color: #fff;

  cursor: pointer;

  text-shadow: #63411e 0 1px 0;

  font: bold 12px "Helvetica Neue", Helvetica, Arial, sans-serif;

  line-height: 5px;

  margin: 0 0 0 155px;

}

.submit:hover {

  background-position: 0 -27px;

}

.submit:active {

  background-position: 0 -54px;

}

-->

</style>

</head>

<body>

<div id="wrapper">

  <div id="header">

    <h1>Admin panel configuration</h1>

  </div>

 <?php  include_once LIST_ROOT.'/admin/includes/tabs.php';?>

  <div style="margin:auto; width:500px; height:auto; padding:20px 0 0 0;">

    <?php if($flag == 1){?>

    <div id="div_success" style="width:100%; height:20px; color:#000000; background-color:#00FF99; text-align:center;"> <?php echo $msg; ?> </div>

    <?php } else if($flag == 2){?>

    <div id="div_error" style="width:100%; height:20px; color:#000000; background-color:#FF0000; text-align:center;">      <?php echo $msg; ?>

    </div>

    <?php }?>

    <table width="100%" border="0" bgcolor="#fafafa" align="center" cellpadding="0" cellspacing="0" >

      <tr>

        <td align="center" bgcolor="#747474" class="style7 style12" style="padding:10px 0;"><strong>Change password</strong></font></td>

      </tr>

      <tr>

        <td><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">

            <tr>

              <td><form method="post" action="change_password.php">

                  <table width="90%" border="0" cellspacing="2" cellpadding="2">
                  
                  

                 <tr>

                      <td width="40%"><table width="100%" border="0" cellspacing="2" cellpadding="2">

                          <tr>

                            <td width="48%" height="31" align="right"><strong>Username</strong>&nbsp;</td>

                            <td width="5%"><strong>:</strong></td>
<?php $sel_query2="Select * from users WHERE role='admin' and id = '2'";
	
	$rs_sel2=mysql_query($sel_query2) or die(mysql_error());
	while($arr_sel2=mysql_fetch_array($rs_sel2))
	{
	$username = $arr_sel2['username'];
	$adminemail = $arr_sel2['email'];
	}?>
                            
                            <td width="47%"><input type="text" name="admin_username" id="admin_username" value="<?php echo $username;?>"/>

                            </td>

                          </tr>

                        </table></td>

                    </tr>
                    
                    
                    <tr>

                      <td width="40%"><table width="100%" border="0" cellspacing="2" cellpadding="2">

                          <tr>

                            <td width="48%" height="31" align="right"><strong>Email</strong>&nbsp;</td>

                            <td width="5%"><strong>:</strong></td>
                            
                            <td width="47%"><input type="text" name="admin_email" id="admin_email" value="<?php echo $adminemail;?>"/>

                            </td>

                          </tr>

                        </table></td>

                    </tr>
                    
                    
                    <tr>

                      <td width="40%"><table width="100%" border="0" cellspacing="2" cellpadding="2">

                          <tr>

                            <td width="48%" height="31" align="right"><strong>Old Password</strong>&nbsp;</td>

                            <td width="5%"><strong>:</strong></td>

                            <td width="47%"><input type="password" name="old_pass" id="old_pass" value=""/>

                            </td>

                          </tr>

                        </table></td>

                    </tr>
                    
                    

                    <tr>

                      <td width="40%"><table width="100%" border="0" cellspacing="2" cellpadding="2">

                          <tr>

                            <td width="48%" height="31" align="right" valign="middle"><strong>New password</strong>&nbsp;</td>

                            <td width="5%"><strong>:</strong></td>

                            <td width="47%"><input type="password" name="new_pass" id="new_pass" value=""/>

                            </td>

                          </tr>

                        </table></td>

                    </tr>

					 <tr>

                      <td width="40%"><table width="100%" border="0" cellspacing="2" cellpadding="2">

                          <tr>

                            <td width="48%" height="31" align="right" valign="middle"><strong>Confirm New Password</strong>&nbsp;</td>

                            <td width="5%"><strong>:</strong></td>

                            <td width="47%"><input type="password" name="new_pass_conf" id="new_pass_conf" value=""/>

                            </td>

                          </tr>

                        </table></td>

                    </tr>
                    
                     

                    <tr>

                      <td  align="center" style="padding-left:20px;"><input class="submit" type="submit" name="submit" value="Submit"/>

                      </td>

                    </tr>

                  </table>

                </form></td>

            </tr>

          </table></td>

      </tr>

      <tr>

        <td>&nbsp;</td>

      </tr>

    </table>

  </div>

</div>

<p class="head-2">&nbsp;</p>

</body>

</html>

