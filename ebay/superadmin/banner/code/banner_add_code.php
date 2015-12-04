<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting 		= new common();
$obj 				= new validation();
 
/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
 
if($_SERVER['REQUEST_METHOD']=='POST')
    {
		  $error='';
		  if($web != "")
		  {
					  $obj->add_fields($web, 'validURL', 'Please Enter A Valid Website Url');
  
			  }
		  $obj->add_fields($_FILES['file']['name'], 'req', 'Please Upload Image');
		  $obj->add_fields($_FILES['file'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');

		  if($type == 1 && $_FILES['file']['name'] != "")
		  { 
		  $obj->add_fields($_FILES['file'], "imgwh=988,358", "Please Upload Valid Image(988px X 358px) ");
		  }
		  else if($type == 2 && $_FILES['file']['name'] != "")
		  {
		  $obj->add_fields($_FILES['file'], "imgwh=198,199", "Please Upload Valid Image(198px X 199px) ");
		  }
		  else if($type == 3 && $_FILES['file']['name'] != "")
		  {
		  $obj->add_fields($_FILES['file'], "imgwh=191,115", "Please Upload Valid Image(191px X 115px) ");
		  }
		  else if($type == 4 && $_FILES['file']['name'] != "")
		  {
		  $obj->add_fields($_FILES['file'], "imgwh=167,179", "Please Upload Valid Image(167px X 179px) ");
		  }
		  else if($type == 5 && $_FILES['file']['name'] != "")
		  {
		  $obj->add_fields($_FILES['file'], "imgwh=300,216", "Please Upload Valid Image(300px X 216px) ");
		  }
		   else if($type == 6 && $_FILES['file']['name'] != "")
		  {
		  $obj->add_fields($_FILES['file'], "imgwh=278,112", "Please Upload Valid Image(278px X 112px) ");
		  }
 		  $error = $obj->validate();		   
		  
		  if($error){
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
 		   }
		  else
		    {
		  $image_name = $_FILES['file']['name'];
		  $path = LIST_ROOT.'/images/banner/';
          move_uploaded_file($_FILES["file"]["tmp_name"],$path.$_FILES["file"]["name"]);
		  $dataArr  =  array('title'=>$name ,'type'=>$type,'image'=>$image_name,'creation_date'=>$currentTimestamp,'publish'=>$publish,'website'=>$web);
		  $banner_insert = $obj_setting->save('banner',$dataArr);
		   $_SESSION['msg']='Successfully Added';

		  echo '<script>location.href="'.DEFAULT_URL.'/superadmin/banner/index.php";</script>'; 

		  exit;
		  
		  
		  }
		}
		
?>