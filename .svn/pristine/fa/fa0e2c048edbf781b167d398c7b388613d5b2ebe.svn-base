<?php



/********************************************************************************

#coder : Keshav

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
        <div id="dashboard"><span class="page_head">Html page content</span></div>
        <?php
		if($_SESSION['msg'] && $_SESSION['msg']!='')
		 {?>
        <fieldset>
        <?php
		 echo '<font color="#006600"><b>'.$_SESSION['msg'].'</b></font>';
		 ?>
        </fieldset>
        <?php unset($_SESSION['msg']); ?>
        <? } ?>
		<?php if(isset($errorMsg) && $errorMsg!='') {?>
        <fieldset>
        <?php echo $errorMsg;?>
        </fieldset>
        <? } ?> 
        <fieldset id="personal">
        <legend>Middle Text<font color="#FF0000"></font></legend>
        <textarea name="middle_text" rows="25" cols="100" id="middle_text"><?=$middle_text?></textarea>
        </fieldset>        

        <fieldset id="personal">
        <legend>Footer Above Text<font color="#FF0000"></font></legend>
        <textarea name="footer_above_text" rows="25" cols="100" id="footer_above_text"><?=$footer_above_text?></textarea>
        </fieldset> 
        
        <fieldset id="personal">
        <legend>Footer Text<font color="#FF0000"></font></legend>
        <textarea name="footer_text" rows="25" cols="100" id="footer_text"><?=$footer_text?></textarea>
        </fieldset>              
        
        <fieldset id="personal">
        <td align="left" valign="top"><input type="hidden" value="<?=$old_image?>" name="old_image" /></td>
        <td align="left" valign="top"><input name="submit" type="submit" value="submit" style="cursor:pointer;"/></td>
        </fieldset>
      </form>
    </DIV>
   
    <DIV style="width:18%;float:right;">
      <?php include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu_template3.php");   ?>
    </DIV>
  </div>
</div>
