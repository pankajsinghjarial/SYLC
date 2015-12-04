<?php
/**
 * Template Name: les-affaires-du-moment
 
 */
get_header(); ?>

<!-- inner_container start -->
<div class="inner_container">
  <div class="inner_banner1">
    <div class="wrapper">
      <div class="big_title">Les affaires du moment!</div>
      <div class="wrapper_indent">
        <?php get_sidebar(left);?>
        <div class="containt_indent">
  <?php while ( have_posts() ) : the_post(); ?>
     <?php the_content(); ?>
	 <?php endwhile;?>
          <div class="contact_outer contact_outer011">
          <div class="form_outer">
          
          <?php echo do_shortcode('[contact-form-7 id="292" title="Les affaires du moment!"]'); ?>
          
          </div>
          </div>
        
        </div>

<?php  get_sidebar(); ?>       
<?php get_footer(); ?>

