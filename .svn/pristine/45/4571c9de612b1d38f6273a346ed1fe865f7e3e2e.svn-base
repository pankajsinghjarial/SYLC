<!--  styled file upload script -->
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "<?php echo ADMIN_IMAGE_URL; ?>/forms/upload_file.gif",
          imageheight : 29,
          imagewidth : 78,
          width : 300
      });
  });
</script>

<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>Global Settings</h1>
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
                  <td><!-- start id-form -->
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <td colspan="3"><?php if(isset($errorMsg)) {?>
                          <!--  start message-red -->
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
						  } ?>                        </td>
                      </tr>
                      <tr>
                        <th valign="top">Website Title:</th>
                        <td><input type="text" class="inp-form" name="site_title" id="site_title" value="<?php echo  $site_title ;?>" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Meta Title:</th>
                        <td><input type="text" class="inp-form" name="meta_title" id="meta_title" value="<?php echo $meta_title ;?>"/></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Meta Keywords:</th>
                        <td><input type="text" class="inp-form" name="meta_keywords" id="meta_keywords" value="<?php echo $meta_keywords ;?>" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Meta Description:</th>
                        <td><textarea rows="" cols="" class="form-textarea" name="meta_description" id="meta_description"><?php echo  $meta_description ;?>
</textarea></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Phone1:</th>
                        <td><input type="text" class="inp-form" name="phone1" id="phone1" value="<?php echo $phone1 ;?>" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Phone2:</th>
                        <td><input type="text" class="inp-form" name="phone2" id="phone2" value="<?php echo $phone2 ;?>" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Office Address:</th>
                        <td><input type="text" class="inp-form" name="office_address" id="office_address" value="<?php echo $office_address ;?>" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Slogan:</th>
                        <td><input type="text" class="inp-form" name="slogan" id="slogan" value="<?php echo $slogan ;?>" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Logo:</th>
                        <td><input type="file" class="file_1" name="logo_header" id="logo_header"/></td>
                        <td><div class="bubble-left"></div>
                          <div class="bubble-inner">JPEG, GIF 200KB max per image</div>
                          <div class="bubble-right"></div></td>
                      </tr>
                      
                      <tr>
                        <th valign="top">Facebook Url:</th>
                        <td><input type="text" class="inp-form" name="facebook" id="facebook" value="<?php echo $facebook ;?>" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <th valign="top">Twitter Url:</th>
                        <td><input type="text" class="inp-form" name="twitter" id="twitter" value="<?php echo $twitter ;?>" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <th valign="top">You Tube Url:</th>
                        <td><input type="text" class="inp-form" name="youtube" id="youtube" value="<?php echo $youtube ;?>" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <th valign="top">RSS Url:</th>
                        <td><input type="text" class="inp-form" name="rss" id="rss" value="<?php echo $rss ;?>" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <th valign="top">Copyright Text:</th>
                        <td><textarea rows="" cols="" class="form-textarea" name="copyright_text_footer" id="copyright_text_footer"><?php echo $copyright_text_footer ;?>
</textarea></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">Google Map Api Key:</th>
                        <td><textarea rows="" cols="" class="form-textarea" name="google_map_key" id="google_map_key"><?php echo $google_map_key ;?>
</textarea></td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <th>&nbsp;</th>
                        <td valign="top"><input type="submit" value="" class="form-submit" />
                          <input type="reset" value="" class="form-reset" />                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>&nbsp;</th>
                        <td colspan="2" valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <th>Current Logo Image:</th>
                        <td colspan="2" valign="top"><img src="<?php echo ADMIN_IMAGE_URL; ?>/logo_header/<?php echo $logo_header;?>" /></td>
                      </tr>
                    </table>
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
    </form>
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>