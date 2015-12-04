<?php


/*************************************************************************************************************

#Coder       : Kapil Verma

*************************************************************************************************************/




extract($_GET);


extract($_POST);

$obj = new validation();


if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST') {
	$error='';
	$obj->add_fields($car_name, 'req', 'Please Enter Car Name');
	$obj->add_fields($_FILES['image']['name'], 'req', "Please upload file.");
	if($_FILES['image']['name']) {
	$obj->add_fields($_FILES['image'], 'ftype=png,jpg,gif', "Please upload png,jpg,gif file.");
	$obj->add_fields($_FILES['image'], 'imgwh=667,327', "Please upload Image with dimension 667px X 327px.");
	$obj->add_fields($_FILES['image'], 'fsize=1048576', 'Please Upload Image of size less than 1mb ');
	}
	
	$error = $obj->validate();
	
	$devicesInfo = $objCommon->read('car_gallery',"car_name='$car_name'");
	if(mysql_num_rows($devicesInfo)){
		$error .= "Car Name already exists";
	}
	if($error){
	
		$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
	
	}
	else
	
	{
		
		$filename= time().$_FILES['image']['name'];
		$dataArr  =  array('car_name'=>ucfirst($car_name),'status'=>$status,'image_name'=>$filename);
		set_time_limit(0);
		$docDestination = LIST_ROOT.'/gallery/'.$filename;
		move_uploaded_file($_FILES['image']['tmp_name'], $docDestination) or die($docDestination);
		$update_Article=$objCommon->save("car_gallery",$dataArr);
	
		unset($objCommon);
	
		$_SESSION['msg']='Successfully Added';
	
		echo '<script>location.href="'.DEFAULT_URL.'/admin/gallery/index.php";</script>';
	
		exit;
	}

    

  }
  
?>
