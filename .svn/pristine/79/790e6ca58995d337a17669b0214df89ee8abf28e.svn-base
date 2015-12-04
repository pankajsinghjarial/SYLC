<?php
/**
 * Template Name: logistique
 
 */
get_header(); ?>

<!-- inner_container start -->
<div class="inner_container">
  <div class="inner_banner1">
    <div class="wrapper">
      <div class="big_title"><?php the_title(); ?> </div>
      <div class="wrapper_indent">
         <?php get_sidebar(left);?>
        <div class="containt_indent">
        

              <?php while ( have_posts() ) : the_post(); ?>
     <?php the_content(); ?>
	 <?php endwhile;?>
           
               <?php echo do_shortcode( '[types field="more" class="" style=""][/types]' ) ?> 
               
          	
       </div>
        
 <?php get_sidebar(right); ?>
	</div>
    </div>
  </div>
</div>
<!-- inner_container end -->
<div class="clear"></div>   
<?php get_footer(); ?>

