<?php
include("conf/config.inc.php");
$carid 		= $_POST['carid'];
$cartype 	= $_POST['cartype'];
$carname 	= $_POST['carname'];
$carimg 	= $_POST['carimg'];
$carprice 	= $_POST['carprice'];
$ischk	 	= $_POST['ischk'];
if($_SESSION['User']['id']!=""){
	
	$common = new common();
	if(strlen($carid)>0){
		if($ischk=='unchecked'){
			$common->customQuery("DELETE FROM wishlist WHERE car_id = {$carid}");
			echo "Deleted Successfully.";
		}else{
                        $userid = $_SESSION['User']['id'];
                        $chkRecExist = $common->numberOfRows('wishlist',"car_id = $carid AND user_id = $userid ");
                        if($chkRecExist==0){
                            $common->customQuery('INSERT INTO wishlist (user_id, car_id, car_type, car_name, car_img, car_price, created) VALUES ("'.$userid.'", "'.$carid.'" ,"'.$cartype.'", "'.$carname.'", "'.$carimg.'", "'.$carprice.'", now())');
                            echo "Saved Successfully.";
                        }
			
		}
	}
	
}


?>