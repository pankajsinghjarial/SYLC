<?php
/**
 * Template Name: Inventory
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
<?php  
	   $path = $_SERVER['REQUEST_URI'] ; 
         $test = explode('/',$path);
         
	  ?>
		<div class="inner_container">
  		<div class="inner_banner2">
			<div class="wrapper">
              <div class="big_title">
              
              
              <?php //endif; // end sidebar widget area
				global $wpdb;
				 	$path = $_SERVER['REQUEST_URI'] ; 
         			$test = explode('/',$path);   
				
				$category = get_categories($post->ID);
				$category_id = $category->cat_ID;	
				    
                   $sql ="SELECT `wp_terms`.name ,`wp_terms`.slug FROM `wp_terms` LEFT JOIN `wp_term_taxonomy` ON `wp_terms`.term_id = `wp_term_taxonomy`.term_id WHERE `wp_term_taxonomy`.taxonomy = 'wpsc_product_category' AND `wp_term_taxonomy`.parent =0" ;
				   
				  $results = $wpdb->get_results($sql);
				  
							   
			  ?>
                            
              <?php 
			  	foreach($results as $r)
				{
				
			  		if (in_array($r->slug, $test)) {  echo $r->name; } 
			  
				}?>
              
              </div>
             
					<?php while ( have_posts() ) : the_post(); ?>
    
                        <?php get_template_part( 'content', 'page' ); ?>
    
                        <?php //comments_template( '', true ); ?>
    
                    <?php endwhile; // end of the loop. ?>
  	</div>
  </div>
</div>
<!-- inner_container end -->
<div class="clear"></div>

<?php get_footer(); ?>