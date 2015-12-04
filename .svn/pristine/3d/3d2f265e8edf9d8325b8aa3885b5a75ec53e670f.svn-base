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
          <a href="business_moment.html"><img src="<?php echo get_bloginfo('template_url')?>/images/affaires.jpg" width="200" height="506" alt=""> </a>
        </div>
        <div class="containt_indent">

			<?php if ( have_posts() ) : ?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

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

        </ul>
        </div>
        
        <div class="news_outer_heading">
        	<div class="news_title01">
            <p><span>Vu à la Télé</span>&nbsp;</p>
            </div>
        </div>
        
        <div class="brand_logo_outer">
        <ul>
        <li><img src="<?php echo get_bloginfo('template_url')?>/images/AB-MOTEUR.jpg" alt=""></li>
        </ul>
        </div>
          
          	
        </div>
        
      


<?php  get_sidebar(); ?>
<?php get_footer(); ?>
