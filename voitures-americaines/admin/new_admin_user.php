<?php //require_once '../conf/config.inc.php'; ?>



<form method="post" action="<?php echo DEFAULT_ADMIN_URL?>/new_admin_user_code.php"  name = "new_user_name" id="idForm" >

 <input class="input" name="user_id" id="userid" value="" type="hidden" />
<li>
                <span class="left_text">User Name :</span>
                <input class="input" name="username1" id="username1" value="" type="text" />
              </li>
              <li>
                <span class="left_text">Password :</span>
                <input class="input" name="password1" id="password1" value="" type="password" />
              </li>
             <li>
                <span class="left_text">Re-enter Password :</span>
                <input class="input" name="reenterpassword" id="reenterpassword" value="" type="password"/>
              </li>
              <li>
             <span class="left_text">Email :</span>
                <input class="input" name="emailid1" id="emailid1" value="" type="text" />
              </li>
              
              <li>
                <span class="left_text">User Access :</span>
                <div class="accessoptions newusercheck">
                <input type="checkbox" name="check[]" value="gallerymanager" id="gallerymanager" class="info_chkbx">Gallery Manager<br>
                <input type="checkbox" name="check[]" value="upsellmanager" id="upsellmanager" class="info_chkbx">Upsell Manager<br>
                <input type="checkbox" name="check[]" value="feesmanager" id="feesmanager" class="info_chkbx">Fees Manager<br>
                <input type="checkbox" name="check[]" value="statusmanager" id="statusmanager" class="info_chkbx">Status Manager<br>
                <input type="checkbox" name="check[]" value="clientinformation" id="clientinformation" class="info_chkbx">Information Of Clients<br>
                <input type="checkbox" name="check[]" value="pdfaddress" id="pdfaddress" class="info_chkbx">Pdf Address
             </div>
              </li>
              
              
              <li class="last1">
            <input type="hidden" value="" name="id" id="userid1"/>
                 <input type="hidden" value="admin" name="role"/>
                 <input class="order_now_bt" type="submit" value="Submit" name="submit" >
              
                <input class="order_now_bt" type="button" value="Cancel" name="Cancel" onclick=" window.location = '<?php echo DEFAULT_ADMIN_URL?>/user_info.php' "/>
              </li>
              
              
              </form>
              
              
<script type="text/javascript">
    var frm = '#idForm';
    $(frm).submit(function () {
        $.ajax({
            type: $(frm).attr('method'),
            url: '<?php echo DEFAULT_ADMIN_URL?>/ajax.php',
            data: $(frm).serialize(),
            success: function (data) {
           	 var r = $.parseJSON(data);
    		 if (r.error == 0) {		
    			 location.href= '<?php echo DEFAULT_ADMIN_URL ?>/admin_user_listing.php';
    		 } else {
    		 alert(r.message);
    		 return false;
    		 }
            
            }
        });

        return false;
    });
</script>
          