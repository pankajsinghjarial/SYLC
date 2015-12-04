<div id="content">
  <div id="content_main" class="clearfix" style="float:left">
    <div style="width:78%; float:left;">
      <div id="dashboard">
        <table width="100%">
          <tr>
            <td valign="top" style="padding:0 0 6px 0;"><div style="float:left; padding:5px 0 0 0;" class="page_head"><span>User Info Manager</span></div>
              <div style="float:right;"></div></td>
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
                <th align="center" valign="top" scope="col"> Name </th>
                <th align="center" valign="top" scope="col"> First name</th>
                <th align="center" valign="top" scope="col"> Email </th>
                <th align="center" valign="top" scope="col"> Phone </th>
                <th align="center" valign="top" scope="col">Car Brand</th>
                <th align="center" valign="top" scope="col"> Model </th>
                <th align="center" valign="top" scope="col"> Year</th>
                <th align="center" valign="top" scope="col"> Service </th>
                <th align="center" valign="top" scope="col"> Date </th>
                <th align="center" valign="top" scope="col">Remove</th>                
              </tr>
            </thead>
            <tbody>
              <?php 

	$i=1;

	if(mysql_num_rows($getBlock)){

	while($fetch=mysql_fetch_object($getBlock)) {  

	?>
              <tr>
                <td align="center" valign="top"><?= $fetch->name ;?></td>
                <td align="center" valign="top"><?= $fetch->first_name ;?></td>
                <td align="center" valign="top"><?= $fetch->email ;?></td>
                <td align="center" valign="top"><?= $fetch->phone ;?></td>
                
                <td align="center" valign="top"><?php $cbrand=$fetch->car_brand;$sel_query2="Select car_brand from car_brand WHERE id=".$cbrand; $rs_sel2=mysql_query($sel_query2); $car_bname = mysql_fetch_array($rs_sel2); echo $car_bname['car_brand']; ?></td>
                
                
                <td align="center" valign="top"><?php $mod = $fetch->model; $sel_query1="Select model from model WHERE id=".$mod; $rs_sel1=mysql_query($sel_query1); $mod_value = mysql_fetch_array($rs_sel1); echo $mod_value['model'];  ?></td>
                
                
                <td align="center" valign="top"><?= $fetch->year ;?></td>
                <td align="center" valign="top"><?= $fetch->service ;?></td>
                <td align="center" valign="top"><?=date(DEFAULT_DATE_FORMAT,strtotime($fetch->created_at))?></td>
                <td align="center" valign="top"> <a href="?bid=<?= $fetch->id;?>&action=delete" onclick="return confirm('Are you sure you want to delete');"><img src="<?= ADMIN_IMAGE_URL;?>/delete.gif" width="13" height="13" alt="Delete This Block" border="0" title="Delete This Block" /></a></td>
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
    </div>

    <div style="width:18%;float:right;">
      <?php include(LIST_ROOT_ADMIN_INCLUDES."/views/right_menu.php");   ?>
    </div>
    </div>
    </div>
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
	
	{ "sType": 'numeric' },

	{ "sType": 'numeric' },

	{ "sType": 'numeric' },

	{ "sType": 'numeric' }

    ]

} );

} );

</script>