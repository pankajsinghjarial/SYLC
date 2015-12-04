<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>


  

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
      
      

			<?php if ( have_posts() ) : ?>

				<?php //twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php //twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>



 
                  
           
           <?php if(function_exists('wp_paginate')) {
   wp_paginate();
} ?>  

	
        
        </div>
        <!-- blog right end -->
        
      </div>
      <!-- blog content end -->
    </div>
  </div>
</div>
<!-- inner_container end -->
<div class="clear"></div>


<?php get_footer(); ?>