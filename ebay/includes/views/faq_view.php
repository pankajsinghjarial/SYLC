 <link href="<?php echo DEFAULT_URL; ?>/css/collapse.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo DEFAULT_URL; ?>/js/animatedcollapse.js"></script>

<script type="text/javascript">
animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
	//$: Access to jQuery
	//divobj: DOM reference to DIV being expanded/ collapsed. Use "divobj.id" to get its ID
	//state: "block" or "none", depending on state
}

animatedcollapse.init()
</script>
 
  <div class="main_middle">
    <div class="middle">
     <div class="middle_two">
          <div class="bread-crumbs">
					<ul class="brb-ul">
						<li><a href="<?php echo DEFAULT_URL; ?>"><img
								src="/images/car-icon.png" alt=""> </a></li>
						<li><a href="<?php echo DEFAULT_URL; ?>/faq">FAQ</a></li>
					</ul>
				</div>
      <div class="middle_two_mid_announces"> <span class="annonces_bold" ><?php  echo $faqtext->name; ?></span><br/><br/>
      <div class="word"><?php  //echo $faqtext->desc; ?></div>
 <div class="value_Propositions">
 <?php while($faqval = mysql_fetch_object($faq)) { ?>
 <div class="expand_collapse">
<div class="collapse">
<div class="collapse_title"><h5><?php echo $faqval->question; ?></h5>   
  <a href="#" rel="toggle[<?php echo $faqval->id; ?>]" title="<?php echo DEFAULT_URL; ?>/images/collapse2.jpg" rev="<?php echo DEFAULT_URL; ?>/images/expand-2.jpg"><img src="<?php echo DEFAULT_URL; ?>/images/collapse2.jpg" alt="collapse" border="0" /></a> </div>
  
<div id="<?php echo $faqval->id; ?>" style="display:block;">
<div class="collapse_container">
<div class="collapse_inner">
<p>
<?php echo $faqval->answer; ?>
</p>
 </div>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
<script type="text/javascript">
animatedcollapse.addDiv('<?php echo $faqval->id; ?>', 'fade=0,speed=400,group=planetweb,persist=1,hide=1')
</script>
<?php } ?>
 </div>     
<div class="clear"></div>
</div>
 <?php  include(LIST_ROOT."/includes/views/staticsidebar.php"); ?>
</div>
 <?php  include(LIST_ROOT."/includes/views/bottom_strip.php"); ?>
</div></div>