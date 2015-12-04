<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>Add New Car</h1>
    </div>

          <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="add_form" id="add_form" enctype="multipart/form-data" >

      <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
        <tr>
          <th rowspan="3" class="sized"><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
          <th class="topleft"></th>
          <td id="tbl-border-top">&nbsp;</td>
          <th class="topright"></th>
          <th rowspan="3" class="sized"><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
        </tr>
        <tr>
          <td id="tbl-border-left"></td>
          <td><!--  start content-table-inner -->
            <div id="content-table-inner">
              <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr valign="top">
                  <td><!-- start id-form -->
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <td colspan="3"><?php if(isset($errorMsg)) {?>
                          <!--  start message-red -->
                          <div id="message-red">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td style="padding-left: 35px;"><?php echo $errorMsg?></td>
                                <td class="red-right"></td>
                              </tr>
                            </table>
                          </div>
                          <!--  end message-red -->
                          <?php } else if(isset($_SESSION['success_msg']) && $_SESSION['success_msg']!='') { ?>
                          <!--  start message-green -->
                          <div id="message-green">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="green-left" style="padding-left: 35px;"><?php echo $_SESSION['success_msg']?></td>
                                <td class="green-right"><a class="close-green"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_green.gif"   alt="" /></a></td>
                              </tr>
                            </table>
                          </div>
                          <!--  end message-green -->
                          <?php 
							unset($_SESSION['success_msg']);
						} ?>
                        </td>
                      </tr>
                      <tr>
                        <th valign="top">Model:</th>
                        <td> <input type="text" name="model_name" id="model_name" value="<?=$model_name?>" class="inp-form"/></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Brand:</th>
                        <td> <select name="brand_id" class="select-form required">
                            <option value="">Select Brand</option>
                            <?php while($brands = mysql_fetch_object($getbrandBlock)) {?>
                            <?php if($brand_id==$brands->id) { ?>
                                <option value="<?=$brands->id?>" selected="selected"><?=$brands->title?></option>
                            <?php } else { ?>
                                <option value="<?=$brands->id?>"><?=$brands->title?></option>
                            <?php }}?>
                        </select></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <th valign="top">Year:</th>
                        <td> <input type="text" name="year" id="year" value="<?=$year?>" class="inp-form"/></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Color:</th>
                        <td> <input type="text" name="color" id="color" value="<?=$color?>" class="inp-form"/></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Dispo:</th>
                        <td> <input type="text" name="dispo" id="dispo" value="<?=$dispo?>" class="inp-form"/></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                        <td>&nbsp;</td>
                      </tr>
                      
                        <tr>
                        <th valign="top">Prix:</th>
                        <td> <input type="text" name="prix" id="prix" value="<?=$prix?>" class="inp-form"/></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Stock Type:</th>
                        <td> <select name="stockType" class="select-form required">
                                <option value="">Select Type</option>
                                <option value="neuf">Neuf</option> 
                                <option value="classic">Classic car</option> 
                            </select></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                        <td>&nbsp;</td>
                      </tr>
                       <tr>
                        <th valign="top">Image:</th>
                        <td> <input type="file" name="file" id="image" /></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <th valign="top">Publish:</th>
                        <td> Yes
                            <input type="radio" name="publish" id="publish_1" value="1" checked="checked" />
                            &nbsp;&nbsp;&nbsp; no
                            <input type="radio" name="publish" id="publish_2" value="0"   /></td>
                          <td>&nbsp;</td>
                      </tr>
						
                       <tr>
                        <th valign="top"></th>
                        <td>
                        <input type="hidden" name="sub" value="sub"/>
                        <input type="submit" value="submit" class="form-submit" />
                        <img src="../../images/forms/back.jpg" onclick="javascript:location.href='<?php echo DEFAULT_ADMIN_URL; ?>/new_stock/brands/index.php'" /></td>
                        
                      </tr>
                    </table>
                    </form>

                    <!-- end id-form  -->
                  </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                  <td></td>
                </tr>
              </table>
              <div class="clear"></div>
            </div>
            <!--  end content-table-inner  -->
          </td>
          <td id="tbl-border-right"></td>
        </tr>
        <tr>
          <th class="sized bottomleft"></th>
          <td id="tbl-border-bottom">&nbsp;</td>
          <th class="sized bottomright"></th>
        </tr>
      </table>
	
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
