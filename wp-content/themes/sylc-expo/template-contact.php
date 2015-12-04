<?php
/**
 * Template Name: contact
 * Description: A Page Template that showcases Sticky Posts, Asides, and Blog Posts
 *
 * The showcase template in Twenty Eleven consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

// Enqueue showcase script for the slider
get_header(); ?>

		<div class="inner_container">
  <div class="inner_banner1">
    <div class="wrapper">
              <div class="big_title"><?php the_title(); ?></div>
              <div class="wrapper_indent">
              
              <?php get_sidebar(left);?>
          
           <div class="containt_indent">
              <div class="contact_outer">
              <p>Besoin d'aide, vous avez besoin d'un agent francais Sur Le territoire U.S.</p>
              
              <div class="form_outer">
          
          	<?php echo do_shortcode('[contact-form-7 id="214" title="Contact form 1"]'); ?>
             <?php /*?><div class="containt_indent">
					<?php while ( have_posts() ) : the_post(); ?>
    
                        <?php get_template_part( 'content', 'page' ); ?>
    
                        <?php //comments_template( '', true ); ?>
    
                    <?php endwhile; // end of the loop. ?>
                    </div>
                    <?php */?>
                    
              </div>
          <div class="contact_map">
            <?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
            <?php endif; // end sidebar widget area ?>
           
            
            </div>
          
          </div>
          	
        </div>      
            <?php get_sidebar(right);?>
        
        
				
    </div>
  </div>
</div>
</div>
<!-- inner_container end -->
<div class="clear"></div>

<?php get_footer(); ?>