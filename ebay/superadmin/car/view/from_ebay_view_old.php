<!-- start content-outer ........................................................................................................................START -->
<SCRIPT language="javascript">
$(function(){
 
    // add multiple select / deselect functionality
    $("#selectall").click(function () {
          $('.case').attr('checked', this.checked);
    });
 
    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".case").click(function(){
 
        if($(".case").length == $(".case:checked").length) {
            $("#selectall").attr("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }
 
    });
});

</SCRIPT>
<script type="text/javascript" id="js">
$(document).ready(function()
{ 
	// call the tablesorter plugin 
	$("#product-table").tablesorter({ 
        // pass the headers argument and assing a object 
        headers: { 
            // assign the secound column (we start counting zero) 
            0: { 
                // disable it by setting the property sorter to false 
                sorter: false 
            },
			2: { 
                // disable it by setting the property sorter to false 
                sorter: false 
            },
			            // assign the third column (we start counting zero) 
            4: { 
                // disable it by setting the property sorter to false 
                sorter: false 
            } 
        } 
    }); 
});


function checkBoxChecked(){
		var atLeastOneIsChecked = $('input[name="allselect[]"]:checked').length;
		if(atLeastOneIsChecked == 0){
			alert('Please select atleast one record.');
			return false;
		}else{
			var r = confirm('Are you sure you want to delete.');
			if(r == true) { 
			$('#mainform').submit();
			return true;}
			else {return false; }
		}
}

function checkBoxCheckedForEdit(){
		var onlyOneIsChecked = $('input[name="allselect[]"]:checked').length;
		if(onlyOneIsChecked == 0){
			alert('Please select atleast one record.');
			return false;
		}else{
				if(onlyOneIsChecked > 1){
					alert('Please select only one record to edit.');
					return false;
				}else{
					var checkedValue = $('input[name="allselect[]"]:checked').val();
					location.href	 = 'edit.php?id='+checkedValue;
					return true;
				}
		}
}

</script>
<?php
	if(isset($_REQUEST['searchcar']) and !isset($_REQUEST['start'])) {
			$addToPagging = 'car='.$car.'&searchcar='.$_REQUEST['searchcar'].'&searchattr='.$_REQUEST['searchattr'].'&submitcar=Search';
	}else if(isset($_REQUEST['searchcar']) and isset($_REQUEST['start'])) {
			$addToPagging = 'car='.$car.'&searchcar='.$_REQUEST['searchcar'].'&searchattr='.$_REQUEST['searchattr'].'&submitcar=Search';
	}else if(isset($_REQUEST['car']) and !isset($_REQUEST['start'])){
			$addToPagging = '&car='.$_REQUEST['car'];
	}else if(isset($_REQUEST['car']) and isset($_REQUEST['start'])){
			$addToPagging = '&car='.$_REQUEST['car'];
	}
			
?>

<div id="content-outer"> 
  <!-- start content -->
  <div id="content"> 
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Car List From Ebay</h1>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
        <table style="float:right">
          <tr>
            <td><input class="inp-form" type="text" name="searched" id="searched" value="<?php echo $searched;?>" /></td>
            <td>
            <input class="form-submit" type="submit" name="submitcar" id="submitcar" value="Search"/></td>
          </tr>
        </table>
      </form>
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

                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" class="tablesorter">
                  <thead>
                    <tr>
                      <?php /*?><th width="5%" class="table-header-check"><input type="checkbox" id="selectall" /> </th><?php */?>
                      <th width="5%" class="table-header-repeat line-left"><a href="javascript:void(0)">Item ID</a> </th>
                      <th width="10%" class="table-header-repeat line-left"><a href="javascript:void(0)">Image</a></th>
                      <th width="35%" class="table-header-repeat line-left"><a href="javascript:void(0)">Car Name</a></th>
                      <th width="10%" class="table-header-repeat line-left"><a href="javascript:void(0)">End Time</a></th>
                      <th width="10%" class="table-header-repeat line-left"><a href="javascript:void(0)">Price</a></th>
                      <th width="5%" class="table-header-repeat line-left"><a href="javascript:void(0);">Options</a></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
				  if($total_rows > 0){
				  $ii =1;
				   while($item = mysql_fetch_object($resp)) {
					
					$itemId = $item->itemId;
					$title = $item->title;
					$buyItNowPrice = $item->buyItNowPrice;
					$time = convertTimeLeft($item->endTime);				
					$link = DEFAULT_URL."/ebayview.php?carid=".$itemId;
					
					$spec = explode("~",$item->stdequip);
					foreach($spec as $spex){
						$spexs = explode("^",$spex)	;
						$specs[$spexs[0]] = $spexs[1]; 
					}
					
					$galleryURL = array_shift(explode("**",$item->galleryURL));
					if($galleryURL == ''){
						$galleryURL = LIST_ROOT."/images/default.jpg";
					}
					?>
                    <tr <?php if($ii%2==0) echo 'class="alternate-row"';?>>
                      <td><?php echo $itemId;?></td>
                      <td><img alt="<?php echo $title;?>" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $galleryURL; ?>&newWidth=87&newHeight=54" width="87" height="54"></td>
                      <td><?php echo $title;?></td>
                      <td><?php echo $time;?></td>
                      <td>$<?php echo number_format($buyItNowPrice, 2);?></td>
                      <td><a href="<?php echo $link;?>" title="View In Front" class="icon-3 info-tooltip" target="_blank"></a></td>
                    </tr>
                    <?php $ii++; 
				 	  } 
					 }else{
				  ?>
                    <tr>
                      <th colspan="6" style="text-align:center;">No record found.</th>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div>
            <?php if($total_rows > 0){?>
            <!--  end content-table  --> 
            <!--  start paging..................................................... -->
            <table border="0" cellpadding="0" cellspacing="0" id="paging-table">
              <tr>
                 <td>
                 <?php
					echo $pages->display_pages();
				 ?>
                 </td>
                <td><form method="get" action="<?php echo $page_name;?>" name="pageform">
                    <select class="styledselect_pages" name="limit_combo">
                      <option value="">Number of rows</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                    </form></td>
              </tr>
            </table>
            <?php }?>
            <!--  end paging................ -->
            <div class="clear"></div>
          </div>
          
          <!--  end content-table-inner ............................................END  --></td>
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
