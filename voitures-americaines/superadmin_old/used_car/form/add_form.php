<?php



/********************************************************************************

#coder : Keshav

/********************************************************************************/



?>
<div id="content" >
  <div id="content_main" class="clearfix">
    <div style="width:78%; float:left;">
      <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="add_form" id="add_form" enctype="multipart/form-data" >
        <div id="dashboard"><span class="page_head">Add New Car</span></div>
        <?php if($errorMsg!='') {?>
        <fieldset >
        <?php echo $errorMsg;?>
        </fieldset>
        <? } ?>
          
        <fieldset id="personal">
        <legend>Model<font color="#FF0000">*</font></legend>
        <input type="text" name="model_name" id="model_name" value="<?=$model_name?>" class="text_box1"/>
        <br />
        <br />
        </fieldset>
          
        <fieldset id="personal">
        <legend>Brand<font color="#FF0000">*</font></legend>
        <select name="brand_id">
        	<option value="">Select Brand</option>
            <?php while($brands = mysql_fetch_object($brand_list)) {?>
            <?php if(isset($brand_id) && $brand_id==$brands->id) { ?>
            	<option value="<?=$brands->id?>" selected="selected"><?=$brands->title?></option>
            <?php } else { ?>
            	<option value="<?=$brands->id?>"><?=$brands->title?></option>
            <?php }}?>
        </select>
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
        <legend>Image</legend>        
        <input type="file" name="image" id="image" value="<?=$image?>" />
        <br />
        <br />
        </fieldset> 
        
        <fieldset id="personal">
        <legend>Dispo</legend>
        <input type="file" name="dispo" id="dispo" value="<?=$dispo?>" />
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
        Yes
        <input type="radio" name="publish" id="publish_1" value="1" checked="checked" />
        &nbsp;&nbsp;&nbsp; no
        <input type="radio" name="publish" id="publish_2" value="0" />
        <br />
        <br />
        <br />
        <br />
        <td align="left" valign="top">&nbsp;</td>
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
