<?php
/********************************************************************************

#coder : Kapil verma

/********************************************************************************/
?>
<div id="content" >
  <div id="content_main" class="clearfix">
    <div style="width:78%; float:left;">
      <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" name="add_form" id="add_form" enctype="multipart/form-data" >
        <div id="dashboard"><span class="page_head">Upload Your CSV Here</span></div>
        <?php if(isset($errorMsg)) {?>
        <fieldset >
        <?php echo $errorMsg;?>
        </fieldset>
        <?php } ?>
        
       
        <fieldset id="personal">
        <legend>Import CSV File</legend>
        <input type="file" name="import_file" id="import_file" />
        <br />
        <br />
        <tr>
          <td align="left" valign="top">&nbsp;</td>
          <td align="left" valign="top"><input name="submit" type="submit" value="submit"/></td>
        </tr>
        </fieldset>
      </form>
    </DIV>
    <DIV style="width:18%;float:right;">
      <?php include(LIST_ROOT_ADMIN."/includes/views/right_menu.php");   ?>
    </DIV>
  </div>
</div>