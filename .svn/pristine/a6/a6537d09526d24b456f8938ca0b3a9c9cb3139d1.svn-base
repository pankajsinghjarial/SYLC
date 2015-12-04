<?php

/********************************************************************************************************************

#Coder       : Kapil Verma

#Description : This Code is used to display list of all product and remove any on them 


*********************************************************************************************************************/



extract($_GET);

extract($_POST);



$obj_product = new common();

$currentTimestamp = getCurrentTimestamp();

if($prod_id!='' && $action=='delete')

  {

  $deleteProduct = $obj_product->delete(TBL_MEMBER, 'id ='.$prod_id);

   unlink(LIST_ROOT_ADMIN."/members/upload/".$file);

  $_SESSION['msg']= RECORD_DELETE;

  echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/admin/members/index.php";</script>'; 

  }

$getProduct = $obj_product->read(TBL_MEMBER);

?>



