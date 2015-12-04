<?php


/*************************************************************************************************************

#Coder       : Kapil Verma

*************************************************************************************************************/




extract($_GET);


extract($_POST);

$obj = new validation();

if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST') {
	$error='';
	
	$obj->add_fields($title, 'req', 'Please Enter Title');
	$obj->add_fields($fees, 'req', 'Please Enter Amount');
	$obj->add_fields($fees, 'currency', 'Please Enter a valid Amount');
	//	$obj->add_fields($desc, 'req', 'Please Enter Description');
	
	$error = $obj->validate();
	
	$devicesInfo = $objCommon->read('fees',"title='$title' and id != '$id' ");
	if(mysql_num_rows($devicesInfo)){
		$error .= "Title already exists";
	}
	if($error){
	
		$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
	
	}
	else
	
	{
		
		$dataArr  =  array('title'=>ucfirst($title),'status'=>$status,'fees'=>number_format($fees,2));
	
		$update_Article=$objCommon->update("fees",$dataArr,"id = $id");
	
		unset($objCommon);
	
		$_SESSION['msg']='Successfully Updated';
	
		echo '<script>location.href="'.DEFAULT_URL.'/admin/fees/index.php";</script>';
	
		exit;
	}

    

  }
  else {
$devicesInfo = $objCommon->read('fees','id='.$pid);
$fetch=$db->fetchNextObject($devicesInfo);
$title = $fetch->title;
$fees = $fetch->fees;
$status= $fetch->status;
$id = $fetch->id;
  }
?>
