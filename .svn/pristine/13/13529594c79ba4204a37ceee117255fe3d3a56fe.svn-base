<?php

/*************************************************************************************************************

#Coder       : Kapil Verma


*************************************************************************************************************/

extract($_GET);

extract($_POST);







$obj_product = new common();

$obj = new validation();

$obj_handle = new Handle();   

 /* Get Current Date Time Stamp */



 $currentTimestamp = getCurrentTimestamp();

 

       			

	 if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST')

	     {

		 

		  $error='';

		  //$obj->add_fields($name, 'req', 'Please Enter Product-Name');
                  if($name == '')
                    $obj->add_fields($name, 'req', 'Please Enter Sub Category Name');                  
                  else{                       
                      $result = $obj_product->numberOfRows(TBL_MEMBER, 'name = "'.$name.'" AND cat_id='.$cat_id.' AND sub_cat_id ='.$sub_cat_id);
                  }

		  $obj->add_fields($cat_id, 'req', 'Please Select Product Category');
                  
                  $obj->add_fields($sub_cat_id, 'req', 'Please Select Product Sub Category');		  
		 

		  $error = $obj->validate();

		  if($error|| $result > 0){               
                        if($result > 0)
                            $error .= "Product already Exist in selected Category.";

			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }	 

		  else

		    {	 

			if($_FILES['logo']['name'])
		       {

			   $logo  = $currentTimestamp.'_'.$_FILES['logo']['name'];

	           move_uploaded_file($_FILES['logo']['tmp_name'],LIST_ROOT_ADMIN."/products_manager/upload/".$logo) ;	 

			   }

			 else

			   $logo='no_img.jpg'; 

			
			 $p_slug = $obj_handle->makeAlias($name);
                         if($obj_product->numberOfRows(TBL_PRODUCT, "p_slug = '".$p_slug."'")>0){
				$p_slug = $obj_handle->makeAlias($p_slug." ".$cat_id);
			}
			 

		    $dataArr  =  array('name'=>$name , 'logo'=>$logo,'desc'=>$desc ,'cat_id'=>$cat_id ,'sub_cat_id'=>$sub_cat_id,'publish'=>$publish ,'creation_date'=>$currentTimestamp,'p_slug'=>$p_slug );

			$add_product=$obj_product->save(TBL_PRODUCT, $dataArr);

		    $_SESSION['msg']= RECORD_ADD;

		    redirectUrl(DEFAULT_ADMIN_URL.'/members/product.php'); 

		    exit;

			}

		 }

	

?>

