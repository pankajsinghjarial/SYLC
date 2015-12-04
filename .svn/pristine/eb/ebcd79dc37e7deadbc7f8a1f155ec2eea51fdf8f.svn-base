<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300italic,400italic,500,300,500italic,700,700italic' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="robots" content="noindex, nofollow">

<link rel="shortcut icon" href="<?php echo DEFAULT_URL ?>/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<?php
if(isset($car_meta_values) && count($car_meta_values) > 0){
	echo $dataMeta ='<meta name="description" content="'.$car_meta_values['description'].'" />
					<title>'.$car_meta_values['title'].'</title>';
}
else{
	$mainHandle = new Handle();
	echo $mainHandle->metaData();
} ?>

<link href="<?php echo DEFAULT_URL; ?>/css/reset.css" type="text/css" rel="stylesheet" media="all" />
<link href="<?php echo DEFAULT_URL; ?>/css/styles.css" type="text/css" rel="stylesheet" media="all" />
<link media="screen" rel="stylesheet" href="<?php echo DEFAULT_URL; ?>/css/colorbox.css" />
<script type="text/javascript">
	var google = null;
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34824523-1']);
  <?php if(isset($_SESSION['success']) || isset($_SESSION['sentmail_txt']) ){ ?> 
  _gaq.push(['_trackPageview','/thankyou']);
  _gaq.push(["_setCustomVar", 1, "Page Type", "Thank You Message", 3]);
 _gaq.push(["_trackPageview"]);
  <?php }
   else{ ?>
  _gaq.push(['_trackPageview']);
  <?php } ?>
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<?php 
$unique_id = md5($_SERVER['REMOTE_PORT'].$_SERVER['REMOTE_ADDR'].time()); 
if(!isset($_SESSION['unique_id'])){
   $_SESSION['unique_id'][] = $unique_id;
}
?>