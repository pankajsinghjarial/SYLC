<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
      $("input.file_1").filestyle({ 
          image: "<?php echo ADMIN_IMAGE_URL; ?>/forms/upload_file.gif",
          imageheight : 29,
          imagewidth : 78,
          width : 300
      });
  	});
</script>
<!-- /TinyMCE -->

<div id="content-outer"> 
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>Import Car</h1>
    </div>
    <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" name="account_form" id="account_form" enctype="multipart/form-data">
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
                  <td>&nbsp;</td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><!-- start id-form -->
                    
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%" style="position:relative;">
                      <tr>
                        <td colspan="3">
                         <?php if(isset($errorMsg)) {?>
                          <div id="message-red">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="red-left" style="padding-left: 35px;"><?php echo $errorMsg?></td>
                                <td class="red-right"><a class="close-red"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_red.gif" alt="" /></a></td>
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
						} ?></td>
                      </tr>
                      <tr>
                      <th valign="top">File Upload</th>
                        <td>
                            <input type="file" name="import" id="import" class="file_1" >
                          </td>
                          <td><div class="bubble-left"></div><div class="bubble-inner">Upload CSV file</div><div class="bubble-right"></div></td>
                      </tr>
                      <tr>
                      <th valign="top">Car Name</th>
                        <td>
                            <input type="text" name="carName" class="inp-form required" />
                          </td>
                         <td></td>
                      </tr>
                      <tr>
                      <th valign="top">Site Name</th>
                        <td>
                            <select name="siteName" id="siteName" class="select-form" >
                            	<option value="cars.com">Cars.com</option>
                                <option value="autotrader.com">Autotrader.com</option>
                            </select>
                          </td>
                         <td><div class="error-left"></div><div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td colspan="2" valign="top"><input type="submit" class="form-submit" name="submit" value="">
                          <input type="reset" class="form-reset">
                        </td>
                      </tr>
                    </table>
                    
                    <!-- end id-form  --></td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                </tr>
              </table>
              <div class="clear"></div>
            </div>
            
            <!--  end content-table-inner  --></td>
          <td id="tbl-border-right"></td>
        </tr>
        <tr>
          <th class="sized bottomleft"></th>
          <td id="tbl-border-bottom">&nbsp;</td>
          <th class="sized bottomright"></th>
        </tr>
      </table>
    </form>
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>