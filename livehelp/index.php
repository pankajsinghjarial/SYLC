<?php

require_once("admin_common.php");
validate_session($identity);
 
 

Header("Location: admin.php");	
if(!($serversession))
  $mydatabase->close_connect();
 
?>