<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo DEFAULT_ADMIN_URL; ?>/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		height : "350",
		editor_selector : "myTextEditor",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		//content_css : "css/content.css",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],
			file_browser_callback : 'myFileBrowser'

	});
	
	function myFileBrowser (field_name, url, type, win) {

    // alert("Field_Name: " + field_name + "nURL: " + url + "nType: " + type + "nWin: " + win); // debug/testing

    /* If you work with sessions in PHP and your client doesn't accept cookies you might need to carry
       the session name and session ID in the request string (can look like this: "?PHPSESSID=88p0n70s9dsknra96qhuk6etm5").
       These lines of code extract the necessary parameters and add them back to the filebrowser URL again. */

    var cmsURL = window.location.toString();    // script URL - use an absolute path!
    if (cmsURL.indexOf("?") < 0) {
        //add the type as the only query parameter
        cmsURL = cmsURL + "?type=" + type;
    }
    else {
        //add the type as an additional query parameter
        // (PHP session ID is now included if there is one at all)
        cmsURL = cmsURL + "&type=" + type;
    }

    tinyMCE.activeEditor.windowManager.open({
        file : "<?php echo DEFAULT_ADMIN_URL?>/js/tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
        title : 'My File Browser',
        width : 620,  // Your dimensions may differ - toy around with them!
        height : 400,
        resizable : "yes",
        inline : "yes",  // This parameter only has an effect if you use the inlinepopups plugin!
        close_previous : "no"
    }, {
        window : win,
        input : field_name
    });
    return false;
  }
  
  //function to check if slug and meta title field is empty wo filled
  //if empty then we are filling page title value in these 2 fields at onblur of page title
  function setSlug(){
  
		var inp = $("#slug").val();
		if($.trim(inp).length == 0)
		{
				var value = $('#name').val();
      			$("#slug").val(value);
		 }
		 
		var inp = $("#metatitle").val();
		if($.trim(inp).length == 0)
		{
				var value = $('#name').val();
      			$("#metatitle").val(value);
		 }
		 
  }
</script>
<!-- /TinyMCE -->

<div id="content-outer">
  <!-- start content -->
  <div id="content">
  <div id="page-heading">
  <div style="text-align:right">
  <a href="<?php echo DEFAULT_URL?>/send_reminder.php"/><img src="<?php echo  DEFAULT_URL?>/superadmin/images/forms/reminder.png" alt="Send Reminder"  /></a>
  </div></div>
    <div id="page-heading">
      <h1>Edit Template</h1>
    </div>
    <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" name="account_form" id="account_form">
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
						} ?>
                        </td>
                      </tr>
                       <tr>
                        <td colspan="3" valign="top"><font size="2" color="#FF0000" family="verdana">Please Don't Remove Keywords Written in Captial Letters in Template Section.</font>
</td>
                        
                      </tr>
                        <tr>
                        <th valign="top">From Email:</th>
                        <td><input type="text" class="inp-form" name="email" id="email" value="<?php echo $email ;?>" /></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Subject:</th>
                        <td><input type="text" class="inp-form" name="subject" id="subject" value="<?php echo $subject ;?>" /></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Mail to be Sent:</th>
                        <td>
                        <select name="next_date" class="select-form">
                        <option value="daily" <?php if($next_date == 'daily'){?> selected="selected" <?php } ?>>Daily</option>
                        <option value="weekly" <?php if($next_date == 'weekly'){?> selected="selected" <?php } ?>>Weekly</option>
                        </select>
                        </td>
                        </tr>
                      <tr>
                        <th valign="top">Template:</th>
                        <td><textarea rows="" cols="" class="form-textarea myTextEditor" name="template" id="template"><?php echo $template ;?></textarea></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                     
                      <tr>
                        <th>&nbsp;</th>
                        <td valign="top">
                        <input type="submit" value="" class="form-submit" />
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
		<?php if(isset($_REQUEST['searchtext']) and $_REQUEST['searchtext']!=''){  ?>
        <input type="hidden" name="searchtext" id="searchtext" value="<?php echo $_REQUEST['searchtext'];?>" />
        <?php } ?>
        <?php if(isset($_REQUEST['searchcombo']) and $_REQUEST['searchcombo']!=''){  ?>
        <input type="hidden" name="searchcombo" id="searchcombo" value="<?php echo $_REQUEST['searchcombo'];?>" />
        <?php } ?>

    </form>
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
