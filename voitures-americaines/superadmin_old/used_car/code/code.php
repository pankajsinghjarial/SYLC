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
	
	$logoname = $obj_block->getNameById(TBL_USED_CAR,'id='.$bid);
	
	//chmod(DEFAULT_ADMIN_URL."/images/used_car/image/",0777);
	
	if($logoname->image!='') {
	
		unlink(LIST_ROOT_ADMIN."/images/used_car/image/".$logoname->image);
				
	}
	
	//chmod(DEFAULT_ADMIN_URL."/images/used_car/dispo/",0777);
	
	if($logoname->dispo!='') {
	
		unlink(LIST_ROOT_ADMIN."/images/used_car/dispo/".$logoname->dispo);
				
	}
	
  $deleteProduct = $obj_block->delete(TBL_USED_CAR, 'id ='.$bid);

  $_SESSION['msg']= 'Car Successfully Deleted';
  
  unset($obj_block);

  echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/used_car/index.php";</script>';
   
  exit;

  }

$getBlock = $obj_block->read(TBL_USED_CAR,'',' creation_date DESC');

unset($obj_block);

?>