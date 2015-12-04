<?php

/********************************************************************************************************************

#Coder       : Manoj Pandit

#Description : This Code is used to display list of all product and remove any on them 


*********************************************************************************************************************/



extract($_GET);

extract($_POST);



$obj_block = new common();

$currentTimestamp = getCurrentTimestamp();

if($model_id!='' && $action=='delete')

  {
	
	$logoname = $obj_block->getNameById(TBL_NEW_MODEL,'id='.$model_id);
	
	
	
	/*if($logoname->image!='') {
		@chmod(LIST_ROOT_ADMIN."/images/new_model/",0777);
		unlink(LIST_ROOT_ADMIN."/images/new_model/".$logoname->image);
				
	}*/
	
  $deleteProduct = $obj_block->delete(TBL_NEW_MODEL, 'id ='.$model_id);

  $_SESSION['msg']= 'New Model Successfully Deleted';
  
  unset($obj_block);

  echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/new_model/index.php";</script>';
   
  exit;

  }

$getBlock = $obj_block->read(TBL_NEW_MODEL,'',' creation_date DESC');

unset($obj_block);

?>