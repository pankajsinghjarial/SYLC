<?php


/*************************************************************************************************************

#Coder       : Kapil Verma

*************************************************************************************************************/




extract($_GET);


extract($_POST);

$obj = new validation();

$stats= $objCommon->read('status','','position ASC');

if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST') {
	$error='';
	
	$obj->add_fields($car_name, 'req', 'Please Enter Car Name');
	if($_FILES['image']['name']) {
	$obj->add_fields($_FILES['image'], 'ftype=png,jpg,gif', "Please upload png,jpg,gif file.");
	$obj->add_fields($_FILES['image'], 'imgwh=667,327', "Please upload Image with dimension 667px X 327px.");
	$obj->add_fields($_FILES['image'], 'fsize=1048576', 'Please Upload Image of size less than 1mb ');
	}
	$error = $obj->validate();
	
	$devicesInfo = $objCommon->read('car_gallery',"car_name='$car_name' and id != '$id' ");
	if(mysql_num_rows($devicesInfo)){
		$error .= "Car Name already exists";
	}
	if($error){
	
		$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
	
	}
	else
	
	{
		
		if($_FILES['image']['name'] != '') { 
		$filename= time().$_FILES['image']['name'];
		set_time_limit(0);
		$docDestination = LIST_ROOT.'/gallery/'.$filename;
		move_uploaded_file($_FILES['image']['tmp_name'], $docDestination) or die($docDestination);
		}
		else {
			$filename=$oldimage;
		}
		$dataArr  =  array('car_name'=>ucfirst($car_name),'status'=>$status,'image_name'=>$filename);
		$update_Article=$objCommon->update("car_gallery",$dataArr,"id = $id");
	
		unset($objCommon);
	
		$_SESSION['msg']='Successfully Updated';
	
		echo '<script>location.href="'.DEFAULT_URL.'/admin/gallery/index.php";</script>';
	
		exit;
	}

    

  }
  else {
$devicesInfo = $objCommon->read('car_gallery','id='.$pid);
$fetch=$db->fetchNextObject($devicesInfo);
$car_name = $fetch->car_name;
$oldimage = $fetch->image_name;
$status= $fetch->status;
$id = $fetch->id;
  }
?>
<?php
function imageResize($width, $height, $target) {
if ($width > $height) {
$percentage = ($target / $width);
} else {
$percentage = ($target / $height);
}
$width = round($width * $percentage);
$height = round($height * $percentage);
return "width=\"$width\" height=\"$height\"";
}
$mysock = getimagesize(DEFAULT_URL."/gallery/".$oldimage);
?>
