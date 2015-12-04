<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_TITLE_ADMIN; ?></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<link rel="stylesheet" type="text/css" media="all" href="<?= DEFAULT_ADMIN_URL; ?>/css/style.css" />
<link rel="Stylesheet" type="text/css" href="<?= DEFAULT_ADMIN_URL; ?>/css/smoothness/jquery-ui-1.7.1.custom.css"  />
<script src="<?= DEFAULT_ADMIN_URL; ?>/ajs/calendar.js" type="text/javascript"></script>
<LINK href="<?= DEFAULT_ADMIN_URL; ?>/css/calendar.css" type="text/css rel=stylesheet" />
<style type="text/css" title="currentStyle">
			@import "<?= DEFAULT_ADMIN_URL; ?>/css/demo_page.css";
			@import "<?= DEFAULT_ADMIN_URL; ?>/css/demo_table.css";
</style>
        <script type="text/javascript" language="javascript" src="<?= DEFAULT_ADMIN_URL; ?>/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="<?= DEFAULT_ADMIN_URL; ?>/js/jquery.dataTables.js"></script>

</head>
<body>
<div class="container" id="container">
  <div  id="header">
    <div id="profile_info"> <img src="<?= ADMIN_IMAGE_URL; ?>/avatar.jpg" id="avatar" alt="avatar" />
      <p>Welcome <strong><? if($_SESSION['userName']!='')  { echo $_SESSION['userName'] ;} ?> </strong></p><p> <?php if($_SESSION['userName']!=''){ ?><a href="<?=DEFAULT_ADMIN_URL?>/login/logout.php">Log out?</a><? }?> </p>
      
    </div>
	
    <div id="logo" style=" cursor:pointer;width:511px; height:88px; margin-top:20px;background:url(../images/logo.jpg) no-repeat" onclick="location.href='<?= DEFAULT_ADMIN_URL; ?>/home/home.php'" >
    </div>
  </div>

<br />

<div id="content" >
</div>
<br />
<?php 
//unset the object
unset($obj_summury);
?>