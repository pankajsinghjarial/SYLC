<?php


/*************************************************************************************************************

#Coder       : Kapil Verma

*************************************************************************************************************/




extract($_GET);


extract($_POST);

$obj = new validation();

if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST') {

$error='';
	
	$obj->add_fields($name, 'req', 'Please Enter Name');
	$obj->add_fields($position, 'req', 'Please Enter Status Number');
	$obj->add_fields($short, 'req', 'Please Enter Short Description');
	$obj->add_fields($desc, 'req', 'Please Enter Description');
	
	$error = $obj->validate();
	
	$devicesInfo = $objCommon->read('status',"name='$name' and id != '$id'");
	if(mysql_num_rows($devicesInfo)){
		$error .= "Name already exists";
	}
	$devicesInfo = $objCommon->read('status',"position='$position' and id != '$id'");
	if(mysql_num_rows($devicesInfo)){
		$error .= "<br/>Status Number already defined";
	}
	if($error){
	
		$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
	
	}
	else
	
	{
		
		$dataArr  =  array('name'=>ucfirst($name),'active'=>$active,'short_description'=>$short,'long_description'=>$desc,'position'=>$position);
		
		$update_Article=$objCommon->update("status",$dataArr,"id = '$id'");
		
		unset($objCommon);
		
		$_SESSION['msg']='Successfully Updated';
		
		echo '<script>location.href="'.DEFAULT_URL.'/admin/status/index.php";</script>';
		
		exit;
	
	}

    

  }
  else {
$devicesInfo = $objCommon->read('status','id='.$pid);
$fetch=$db->fetchNextObject($devicesInfo);
$name = $fetch->name;
$active = $fetch->active;
$short = $fetch->short_description;
$desc = $fetch->long_description;
$position= $fetch->position;
$id = $fetch->id;
  }
?>
