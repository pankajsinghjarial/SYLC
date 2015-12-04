<?php

/*************************************************************************************************************

#Coder       : Keshav Sharma


*************************************************************************************************************/

extract($_GET);

extract($_POST);

$obj_block = new common();

$obj = new validation();

$obj_handle = new Handle();   

 /* Get Current Date Time Stamp */



 $currentTimestamp = getCurrentTimestamp();

	 if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST')
     {
		  $error='';

		  $obj->add_fields($title, 'req', 'Please Enter Title'); 
		  
		  $error = $obj->validate();
		  
		 $image = '';
		  //--------------------------------------------//

		  if($error){

			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }	 

		  else

		    {	 
			if($_FILES["logo"]["name"]) {
			
							$type = explode(".",$_FILES["logo"]["name"]);
							
							if(end($type) =="png" || end($type) =="jpeg" || end($type) =="jpg"  || end($type) =="gif")
							{                           
								$image = getCurrentTimestamp().'-'.$_FILES["logo"]["name"];								
		  
								//chmod(DEFAULT_ADMIN_URL."/images/brands",0777);
								
								move_uploaded_file($_FILES["logo"]["tmp_name"],LIST_ROOT_ADMIN."/images/brands/" . $image);							
							}  
				}			
		  	$dataArr  =  array('title'=>$title ,'logo'=>$image ,'publish'=>$publish,'creation_date'=>$currentTimestamp);
			

			$add_product=$obj_block->save(TBL_BRANDS, $dataArr);

		    $_SESSION['msg']= 'Brand Successfully Added';

		    redirectUrl(DEFAULT_ADMIN_URL.'/brands/index.php'); 
			
			unset($obj_block);
			
			unset($obj);

		    exit;

			}

		 }

	

?>

