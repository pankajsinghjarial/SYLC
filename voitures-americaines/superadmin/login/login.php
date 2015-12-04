<?php
/********************************************************************/
	#Coder:Kapil Verma
	include_once('../../conf_superadmin/config.inc.php');
	include_once(LIST_ROOT_ADMIN."/login/code/login_code.php");
/********************************************************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_TITLE_ADMIN; ?></title>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo DEFAULT_ADMIN_URL; ?>/css/style.css" />
<link rel="Stylesheet" type="text/css" href="<?php echo DEFAULT_ADMIN_URL; ?>/css/smoothness/jquery-ui-1.7.1.custom.css"  />
</head>
</head>
<body>
<div  id="login_container">
  <div  id="header">
    <div id="logo" style="width:511px; height:106px; margin:20px 18px 18px 58px;background:url(../images/logo.jpg) no-repeat">
    </div>
  </div>
  <!-- end header -->
  <div id="login" class="section">
    <?php if($result!=''){ ?>
    <div id="fail" class="info_div"><span class="ico_cancel">
      <?= $result ;?>
      </span></div>
    <? }?>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" name="login_form" id="login_form" >
      <label><strong>Username</strong></label>
      <input type="text" name="user_name" id="user_name"  size="28" class="input"/>
      <br />
      <label><strong>Password</strong></label>
      <input type="password" name="password" id="password"  size="28" class="input"/>
      <br />
      
     
      <br />
      <input id="save"  type="submit" name="submit" class="submit" value="Log In" />
    </form>
    <!--<div id='contact-form'>
			 <a href='#' id="passwordrecoverylink" class='contact'>Forgot your password?</a>
		</div>-->	
  </div> 

</div>
<!-- end container -->
</body>
</html>