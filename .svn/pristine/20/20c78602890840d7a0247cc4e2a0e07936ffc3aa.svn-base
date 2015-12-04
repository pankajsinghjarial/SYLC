<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Email Log Manager</h1>
    </div>
    <!-- end page-heading -->
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
        <td><!--  start content-table-inner ...................................................................... START -->
          <div id="content-table-inner">
            <!--  start table-content -->
            <div id="table-content">
              <!--  start product-table ..................................................................................... -->
              <form id="mainform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                  <thead>
                    <tr>
                      <th class="deletemessage"> 
					  <?php if($total_rows > 0){
					  
                      			echo 'Are you sure, You want to delete these pages? - '.$pageName;
                                
                           }else{
					  
					  			echo $pageName;
					  		}	 
					  ?>
                      </th>
                    </tr>
                    <tr>
                      <th valign="top">
                        <input type="hidden" value="<?php echo $totalIds;?>" name="pageid" />
                        <input type="hidden" value="delete" name="action" />
                        <input type="submit" value="" class="form-submit" />
                        <input type="button" value="" class="form-reset" onclick="javascript:location.href='index.php';"/>
						<?php if(isset($_POST['searchtext']) and $_POST['searchtext']!=''){  ?>
                        <input type="hidden" name="searchtext" id="searchtext" value="<?php echo $_POST['searchtext'];?>" />
                        <?php } ?>
                        <?php if(isset($_POST['searchcombo']) and $_POST['searchcombo']!=''){  ?>
                        <input type="hidden" name="searchcombo" id="searchcombo" value="<?php echo $_POST['searchcombo'];?>" />
                        <?php } ?>
                      </th>
                    </tr>
                  </thead>
                </table>
                <!--  end product-table................................... -->
              </form>
            </div>
            <!--  end content-table  -->
            <div class="clear"></div>
          </div>
          <!--  end content-table-inner ............................................END  -->
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
<!--  end content-outer........................................................END -->
<div class="clear">&nbsp;</div>