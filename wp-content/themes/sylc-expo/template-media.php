<?php
/**
 * Template Name: media
 
 */
get_header(); ?>

<!-- inner_container start -->
<div class="inner_container">
  <div class="inner_banner2">
    <div class="wrapper">
      <div class="big_title">Média</div>
      <div class="wrapper_indent01">
       <?php get_sidebar(left);?>
        <div class="classic_car_outer">
        <div class="media_outer">
        
        
              <?php while ( have_posts() ) : the_post(); ?>
     <?php the_content(); ?>
	 <?php endwhile;?>
	 
        	<ul>




 <?php 
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			query_posts( array( 'post_type' => 'medias', 'posts_per_page' => 1000, 'caller_get_posts' => 1, 'paged' => $paged , 'order' => ASC ) );
		?>
        <?php while ( have_posts() ) : the_post();  ?>
           
     <?php $url= do_shortcode( '[types field="videolink"][/types]' ); ?>  
<?php  $val1=trim($url);
							$val=ereg_replace('(.*)v=','',$val1);
							$catcode=substr($val,0,11); ?>

            
            <li><a class='youtube' href="http://www.youtube.com/embed/<?php echo $catcode; ?>?rel=0" title="">

<?php echo get_the_post_thumbnail( ); ?> </a>
          
                  <?php the_content(); ?>
               

            </li>
             
            
           
        <?php endwhile; ?>


         
            </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- inner_container end -->
<div class="clear"></div>
<?php get_footer(); ?>

