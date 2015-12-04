<?php



/********************************************************************************

#coder : Manoj Pandit

/********************************************************************************/



?>
<div id="content" >
  <div id="content_main" class="clearfix">
    <div style="width:78%; float:left;">
      <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="add_form" id="add_form" enctype="multipart/form-data" >
        <div id="dashboard"><span class="page_head">Update New Model</span></div>
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
        <input type="file" name="image" id="image" value="<?=$image?>" />&nbsp;&nbsp;&nbsp;&nbsp;( Preferred image size : 345 X 238 px )
        <?php if($old_image!='' && file_exists(LIST_ROOT_ADMIN.'/images/new_model/'.$old_image)) {?>
        <br />
        	<img src="<?=DEFAULT_ADMIN_URL?>/images/new_model/<?=$old_image?>" width="70px" height="70px" />        
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
