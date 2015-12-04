<?php
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
 require_once("..\admin_common.php");
else
 require_once("../admin_common.php");
 
 
validate_session($identity);
 
Header("Location: live.php");	
if(!($serversession))
  $mydatabase->close_connect();
 ?>