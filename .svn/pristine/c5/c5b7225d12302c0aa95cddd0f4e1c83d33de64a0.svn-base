<?php session_start();

if(isset($_SESSION['User']) && $_SESSION['User']['id']!=""){
	session_destroy();
	echo "<script>window.location.href='".DEFAULT_URL."/home'</script>";
}

?>