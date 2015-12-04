<?php



/********************************************************************************

#coder : Manoj Pandit

/********************************************************************************/
?>
<script src="<?= DEFAULT_ADMIN_URL; ?>/js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
<?php 
//if($preset = "basic")
//{
    $options = '
    mode : "textareas",
	elements : "ajaxfilemanager",
    theme : "advanced",
	editor_deselector : "mceNoEditor",
	plugins : "advimage,advlink,table,media,contextmenu",    
	theme_advanced_buttons1 : "bold,italic,underline,separator,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,outdent,indent,image,code,cut,copy,paste",
    theme_advanced_buttons2 : "fontselect,fontsizeselect,forecolor,backcolor,cleanup,removeformat",
    theme_advanced_buttons3 : "tablecontrols",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_path_location : "bottom",
	file_browser_callback : "ajaxfilemanager",
    extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]"
    ';
/*, content_css : "/css/'.$this->layout.'.css"}*/
?>
		
		tinyMCE.init({<?php echo($options); ?>});
		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "<?php echo DEFAULT_ADMIN_URL;?>/js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
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
                url: "<?php echo DEFAULT_ADMIN_URL;?>/js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
                width: 752,
                height: 500,
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
      <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="add_form" id="add_form" enctype="multipart/form-data" >
        <div id="dashboard"><span class="page_head">Update Old Model</span></div>
        <?php if($errorMsg!='') {?>
        <fieldset >
        <?php echo $errorMsg;?>
        </fieldset>
        <? } ?>
          
        <fieldset id="personal">
        <legend>Brand Name<font color="#FF0000">*</font></legend>
        <input type="text" name="brand_name" id="brand_name" value="<?=$brand_name?>" class="text_box1"/>
        <br />
        <br />
        </fieldset>
        
        <fieldset id="personal">
        <legend>Year<font color="#FF0000">*</font></legend>
        <input type="text" name="year" id="year" value="<?=$year?>" class="text_box1"/>
        <br />
        <br />
        </fieldset> 
        
        <fieldset id="personal">
        <legend>Product Image<font color="#FF0000">*</font></legend>        
        <input type="file" name="image" id="image" value="<?=$image?>" />&nbsp;&nbsp;&nbsp;&nbsp;( Preferred image size : 225 X 111 px )
        <?php if($old_image!='' && file_exists(LIST_ROOT_ADMIN.'/images/old_model/'.$old_image)) {?>
        <br />
        	<img src="<?=DEFAULT_ADMIN_URL?>/images/old_model/<?=$old_image?>" width="70px" height="70px" />        
        <?php }?>
        <br />
        <br />
        </fieldset> 

        
        <fieldset id="personal">
        <legend>Prix<font color="#FF0000">*</font></legend>
        <input type="text" name="prix" id="prix" value="<?=$prix?>" class="text_box1"/>
        <br />
        <br />
        </fieldset>               

        <fieldset id="personal">
        <legend>Content<font color="#FF0000">*</font></legend>
       <textarea name="contents" rows="15" cols="100" id="contents"><?=$contents?></textarea>
        <br />
        <br />
        </fieldset>
        
        <fieldset id="personal">
        <legend>Publish</legend>

     Yes <input type="radio" name="publish" id="publish_1" value="1" <?php if($publish==1){ ?> checked="checked" <? } ?> />&nbsp;&nbsp;&nbsp; No <input type="radio" name="publish" id="publish_2" value="0" <?php if($publish==0){ ?> checked="checked" <? } ?>/>
        <br />
        <br />
        <br />
        <br />
        <td align="left" valign="top"><input type="hidden" value="<?=$old_image?>" name="old_image" /></td>
        <td align="left" valign="top"><input name="submit" type="submit" value="submit" style="cursor:pointer;"/></td>
        </tr>
        <br />
        </fieldset>
      </form>
    </DIV>
    <DIV style="width:18%;float:right;">
      <?php include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu_template2.php");   ?>
    </DIV>
  </div>
</div>
