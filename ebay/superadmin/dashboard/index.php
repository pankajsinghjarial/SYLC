<?php

/********************************************************************/
	# Main home page of admin
	include_once('../../conf/config.inc.php');
	if(!$loginCheck->isLoggedIn()){
		echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/login/login.php";</script>';
		exit;
	} 
    include_once(LIST_ROOT_ADMIN.'/dashboard/code/index_code.php');
/********************************************************************/
	include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_header.php");
	
?>
<!-- start content-outer ........................................................................................................................START -->

<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Administrator Panel</h1>
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
            <!--  start table-content  -->
            <div id="table-content">
              <!--  start message-blue -->
              <div id="message-blue">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="blue-left">Welcome <?php echo $_SESSION['userName']; ?>. <a href="<?php echo DEFAULT_ADMIN_URL; ?>/settings/index.php">My account</a> </td>
                    <td class="blue-right"><a class="close-blue"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_blue.gif"   alt="" width="55" height="35"/></a></td>
                  </tr>
                </table>
              </div>
              <!--  end message-blue -->
              <!--  start message-yellow -->
              <div id="message-yellow">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="yellow-left">Last Login on &raquo; <?php echo date('F j, Y, g:i a',strtotime($adminDetails->last_login)); ?></td>
                    <td class="yellow-right"><a class="close-yellow"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_yellow.gif"  width="55" height="35" alt="" /></a></td>
                  </tr>
                </table>
              </div>
              <!--  end message-yellow -->
              <!--  start message-green -->
              <div id="message-green">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="green-left">You Have Total <?php echo $totalPages; ?> <a href="<?php echo DEFAULT_ADMIN_URL; ?>/page/index.php">Pages</a>.</td>
                    <td class="green-right"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_green1.gif" width="55" height="35"  alt="" /></td>
                  </tr>
                </table>
              </div>
              <!--  end message-green -->
              <div id="related-activities">
		
		<!--  start related-act-top -->
		<div id="related-act-top">
		Recent Pages
		</div>
		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<div id="related-act-bottom">
		
			<!--  start related-act-inner -->
			<div id="related-act-inner">
				<?php while($enq = mysql_fetch_object($latestpage)) { ?>
                <div class="right">
					<h5><?php echo $enq->name; ?></h5>
					<?php 
					if(strlen($enq->desc) >400) {
					echo strip_tags(substr($enq->desc,0,400))."...."; }
					else { echo strip_tags($enq->desc);} ?>
					<ul class="greyarrow">
						<li><a href="<?php echo DEFAULT_ADMIN_URL; ?>/page/edit.php?id=<?php echo $enq->id; ?>">Click here to visit</a></li> 
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				<?php } ?>
				<div class="clear"></div>
				
			</div>
			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>
		<!-- end related-act-bottom -->
	
	</div>
                 <!--  start message-green -->
              <div id="message-blue1">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="blue-left">You Have Total <?php echo $totalCars; ?> <a href="<?php echo DEFAULT_ADMIN_URL; ?>/car/index.php">Cars</a>.</td>
                    <td class="blue-right"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_blue1.gif" width="55" height="35"  alt="" /></td>
                  </tr>
                </table>
              </div>
              <div id="related-activities">
		
		<!--  start related-act-top -->
		<div id="related-act-top">
		Latest 5 Cars
		</div>
		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<div id="related-act-bottom">
		
			<!--  start related-act-inner -->
			<div id="related-act-inner">
			<?php while($cars = mysql_fetch_object($latestcars)) { ?>
			<div class="right">
 <?php		$name = $objCommon->customQuery("select value from car_varchar where car_id='".$cars->car_id."' and attribute_id = '22'");
 $carname = mysql_fetch_object($name);
 ?>
                	<h5><?php echo $carname->value; ?></h5>
					<?php 
					$feature = $objCommon->customQuery("select value from car_text where car_id='".$cars->car_id."' and attribute_id = '5'");
 $fullfeature = mysql_fetch_object($feature);
					echo $objCommon->getFeatureForListing($fullfeature->value,12);
					?>
					<ul class="greyarrow">
					<li><a href="<?php echo DEFAULT_ADMIN_URL; ?>/car/view.php?id=<?php echo $cars->car_id; ?>">Click here to visit</a></li> 
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
					<?php } ?>		
			</div>
			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>
		<!-- end related-act-bottom -->
	
	</div>
              <!--  end message-green -->
	<?php if($totalContact > 0 ) { ?>
         <div id="message-yellow1" style="padding-top:7px;">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                  <tr>
				<td class="yellow-left">You Have Total <?php echo $totalContact ; ?> <a href="<?php echo DEFAULT_ADMIN_URL; ?>/contact/general/index.php">Enquiries</a>.</td>
                <td class="yellow-right"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_yellow1.gif"  width="55" height="35" alt="" /></td>
                  </tr>
                </table>
              </div>
         <div id="related-activities">
		
		<!--  start related-act-top -->
		<div id="related-act-top">
		Recent Enquiries
		</div>
		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<div id="related-act-bottom">
		
			<!--  start related-act-inner -->
			<div id="related-act-inner">
				<?php while($enq = mysql_fetch_object($latestenquiry)) { ?>
                <div class="right">
					<h5><?php echo $enq->name; ?></h5>
					<?php 
					if(strlen($enq->message) >400) {
					echo substr($enq->message,0,400)."...."; }
					else { echo $enq->message;} ?>
					<ul class="greyarrow">
						<li><a href="<?php echo DEFAULT_ADMIN_URL; ?>/contact/view.php?id=<?php echo $enq->id; ?>">Click here to visit</a></li> 
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				<?php } ?>
				<div class="clear"></div>
				
			</div>
			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>
		<!-- end related-act-bottom -->
	
	</div>
           
        <?php } ?>          
   <div class="clear"></div>
          </div>
          <!--  end content-table-inner ...................END  -->
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
<!--  end content-outer...........................END -->
<?php include(LIST_ROOT_ADMIN_INCLUDES."/views/admin_footer.php");   ?>
