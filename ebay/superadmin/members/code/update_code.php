<?php

/*************************************************************************************************************

#Coder       : Kapil Verma

#Description : This Code is used to update a particular product. 


*************************************************************************************************************/



extract($_GET);

extract($_POST);

$obj = new validation();

$obj_product = new common();

/* Get Current Date Time Stamp */

$currentTimestamp = getCurrentTimestamp();

$obj_handle = new Handle();

if(isset($submit) && $submit != "" && $_SERVER['REQUEST_METHOD']=='POST')

	     {

		

		  $error='';

		  //$obj->add_fields($name, 'req', 'Please Enter Product-Name');                 
                  if($name == '') {
                    $obj->add_fields($name, 'req', 'Please Enter Category Name');
                  }else{
                      if($old_name != $name)
                          $result = $obj_product->numberOfRows(TBL_PRODUCT, 'name = "'.$name.'" AND cat_id='.$cat_id.' AND sub_cat_id='.$sub_cat_id);
                  }

		  $obj->add_fields($cat_id, 'req', 'Please Select Product Category');		  

		  if($sub_cat_exist==1)

		  $obj->add_fields($sub_cat_id, 'req', 'Please Select Product Sub-Category');

		 

		  $error = $obj->validate();

		  if($error|| $result > 0){

                         if($result > 0){
                            $error .= 'Product Name already exist in the Selected Category and Sub Category.';
                        }

			$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";

		    }

		  else

		   { 	

		   if($_FILES['logo']['name']!='')

		     {

		      $logo  = $currentTimestamp.'_'.$_FILES['logo']['name'];

			  move_uploaded_file($_FILES['logo']['tmp_name'],LIST_ROOT_ADMIN."/members/upload/".$logo) ;		 

		 	 unlink(LIST_ROOT_ADMIN."/members/upload/".$logo_hidden);

			 }

		   else

		    {

		      $logo=$logo_hidden;	 

			}

		   
		   $p_slug = $obj_handle->makeAlias($name);
                    if($obj_product->numberOfRows(TBL_PRODUCT, "p_slug = '".$p_slug."'")>0){
				$p_slug = $obj_handle->makeAlias($p_slug." ".$prod_id);
			}
		   
		   
 					   	 	 

		   $dataArr  =  array('name'=>$name, 'logo'=>$logo,'desc'=>$desc ,'cat_id'=>$cat_id,'sub_cat_id'=>$sub_cat_id,'publish'=>$publish ,'p_slug'=>$p_slug);

		   

		  

		   $update_product=$obj_product->update(TBL_PRODUCT,$dataArr,'id='.$prod_id);

		   $_SESSION['msg']= RECORD_UPDATE;
                   
                   redirectUrl(DEFAULT_ADMIN_URL.'/members/product.php');

		   exit;

		   }

		 }

else

         {		     

			 #Code to Fetch seleted ID's data  

			 $getProduct= $obj_product->read(TBL_PRODUCT,'id='.$prod_id);

			 $fetchProduct= $db->fetchNextObject($getProduct);

		     $name =$fetchProduct->name ;

			 $logo = $fetchProduct->logo ;

			 $desc =$fetchProduct->desc ;

			 $cat_id=$fetchProduct->cat_id;

			 $sub_cat_id=$fetchProduct->sub_cat_id;

			 $publish=$fetchProduct->publish;
			
			$old_p_slug  = $fetchProduct->p_slug;

		 }

$all_category = $obj_product->read(TBL_CATEGORY,'publish=1');



if($sub_cat_id!='' && $sub_cat_id!=0)

   {

	 $get_sub_cat = $obj_product->read(TBL_SUBCATEGORY, 'cid='.$cat_id.' AND publish=1');  

   }



			 

?>