<?php
/**
 * Template Name: news
 
 */
get_header(); ?>

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
          <a href="business_moment.html"><img src="<?php echo get_bloginfo('template_url')?>/images/affaires.jpg" width="200" height="506" alt="<?php echo the_title(); ?>"> </a>
        </div>
        <div class="containt_indent">
        
        
        
        
        
        
        
           <?php 
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			query_posts( array( 'post_type' => 'latest-news', 'posts_per_page' => 10000, 'caller_get_posts' => 1, 'paged' => $paged , 'order' => DESC ) );
		?>

        <?php 
        		global $more;
$more = 0;
while ( have_posts() ) : the_post();  ?>
        
        
        
        
        
         <div class="news_outer">
        	<div class="news_title">
            <p><span><?php the_title(); ?></span></p>
            </div>
            <div class="news_content">
           <?php the_content('...'); ?>

              </p>
            </div>
            <div class="read_more"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_bloginfo('template_url')?>/images/read-more.jpg"   alt="<?php echo the_title(); ?>"></a> </div>
            
        
        </div>
           
    
             
             
        <?php endwhile; ?>
        
        
        
        <div class="news_outer_heading">
        	<div class="news_title01">
            <p><span>Nos Partenaires en France</span>&nbsp;</p>
            </div>
        </div>
        
        <div class="brand_logo_outer">
        <ul>



                 <?php 
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			query_posts( array( 'post_type' => 'partenaires', 'posts_per_page' => 10000, 'caller_get_posts' => 1, 'paged' => $paged , 'order' => ASC ) );
		?>
        <?php while ( have_posts() ) : the_post();  ?>
           
    
               <li>     <?php the_post_thumbnail( ); ?>  </li>
             
        <?php endwhile; ?>


<code><a style="color: #000; font-size: 10px;" href="http://www.motorlegend.com/actualite-automobile/index.php" target="_blank"><img class="alignright" style="border: 0px;" alt="actualité voiture sportive" src="http://www.motorlegend.com/annuaire-automobile/img/motorlegend-150n.gif " width="150" height="45" border="0" /></a></code>

actualité voiture sportive
<!-- Fin du code annuaire Motorlegend -->
        </ul>
        </div>
        
        <div class="news_outer_heading">
        	<div class="news_title01">
            <p><span>Vu à la Télé</span>&nbsp;</p>
            </div>
        </div>
        
        <div class="brand_logo_outer">
        <ul>
        <li><img src="<?php echo get_bloginfo('template_url')?>/images/AB-MOTEUR.jpg" alt="<?php echo the_title(); ?>"></li>
        </ul>
        </div>
        
    </div>
        
      


<?php  get_sidebar(); ?>
<?php get_footer(); ?>