<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo DEFAULT_ADMIN_URL; ?>/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script src="<?php echo DEFAULT_ADMIN_URL; ?>/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
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


var prevId='';
var prevTabId='';
function tabbing(tdId,id){
	if(prevId == ''){
		prevId = $("#car_tabs li:first");
		prevTabId = "general_tab";
		
		$(prevId).removeClass("active");
		$(id).addClass("active");
		$("#"+prevTabId).addClass("tab_zero_height");
		$("#"+tdId).removeClass("tab_zero_height");
	}
	else if( prevTabId != tdId ){
		$(prevId).removeClass("active");
		$(id).addClass("active");
		$("#"+tdId).removeClass("tab_zero_height");
		$("#"+prevTabId).addClass("tab_zero_height");
		
	}
	prevId=id;
	prevTabId=tdId;
}
$(function() {
      $("input.file_1").filestyle({ 
          image: "<?php echo ADMIN_IMAGE_URL; ?>/forms/upload_file.gif",
          imageheight : 29,
          imagewidth : 78,
          width : 300
      });
  	});
/*$(document).ready(function() {    
    var maxHeight = 0;
	$('#tabbed div').each(function() { maxHeight = Math.max(maxHeight, $(this).find("table").height()); $(this).addClass("table"); });
    $('#tabbed').css("min-height", maxHeight+"px");  
});*/

function getOther(id){
	if($(id).val() == 'other'){
		$(id).next().show();
	}
	else{
		$(id).next().hide();
	}
}

function remove_error(id){
	$(id).parent().append('<span style="color:red;">*</span>');
	$(id).remove();
}
</script>
<!-- /TinyMCE -->

<div id="content-outer"> 
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>Add New Car</h1>
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
                  <td id="tabbed_td"><ul id="car_tabs">
                      <li class="active" onclick="tabbing('general_tab',this);"><span>General</span><?php if(isset($error_tab1)) {?><span class="error">&nbsp;</span><?php }?></li>
                      <li onclick="tabbing('images_tab',this);"><span>Images</span><?php if(isset($error_tab2)) {?><span class="error">&nbsp;</span><?php }?></li>
                      <li onclick="tabbing('info_p1_tab',this);"><span>Information Part 1</span><?php if(isset($error_tab3)) {?><span class="error">&nbsp;</span><?php }?></li>
                      <li onclick="tabbing('info_p2_tab',this);"><span>Information Part 2</span><?php if(isset($error_tab4)) {?><span class="error">&nbsp;</span><?php }?></li>
                      <!--<li onclick="tabbing('dealer_tab',this);"><span>Dealer</span></li>-->
                    </ul></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><!-- start id-form -->
                    
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%" style="position:relative;">
                      <tr>
                        <td colspan="3"><?php if(isset($errorMsges)) {?>
                         
                          <script type="text/javascript">
						  	$(document).ready(function() {
						  <?php 
						  	$errorArr = explode("<br>", $errorMsges);
							foreach($errorArr as $errLine){
								$error = explode("%%", $errLine); ?>
                                $("#<?php echo $error[1]?>").parent().append('<span class="show_error" onmouseover="remove_error(this);"><?php echo $error[0]?></span>');	
                          <?php } ?>
							});
                         </script>
                         <?php } else if(isset($errorMsg)) {?>
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
                        <td colspan="3" id="tabbed">
                            <?php 
								$postArr = $formObj->getCar($_GET[id]);
								
								$fileArr = $postArr[images];
								unset($postArr[images]);
								/*echo "<pre>";
								print_r($postArr);
								print_r($fileArr);
								echo "</pre>";*/
								
								$formObj->buildFormElements($postArr, $fileArr);
							  ?>
                          </td>
                      </tr>
                      <tr>
                        <th>&nbsp;</th>
                        <td valign="top"><input type="submit" class="form-submit" name="submit" value="">
                          <input type="reset" class="form-reset">
                        </td>
                        <td></td>
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