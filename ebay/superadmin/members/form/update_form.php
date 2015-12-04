<?php


/********************************************************************************

#coder : Kapil Verma

/********************************************************************************/



?>



<?php //Including java script for using html editor ?>

<script language="javascript" type="text/javascript" src="<?=DEFAULT_ADMIN_URL?>/js/jscripts/tiny_mce/tiny_mce.js"></script>

<script language="javascript" type="text/javascript" src="<?=DEFAULT_ADMIN_URL?>/js/jscripts/general.js"></script>

<script language="javascript" type="text/javascript">



		tinyMCE.init({



			mode : "exact",



			elements : "desc",



			theme : "advanced",editor_selector : "mceEditor",



	        editor_deselector : "mceNoEditor",



			plugins : "advimage,advlink,media,contextmenu",



			theme_advanced_buttons1_add_before : "newdocument,separator",



			theme_advanced_buttons1_add : "fontselect,fontsizeselect",



			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",



			theme_advanced_buttons2_add_before: "cut,copy,separator,",



			theme_advanced_buttons3_add_before : "",



			theme_advanced_buttons3_add : "media",



			theme_advanced_toolbar_location : "top",



			theme_advanced_toolbar_align : "left",



			extended_valid_elements : "hr[class|width|size|noshade]",



			file_browser_callback : "ajaxfilemanager",



			paste_use_dialog : false,



			theme_advanced_resizing : true,



			theme_advanced_resize_horizontal : true,



			apply_source_formatting : true,



			force_br_newlines : true,



			force_p_newlines : false,	



			relative_urls : true



		});







		function ajaxfilemanager(field_name, url, type, win) {



			var ajaxfilemanagerurl = "<?=DEFAULT_ADMIN_URL?>/scripts/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";



			switch (type) {



				case "image":



					break;



				case "media":



					break;



				case "flash": 



					break;



				case "file":



					break;



				default:



					return false;



			}



            tinyMCE.activeEditor.windowManager.open({



                url: "<?=DEFAULT_ADMIN_URL?>/scripts/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",



                width: 782,



                height: 440,



                inline : "yes",



                close_previous : "no"



            },{



                window : win,



                input : field_name



            });



            



		}



	</script>

 <script type="text/javascript">



function getMessageResponse(cat_id)

{



	

var xmlHttp;

try

  {

  // Firefox, Opera 8.0+, Safari

  xmlHttp=new XMLHttpRequest();

  }

catch (e)

  {

  // Internet Explorer

  try

    {

    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");

    }

  catch (e)

    {

    try

      {

      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");

      }

    catch (e)

      {

      alert("Your browser does not support AJAX!");

      return false;

      }

    }

  }

  xmlHttp.onreadystatechange=function()

    {

    if(xmlHttp.readyState==4)

      {

      document.getElementById('response').innerHTML=xmlHttp.responseText;

      

      }

    }

   var url="ajax_sub_category.php";

   url=url+"?cat_id="+cat_id;

   //url=url+"&sid="+Math.random();

     xmlHttp.open("GET",url,true);

     xmlHttp.send(null);

  }

</script>   

