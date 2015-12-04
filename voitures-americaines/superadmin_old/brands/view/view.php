<div id="content" >
  <div id="content_main" class="clearfix">
    <div style="width:78%; float:left;">
      <div id="dashboard">
        <table width="100%">
          <tr>
            <td valign="top" style="padding:0 0 6px 0;"><div style="float:left; padding:5px 0 0 0;" class="page_head"><span>Brand Manager</span></div>
              <div style="float:right;"><a href="<?= DEFAULT_ADMIN_URL;?>/brands/add.php"><img src="<?php echo ADMIN_IMAGE_URL; ?>/plus.jpg" align="absmiddle" title="Add New"/></a></div></td>
          </tr>
        </table>
        <div class="site_listing_box">
          <table width="100%">
            <tr>
              <td align="center"><?php

if(isset($_SESSION['msg']) && $_SESSION['msg']!='')

 {

 echo '<font color="#FF0000"><b>'.$_SESSION['msg'].'</b></font>';

 unset($_SESSION['msg']);

 }

?>
              </td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCCCCC" class="display" id="example">
            <thead>
              <tr>
                <th width="28" align="center" valign="top" scope="col"> Sr-No.</th>
                <th width="247" align="center" valign="top" scope="col"> Brand Name </th>
                <th width="209" align="center" valign="top" scope="col"> Logo</th>
                <th width="137" align="center" valign="top" scope="col"> Publish </th>
                <th width="116" align="center" valign="top" scope="col"> Date </th>
                <th width="53" align="center" valign="top" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 

	$i=1;

	if(mysql_num_rows($getBlock)){

	while($fetch=mysql_fetch_object($getBlock)) {  

	?>
              <tr>
                <td align="center" valign="top"><?= $i ;?></td>
                <td align="center" valign="top"><?= $fetch->title ;?></td>
                <td align="center" valign="top"> <?php if($fetch->logo!='') {?>
        	<img src="<?=DEFAULT_ADMIN_URL?>/images/brands/<?=$fetch->logo?>" width="70px" height="70px" />        
        <?php }?>
        
        </td>
                <td align="center" valign="top"><?php
        if($fetch->publish=='yes'){?>
                  <img src="<?= ADMIN_IMAGE_URL;?>/yes.gif" width="16" height="16" alt="edit"  border="0"/>
                  <? } else{ ?>
                  <img src="<?= ADMIN_IMAGE_URL;?>/unpub.gif" width="10" height="10" alt="edit"  border="0"/>
                  <? }?></td>
                <td align="center" valign="top"><?=date(DEFAULT_DATE_FORMAT,$fetch->creation_date)?></td>
                <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="inner_table">
                    <tr>
                      <td align="left" valign="top"><a href="<?= DEFAULT_ADMIN_URL;?>/brands/update.php?brand_id=<?= $fetch->id;?>"><img src="<?= ADMIN_IMAGE_URL;?>/edit.gif" width="16" height="16" alt="Edit This Block"  border="0" title="Edit This Block"/></a></td>
                      <td align="left" valign="top"><a href="?bid=<?= $fetch->id;?>&action=delete" onclick="return confirm('Are you sure you want to delete');"><img src="<?= ADMIN_IMAGE_URL;?>/delete.gif" width="13" height="13" alt="Delete This Block" border="0" title="Delete This Block" /></a></td>
                    
                    </tr>
                  </table></td>
              </tr>
              <? $i++;}}else { ?>
              <tr>
                <td align="center" valign="top" colspan="7"><span class="no_record">No Record Found</span></td>
              </tr>
              <? } ?>
            </tbody>
          </table>
        </div>
      </div>
    </DIV>
    <DIV style="width:18%;float:right;">
      <?php include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu.php");   ?>
    </DIV>
  </div>
</div>
<script type="text/javascript" charset="utf-8">

/* Define two custom functions (asc and desc) for string sorting */

jQuery.fn.dataTableExt.oSort['numeric-asc']  = function(x,y) {

	return ((x < y) ? -1 : ((x > y) ?  1 : 0));

};

jQuery.fn.dataTableExt.oSort['numeric-desc'] = function(x,y) {

return ((x < y) ?  1 : ((x > y) ? -1 : 0));

};

$(document).ready(function() {

/* Build the DataTable with third column using our custom sort functions */

	$('#example').dataTable( {

	"aaSorting": [ [0,'asc'] ],

	"aoColumns": [

	{ "sType": 'numeric' },

	{ "sType": 'numeric' },

	{ "sType": 'numeric' },

	{ "sType": 'numeric' },

	{ "sType": 'numeric' },

	{ "sType": 'numeric' }

    ]

} );

} );

</script>