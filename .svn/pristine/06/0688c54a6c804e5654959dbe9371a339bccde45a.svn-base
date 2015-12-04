<div id="content" >
  <div id="content_main" class="clearfix">
    <div style="width:78%; float:left;">
      <div id="dashboard">
        <table width="100%">
          <tr>
            <td valign="top" style="padding:0 0 6px 0;"><div style="float:left; padding:5px 0 0 0;" class="page_head"><span>Member Management Section</span></div>
              <div style="float:right;"><a href="<?= DEFAULT_ADMIN_URL;?>/members/add.php"><img src="<?php echo ADMIN_IMAGE_URL; ?>/plus.jpg" align="absmiddle" title="Add New"/></a></div></td>
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
                <th width="147" align="center" valign="top" scope="col"> Name </th>
                <th width="209" align="center" valign="top" scope="col"> Sirname </th>
                <th width="213" align="center" valign="top" scope="col"> City </th>
                <th width="213" align="center" valign="top" scope="col"> State </th>
                <th width="137" align="center" valign="top" scope="col"> Publish </th>
                <th width="116" align="center" valign="top" scope="col"> Date </th>
                <th width="53" align="center" valign="top" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 

	$i=1;

	if(mysql_num_rows($getProduct)){

	while($fetch=mysql_fetch_object($getProduct)) {  

	?>
              <tr>
                <td align="center" valign="top"><?= $i ;?></td>
                <td align="center" valign="top"><?= $fetch->name ;?></td>
                <td align="center" valign="top"><img src="<?= DEFAULT_ADMIN_URL;?>/members/upload/<?= $fetch->logo ;?>" width="77" height="57" alt="edit"  border="0"/></td>
                <td align="center" valign="top"><?=  $obj_product->getNameById(TBL_CATEGORY, 'id ='.$fetch->cat_id)  ;?></td>
                <td align="center" valign="top"><?=  $obj_product->getNameById(TBL_SUBCATEGORY, 'id ='.$fetch->sub_cat_id)  ;?></td>
                <td align="center" valign="top"><?php

        if($fetch->publish==1){?>
                  <img src="<?= ADMIN_IMAGE_URL;?>/yes.gif" width="16" height="16" alt="edit"  border="0"/>
                  <? } else{ ?>
                  <img src="<?= ADMIN_IMAGE_URL;?>/unpub.gif" width="10" height="10" alt="edit"  border="0"/>
                  <? }?></td>
                <td align="center" valign="top"><?= date("m-d-Y",$fetch->creation_date)  ; ?></td>
                <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="inner_table">
                    <tr>
                      <td align="left" valign="top"><a href="<?= DEFAULT_ADMIN_URL;?>/members/product_update.php?prod_id=<?= $fetch->id;?>"><img src="<?= ADMIN_IMAGE_URL;?>/edit.gif" width="16" height="16" alt="Edit Product"  border="0" title="Edit Product"/></a></td>
                      <td align="left" valign="top"><a href="<?= DEFAULT_ADMIN_URL;?>/members/addimage.php?pid=<?= $fetch->id;?>"><img src="<?= ADMIN_IMAGE_URL;?>/addimage.png" width="16" height="16" alt="Add More Images" border="0" title="Add More Images" /></a></td>
                      
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