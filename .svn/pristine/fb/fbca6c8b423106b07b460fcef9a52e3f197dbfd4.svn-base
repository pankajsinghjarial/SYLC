<script type="text/javascript">
function get_phone_pattern(val)
	{
	if(window.event && window.event.keyCode!=8) {
		if(val.length==1) {
			document.getElementById('phone').value='('+val;
		}
		//alert(val.length);
		if(val.length==4) {
			document.getElementById('phone').value=val+') ';
		}
		if(val.length==9) {
			document.getElementById('phone').value=val+'-';
		}
	}
}
</script>

<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>My Account</h1>
    </div>
    <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post" name="account_form" id="account_form">
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
                                <td class="red-left" style="padding-left: 35px;"><?=$errorMsg?></td>
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
                                <td class="green-left" style="padding-left: 35px;"><?=$_SESSION['success_msg']?></td>
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
                        <th valign="top">First Name:</th>
                        <td><input type="text" class="inp-form" name="fname" id="fname" value="<?= $fname ;?>" /></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Last name:</th>
                        <td><input type="text" class="inp-form" name="lname" id="lname" value="<?= $lname ;?>"/></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Phone:</th>
                        <td><input type="text" class="inp-form" name="phone" id="phone" value="<?= $phone ;?>" onkeydown="get_phone_pattern(this.value)" maxlength="14"/></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Address:</th>
                        <td><textarea rows="" cols="" class="form-textarea" name="address" id="address"><?= $address ;?>
</textarea></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Email:</th>
                        <td><input type="text" class="inp-form" name="email" id="email" value="<?= $email ;?>"/></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Username:</th>
                        <td><input type="text" class="inp-form" name="username" id="username" value="<?= $username ;?>"/></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required if you wish to change your password.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Old Password:</th>
                        <td><input type="password" class="inp-form" name="old_password" id="old_password" value="<?=$old_password?>" /></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th valign="top">New Password:</th>
                        <td><input type="password" class="inp-form" name="new_password" id="new_password" value="<?=$new_password?>" /></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th valign="top">Confirm Password:</th>
                        <td><input type="password" class="inp-form" name="new_password_again" id="new_password_again" value="<?=$new_password_again?>" /></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th><input type="hidden" name="password" value="<?=$password?>" /></th>
                        <td valign="top"><input type="submit" value="" class="form-submit" />
                          <input type="reset" value="" class="form-reset" />
                        </td>
                        <td></td>
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