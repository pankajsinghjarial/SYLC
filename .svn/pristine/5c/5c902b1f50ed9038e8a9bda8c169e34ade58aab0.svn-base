<!-- TinyMCE -->

<script type="text/javascript">
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

/*$(document).ready(function() {    
    var maxHeight = 0;
	$('#tabbed div').each(function() { maxHeight = Math.max(maxHeight, $(this).find("table").height()); $(this).addClass("table"); });
    $('#tabbed').css("min-height", maxHeight+"px");  
});*/

</script>
<!-- /TinyMCE -->

<div id="content-outer"> 
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>Add New Car</h1>
    </div>
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
                      <li onclick="tabbing('dealer_tab',this);"><span>Dealer</span></li>
                    </ul></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><!-- start id-form -->
                    
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%" style="position:relative;">
                      <tr>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="3" id="tabbed">
                            <?php 
								$formObj->viewCar($id);
							  ?>
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
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>