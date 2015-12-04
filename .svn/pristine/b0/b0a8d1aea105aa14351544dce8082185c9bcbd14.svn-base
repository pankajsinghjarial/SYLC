<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>





 <?php if ( 'latest-news' == get_post_type() ) { ?>

	<div class="inner_container">
  <div class="inner_banner1">
    <div class="wrapper">
       <div class="big_title">Latest News</div>
      <div class="wrapper_indent">
        <div class="container_left">
          <div class="containt_nav">
          <?php
             $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      
      ?>
            <ul>
              <li<?php if($url == get_permalink(20)) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_permalink(20); ?>" >News</a></li>
              <li<?php if($url == get_permalink(89)) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_permalink(89); ?>" >Les affaires du moment!</a></li>
              <li<?php if($url == get_permalink(100)) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_permalink(100); ?>">Car Show</a></li>
            </ul>
          </div>
         <?php if ( ! dynamic_sidebar( 'sidebar-5' ) ) : ?>
                 <?php endif; // end sidebar widget area ?>
        </div>
        <div class="containt_indent">

				<?php while ( have_posts() ) : the_post(); ?>

					

					<?php get_template_part( 'content', 'single22' ); ?>

					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
  </div>
        
<?php  get_sidebar(); ?>


<?php } else { ?>




<!-- inner_container start -->
<div class="inner_container">
  <div class="inner_banner1">
    <div class="wrapper">
      <div class="big_title">Blog</div>
      
      <!-- blog content start -->
      <div class="blog_content">
      <?php get_sidebar(blog); ?>
      
       <!-- blog right start -->
        <div class="blog_right">
        
        
        

				<?php while ( have_posts() ) : the_post(); ?>

				

					<?php get_template_part( 'content', 'single' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
				
				
				

		  </div>
        <!-- blog right end -->
        
      </div>
      <!-- blog content end -->
    </div>
  </div>
</div>
<!-- inner_container end -->
<div class="clear"></div>




<?php } ?>

<?php get_footer(); ?>
