<?php



/********************************************************************************

#coder : Keshav

/********************************************************************************/



?>
<div id="content" >
  <div id="content_main" class="clearfix">
    <div style="width:78%; float:left;">
      <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="add_form" id="add_form" enctype="multipart/form-data" >
        <div id="dashboard"><span class="page_head">Update Car</span></div>
        <?php if($errorMsg!='') {?>
        <fieldset >
        <?php echo $errorMsg;?>
        </fieldset>
        <? } ?>
          
        <fieldset id="personal">
        <legend>Brand Title<font color="#FF0000">*</font></legend>
        <input type="text" name="title" id="title" value="<?=$title?>" class="text_box1"/>
        <br />
        <br />
        </fieldset>
        
        <fieldset id="personal">
        <legend>Brand Logo<font color="#FF0000">*</font></legend>
        <input type="file" name="logo" id="logo" />
        <?php if($old_image!='') {?>
        <br />
        	<img src="<?=DEFAULT_ADMIN_URL?>/images/brands/<?=$old_image?>" width="70px" height="70px" />        
        <?php }?>
        <br />
        <br />
        </fieldset>        
        
        <fieldset id="personal">
        <legend>Publish</legend>
        Yes
        <input type="radio" name="publish" id="publish_1" value="yes" <?php if($publish == 'yes') {echo 'checked="checked"'; }?> />
        &nbsp;&nbsp;&nbsp; no
        <input type="radio" name="publish" id="publish_2" value="no"  <?php if($publish == 'no') {echo 'checked="checked"'; }?> />
        <br />
        <br />
        <br />
        <br />
        <td align="left" valign="top"><input type="hidden" value="<?=$old_image?>" name="old_image" /></td>
        <td align="left" valign="top"><input name="submit" type="submit" value="submit"/></td>
        </tr>
        <br />
        </fieldset>
      </form>
    </DIV>
    <DIV style="width:18%;float:right;">
      <?php include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu.php");   ?>
    </DIV>
  </div>
</div>
