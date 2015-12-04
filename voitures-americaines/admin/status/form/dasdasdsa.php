<?php
/********************************************************************************

#coder : Kapil verma

/********************************************************************************/
?>
<div id="content" >
  <div id="content_main" class="clearfix">
    <div style="width:78%; float:left;">
      <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" name="add_form" id="add_form" enctype="multipart/form-data" >
        <div id="dashboard"><span class="page_head">Edit Category</span></div>
        <?php if(isset($errorMsg)) {?>
        <fieldset >
        <?php echo $errorMsg;?>
        </fieldset>
        <?php } ?>
        
       
        <fieldset id="personal">
        <legend>Name</legend>
        <input type="text" name="catname" id="catname" value="<?php echo $catname?>" />
        <br />
        <br />
         </fieldset>
          <fieldset id="personal">
        <legend>Status</legend>
       <select name='status'>
       <option value="0" <?php if($status == 0){ ?> selected="selected" <?php } ?>>Deactive</option>
       <option value="1" <?php if($status == 1){ ?> selected="selected" <?php } ?>>Active</option>
       </select>
        <br />
        <br />
        <tr>
          <td align="left" valign="top">&nbsp;</td>
          <td align="left" valign="top">
          <input type="hidden" name='id' value="<?php echo $id ?>" />
          <input name="submit" type="submit" value="submit"/></td>
        </tr>
        </fieldset>
      </form>
    </DIV>
    <DIV style="width:18%;float:right;">
      <?php include(LIST_ROOT_ADMIN."/includes/views/right_menu.php");   ?>
    </DIV>
  </div>
</div>