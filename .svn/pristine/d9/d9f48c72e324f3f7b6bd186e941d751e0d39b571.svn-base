<div class="container_right">
        <div class="stock_outer">
        <p>VOITURES Classic</p>
        
        <?php 
 //echo "pkhlkjhkjh";
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			query_posts( array( 'post_type' => 'wpsc-product', 'posts_per_page' => '3', 'wpsc_product_category' => 'Home--Classic Cars' ));
		?>
        <?php while ( have_posts() ) : the_post();  ?>
         <div class="stock_indent">
         	<img class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php the_title(); ?>" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_thumbnail(); ?>"/>            
            
            	<p><?php the_title(); ?><span><a href="<?php echo esc_url( wpsc_the_product_permalink() ); ?>">Détails</a><img src="<?php echo get_bloginfo('template_url')?>/images/arrow.png" width="6" height="7" alt="<?php the_title(); ?>"></span></p>
                
            </div>
        <?php endwhile; ?>
        
        
        
        
        <?php /*?><div class="stock_indent">
          <img src="<?php echo get_bloginfo('template_url')?>/images/car01.jpg" width="200" height="111" alt="">
          <p>Mustang V6<span><a href="#">Détails</a><img src="<?php echo get_bloginfo('template_url')?>/images/arrow.png" width="6" height="7" alt=""></span></p>
          
          </div>
        <div class="stock_indent">
          <img src="<?php echo get_bloginfo('template_url')?>/images/car02.jpg" width="200" height="111" alt="">
          <p>Ford F-150<span><a href="#">Détails</a><img src="<?php echo get_bloginfo('template_url')?>/images/arrow.png" width="6" height="7" alt=""></span></p>
          </div>
          
          <div class="stock_indent">
          <img src="<?php echo get_bloginfo('template_url')?>/images/car03.jpg" width="200" height="111" alt="">
          <p>Ford F-150<span><a href="#">Détails</a><img src="<?php echo get_bloginfo('template_url')?>/images/arrow.png" width="6" height="7" alt=""></span></p>
          </div><?php */?>
          
          <span><a href="http://www.sylc-export.com/inventaire/classic-cars/">Voir Tous</a></span>
        
        </div>
        
        <div class="transit_outer">
       <?php if ( ! dynamic_sidebar( 'sidebar-4' ) ) : ?>
                   <?php endif; // end sidebar widget area ?>
        
        </div>
        
        </div>