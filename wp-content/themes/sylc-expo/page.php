<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
		<div class="inner_container">
  <div class="inner_banner1">
    <div class="wrapper">
              <div class="big_title"><?php the_title(); ?></div>
              <div class="wrapper_indent">
              
              <?php get_sidebar(left);?>
          
             <div class="containt_indent">
					<?php while ( have_posts() ) : the_post(); ?>
    
                        <?php get_template_part( 'content', 'page' ); ?>
    
                        <?php //comments_template( '', true ); ?>
    
                    <?php endwhile; // end of the loop. ?>
                    </div>
            <?php get_sidebar(right);?>
        
        
				
    </div>
  </div>
</div>
</div>
<!-- inner_container end -->
<div class="clear"></div>

<?php get_footer(); ?>