<div id="content" >

  <div id="content_main" class="clearfix">



      <div style="width:78%; float:left;">

     

      <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="add_form" id="add_form" enctype="multipart/form-data">

    

      <div id="dashboard"><span class="page_head">Update Product</span></div>

	  

       <?php if($errorMsg!='') {?>

	       <fieldset >

              <?php echo $errorMsg;?>

           </fieldset>

      <? } ?>

      

	  <fieldset id="personal">

     

      <legend>Product-Name<font color="#FF0000">*</font></legend>

       <input type="text" name="name" id="name" value="<?= $name;?>" class="text_box1"/>
       <input type="hidden" name="old_name" value="<?php echo $name;?>"/>

      <br />

      <br />

      

      </fieldset>

	  

       <fieldset id="personal">

    

      <legend>Category<font color="#FF0000">*</font></legend>

       <select name="cat_id" id="cat_id" onChange="getMessageResponse(this.value);">

      <option value="">Select Category</option>

      <? while($fetch_cat=mysql_fetch_object($all_category)){?>

      <option value="<?= $fetch_cat->id; ?>" <?php if($cat_id==$fetch_cat->id){?> selected="selected" <? } ?> ><?= $fetch_cat->name; ?></option>

      <? } ?>

      </select>

      <br />

      <br />

      

      </fieldset>

      

      <div id="response">

       <? if($sub_cat_id!='' && $sub_cat_id!=0){ ?>

      <fieldset id="personal">

    

      <legend>Sub-Category<font color="#FF0000">*</font></legend>

      <select name="sub_cat_id" id="sub_cat_id">

      <option value="">Select Sub-Category</option>

      <? while($fetch_sub_cat=mysql_fetch_object($get_sub_cat)){?>

      <option value="<?= $fetch_sub_cat->id; ?>" <?php if($fetch_sub_cat->id==$sub_cat_id){?> selected="selected" <? }?>><?= $fetch_sub_cat->name; ?></option>

      <? } ?>

      </select>

      <br />

      <br />

      

      </fieldset>

      <input type="hidden" name="sub_cat_exist" id="sub_cat_exist" value="1" />





       <? 

	   } 

	   else

	    {

		?>

         <input type="hidden" name="sub_cat_id" id="sub_cat_id" value="" />

         <input type="hidden" name="sub_cat_exist" id="sub_cat_exist" value="0" />

        <?	

		}

	   ?>      

      

      </div>

      

      

         <fieldset id="personal">

      <legend>Brand-Logo<font color="#FF0000">*</font></legend>

       <img src="<?= DEFAULT_ADMIN_URL;?>/products_manager/upload/<?= $logo ;?>" width="100" height="100" alt="edit"  border="0"/><br /><br />

      <input type="file" name="logo" id="logo" />

       <input type="hidden" name="logo_hidden" id="logo_hidden" value="<?= $logo; ?>">

      <br />

      <br />

      </fieldset>

      
		<!--  <fieldset id="personal">

      <legend>Page Title</legend>

      <input type="text" name="page_title" id="page_title" value="<?= $page_title;?>" class="text_box1"/>

      <br />

      <br />

      </fieldset>
       <fieldset id="personal">

      <legend>Meta Keyword</legend>

      <input type="text" name="meta_keyword" id="meta_keyword" value="<?= $meta_keyword;?>" class="text_box1"/>

      <br />

      <br />

      </fieldset>
       <fieldset id="personal">

      <legend>Meta Description</legend>

      <input type="text" name="meta_description" id="meta_description" value="<?= $meta_description;?>" class="text_box1"/>

      <br />

      <br />     
     

      </fieldset>-->

        
        
       <fieldset id="personal">

     <legend>Publish</legend>

     Yes <input type="radio" name="publish" id="publish_1" value="1" <?php if($publish==1){?> checked="checked" <? } ?> />&nbsp;&nbsp;&nbsp; No <input type="radio" name="publish" id="publish_2" value="0" <?php if($publish==0){?> checked="checked" <? } ?>/>

      <br />

      <br />

      

      </fieldset>
      

      <fieldset id="personal">

      <legend>Description</legend>

      <textarea name="desc" id="desc" cols="100" rows="15" class="pad_t5"><?= $desc;?></textarea>

      <br />

      <br />

      <tr>

		 			<td align="left" valign="top">&nbsp;<input type="hidden" name="old_p_slug" value="<?php echo $old_p_slug;?>" /></td>

		 			<td align="left" valign="top"> <input name="submit" type="submit" value="submit"/></td>

	 			</tr><br /><br />   <br />

      <br />  <br /> <br />  <br />

      </fieldset>

  </form>

     



      </DIV>

      

      <DIV style="width:18%;float:right;">

      

      

      

       <?php include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu.php");   ?>



      </DIV>

      

      

    

   

  </div>

</div>