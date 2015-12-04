<?php


/*************************************************************************************************************

#Coder       : Kapil Verma

*************************************************************************************************************/




extract($_GET);


extract($_POST);

$obj = new validation();

if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST') {
//print_r($_POST); die;
	$error='';
	
	$obj->add_fields($name, 'req', 'Please Enter Name');
	$obj->add_fields($position, 'req', 'Please Enter Status Number');
	$obj->add_fields($short, 'req', 'Please Enter Short Description');
	$obj->add_fields($desc, 'req', 'Please Enter Description');
	
	$error = $obj->validate();
	
	$devicesInfo = $objCommon->read('status',"name='$name'");
	if(mysql_num_rows($devicesInfo)){
		$error .= "Name already exists";
	}
	$devicesInfo = $objCommon->read('status',"position='$position'");
	if(mysql_num_rows($devicesInfo)){
		$error .= "<br/>Status Number already defined";
	}
	if($error){
	
		$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
	
	}

	else
	
	{
		
	
		$dataArr  =  array('name'=>ucfirst($name),'active'=>$active,'short_description'=>$short,'long_description'=>$desc,'position'=>$position);
	
		$update_Article=$objCommon->save("status",$dataArr);
	
		unset($objCommon);
	
		$_SESSION['msg']='Successfully Added';
	
		echo '<script>location.href="'.DEFAULT_URL.'/admin/status/index.php";</script>';
	
		exit;
	
	}

    

  }
 
?>
