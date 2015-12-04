<?php
/**
 * Template Name: car show
 
 */
get_header(); ?>

<!-- inner_container start -->
<div class="inner_container">
  <div class="inner_banner1">
    <div class="wrapper">
      <div class="big_title">Car Show</div>
      <div class="wrapper_indent">
       <?php get_sidebar(left);?>
        <div class="containt_indent">
        <div class="car_show_indent">
        <?php echo do_shortcode( '[types field="images-miniatures" class="" style=""][/types]' ) ?> 
        </div>
           <?php while ( have_posts() ) : the_post(); ?>
     <?php the_content(); ?>
	 <?php endwhile;?>
        </div>
        
 <?php get_sidebar(); ?>    
<?php get_footer(); ?>

