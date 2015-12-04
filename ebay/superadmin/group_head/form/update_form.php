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

    

<div id="content" >

  <div id="content_main" class="clearfix">



      <div style="width:78%; float:left;">

     

      <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="add_form" id="add_form" enctype="multipart/form-data">

    

      <div id="dashboard"><span class="page_head">Update Group-Head</span></div>

	  

       <?php if($errorMsg!='') {?>

	       <fieldset >

              <?php echo $errorMsg;?>

           </fieldset>

      <? } ?>

      

     <legend>Head-Name<font color="#FF0000">*</font></legend>

       <input type="text" name="name" id="name" value="<?= $name;?>" class="text_box1"/>

      <br />

      <br />

      

      </fieldset>

	  

       <fieldset id="personal">

    

      <legend>Address<font color="#FF0000">*</font></legend>


     <textarea name="address" id="address" rows="5" cols="40"><?=$address?></textarea>

      <br />

      <br />

      </fieldset>

       <fieldset id="personal">

      <legend>Phone No<font color="#FF0000">*</font></legend>

      <input type="text" name="phone" id="phone" value="<?= $phone;?>" class="text_box1"/>    
     

      <br />

      <br />

      </fieldset>

        
        
       <fieldset id="personal">

     <legend>Publish</legend>

     Yes <input type="radio" name="publish" id="publish_1" value="1" <?php if($publish==1){?> checked="checked" <? } ?> />&nbsp;&nbsp;&nbsp; No <input type="radio" name="publish" id="publish_2" value="0" <?php if($publish==0){?> checked="checked" <? } ?>/>



      <br />

      <br />  <br />

      <br />

      <tr>

		 			<td align="left" valign="top"> <input name="submit" type="submit" value="submit"/></td>

	 			</tr><br /><br /> 

      </fieldset>

  </form>

     



      </DIV>

      

      <DIV style="width:18%;float:right;">

      

      

      

       <?php include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu.php");   ?>



      </DIV>

      

      

    

   

  </div>

</div>