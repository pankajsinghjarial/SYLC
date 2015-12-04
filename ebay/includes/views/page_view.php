  <div class="main_middle">
    <div class="middle">
     <div class="middle_two">
     <img class="top_page_banner" src="<?php echo DEFAULT_URL."/images/banner/banner_02_988x166.jpg"?>" alt="<?php  echo $terms->name; ?>"/>
     
     <div class="bread-crumbs">
		 <ul class="brb-ul">
		 	<li><a href="<?php echo DEFAULT_URL; ?>"><img src="/images/car-icon.png" alt=""></a></li>
		    <li><a href="<?php echo DEFAULT_URL; ?>/page/<?php echo $terms->slug; ?>" class="bread-cus-active"><?php  echo $terms->name; ?></a></li>
		 </ul>
 	</div>
     
     <div class="inner_page_one">
        <div class="inner_page_content_area">
        <div class="inner_page_content_area_top">&nbsp;</div>
        <div class="head_1"><?php  echo $terms->name; ?></div>
        <div class="qui_txt_area"><?php  echo $terms->desc; ?>
          <?php
          	if($terms->id == 50){
				 include(LIST_ROOT."/includes/views/calculator.php");
			}
		  ?></div>
          <div class="inner_page_content_area_bottom">&nbsp;</div>
        </div>
        
        
        <div class="clear"></div>
      </div>   
 <?php  include(LIST_ROOT."/includes/views/staticsidebar.php"); ?>
</div>
 <?php  include(LIST_ROOT."/includes/views/bottom_strip.php"); ?>
</div></div>