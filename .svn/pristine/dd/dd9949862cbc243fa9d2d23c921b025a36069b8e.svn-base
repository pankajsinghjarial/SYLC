<?php
/********************************************************************/
	#Coder:Kapil Verma
	include_once('../../conf/config.inc.php');
	include_once(LIST_ROOT_ADMIN."/login/code/login_code.php");
/********************************************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo SITE_TITLE_ADMIN; ?></title>
<link rel="stylesheet" href="<?php echo DEFAULT_ADMIN_URL; ?>/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
</head>
<?php flush(); ?>
<body id="login-bg" onload="setFocus()">
<!-- Start: login-holder -->
<div id="login-holder">
  <!-- start logo -->
  <div id="logo-login"> <a href="<?php echo DEFAULT_ADMIN_URL; ?>/index.php"><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/logo.png" width="156" height="40" alt="" /></a> </div>
  <!-- end logo -->
  <div class="clear"></div>
  <!--  start loginbox ................................................................................. -->
  <div id="loginbox" <?php if(isset($flag) && $flag=1) echo "style='display:none';" ?>>
    <!--  start login-inner -->
    <div id="login-inner">
      <?php if(isset($result)){ ?>
      <!--  start message-red -->
      <div id="message-red-login">
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td class="red-left-login" style="padding-right:15px;"><?php echo $result; ?></td>
            <td class="red-right-login" style="width:20px;vertical-align:middle;"><a class="close-red"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/action_delete.gif"   alt="" /></a></td>
          </tr>
        </table>
      </div>
      <!--  end message-red -->
      <?php } ?>    
      <form actoin="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginForm">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <th>Username</th>
            <td><input type="text" name="user_name" id="user_name"  class="login-inp" value="<?php if(isset($user_name1)) echo $user_name1; ?>" /></td>
          </tr>
          <tr>
            <th>Password</th>
            <td><input type="password" name="password" id="password" class="login-inp" value="<?php if(isset($password1)) echo $password1; ?>" /></td>
          </tr>
          <tr>
            <th></th>
            <td valign="top"><input type="checkbox" class="checkbox-size" id="remember" name="remember" value="1" />
              <label for="login-check">Remember me</label></td>
          </tr>
          <tr>
            <th></th>
            <td><input type="submit" name="submit" class="submit-login" value=""  /></td>
          </tr>
        </table>
        <input type="hidden" name="referer" id="referer" value="<?php echo $_SERVER['HTTP_REFERER'];?>" />
      </form>
    </div>
    <!--  end login-inner -->
    <div class="clear"></div>
    <a href="" class="forgot-pwd">Forgot Password?</a> </div>
  <!--  end loginbox -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <!--  start forgotbox ................................................................................... -->
  <div id="forgotbox" <?php if(isset($flag) && $flag=1) echo "style='display:block';"; ?>>    
    <div id="forgotbox-text">Please enter your email and we'll send your password.</div>
    <!--  start forgot-inner -->
    <div id="forgot-inner">
      <?php if(isset($errorForgot)){ ?>
      <!--  start message-red -->
      <div id="message-red-login">
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td class="red-left-login" style="padding-right: 20px;"><?php echo $errorForgot; ?></td>
            <td class="red-right-login" style="width:20px;vertical-align:middle;"><a class="close-red"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/action_delete.gif"   alt="" /></a></td>
          </tr>
        </table>
      </div>
      <!--  end message-red -->    
      <?php } ?>
      <?php if(isset($successForgot)){ ?>
      <!--  start message-green -->
        <div id="message-green-login">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="green-left-login" style="padding-right: 20px;"><?php echo $successForgot; ?></td>
                    <td class="green-right-login" style="width:20px;vertical-align:middle;"><a class="close-green"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/action_delete.gif"   alt="" /></a></td>
                </tr>
            </table>
        </div>
        <!--  end message-green -->
        <?php } ?>
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <th>Email address:</th>
          <td><input type="text" name="email" id="email" class="login-inp" /></td>
        </tr>
        <tr>
          <th> </th>
          <td><input type="submit" class="submit-login" value="" name="forgot_submit" /></td>
        </tr>
      </table>
    </div>
    <!--  end forgot-inner -->
    <div class="clear"></div>
    <a href="" class="back-login">Back to login</a> </div>
  </form>
  <!--  end forgotbox -->
</div>
<!-- End: login-holder -->
<!-- Custom jquery scripts -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/custom_jquery.js" type="text/javascript"></script>
<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});

function setFocus(){
	document.loginForm.user_name.focus();
}
</script>

</body>
</html>