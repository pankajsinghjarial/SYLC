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
	
	$obj->add_fields($title, 'req', 'Please Enter Title');
	$obj->add_fields($fees, 'req', 'Please Enter Amount');
	$obj->add_fields($fees, 'currency', 'Please Enter a valid Amount');
	$obj->add_fields($status_id, 'req', 'Please Select Associated Status');
	$obj->add_fields($desc, 'req', 'Please Enter Description');
	
	$error = $obj->validate();
	
	$devicesInfo = $objCommon->read('upsell',"title='$title' and id != '$id' ");
	if(mysql_num_rows($devicesInfo)){
		$error .= "Title already exists";
	}
	if($error){
	
		$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
	
	}
	else
	
	{
		
		$dataArr  =  array('title'=>ucfirst($title),'status'=>$status,'fees'=>number_format($fees,2),'status_id'=>$status_id,'desc'=>$desc);
	
		$update_Article=$objCommon->save("upsell",$dataArr);
	
		unset($objCommon);
	
		$_SESSION['msg']='Successfully Updated';
	
		echo '<script>location.href="'.DEFAULT_URL.'/admin/upsell/index.php";</script>';
	
		exit;
	}

    

  }
  
?>
