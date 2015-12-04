<?php

/********************************************************************************************************************

#Coder       : Kapil Verma

#Description : This Code is used to display list of all product and remove any on them 


*********************************************************************************************************************/



extract($_GET);

extract($_POST);



$obj_product = new common();

$currentTimestamp = getCurrentTimestamp();

if($pid!='' && $action=='delete')

  {

  $deleteProduct = $obj_product->delete(TBL_GHEAD, 'id ='.$pid);

  $_SESSION['msg']= RECORD_DELETE;

  echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/group_head/index.php";</script>';
   
  exit;

  }

$getProduct = $obj_product->read(TBL_GHEAD,'',' creation_date DESC');

?>



