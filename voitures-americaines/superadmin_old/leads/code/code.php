<?php

/********************************************************************************************************************

#Coder       : Keshav Sharma

#Description : This Code is used to display list of all product and remove any on them 


*********************************************************************************************************************/



extract($_GET);

extract($_POST);



$obj_block = new common();

$currentTimestamp = getCurrentTimestamp();

if($bid!='' && $action=='delete')

  {
	
  $deleteProduct = $obj_block->delete(TBL_LEADS, 'id ='.$bid);

  $_SESSION['msg']= 'User info Successfully Deleted';
  
  unset($obj_block);

  echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/leads/index.php";</script>';
   
  exit;

  }

$getBlock = $obj_block->read(TBL_LEADS,'',' created_at DESC');

unset($obj_block);

?>