<?php
/**
 * Template Name: Accueil
 
 */
get_header(); ?>





<!--<div style="display:none;">

	<div id='inline_content' class="newvideo" style='padding:10px; background:#fff;'>
		<iframe width="580" height="315" src="//www.youtube.com/embed/B7o0zRVzpKs?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
			</div>
</div>--> 



<section style="background:none;">
  <div class="section_indent">

    
  </div>
</section>
<!-- section end --> 
<!-- topbox start -->
<div class="topbox_outer">
  <div class="wrapper">
    <div class="topbox">
    
    
    <?php //query_posts( 'post_type=exhibitor_gallery'); ?>
				<?php //while ( have_posts() ) : the_post(); ?>
<?php $loop = new WP_Query( array( 'post_type' => 'accueil_articles','posts_per_page' => '3','order' => 'ASC') );  
    ?>
    <?php while ( $loop->have_posts() ) :  $loop->the_post();  ?>
  <div class="Presentation_box"><?php    echo the_post_thumbnail(array('293','170'));?>
  <p><?php the_title(); ?></p>
    <div class="Presentation"> <?php the_content();?>
    
    <a href="<?php echo do_shortcode('[types field="page-links" class="" style=""][/types]');?>">En Savoir Plus</a></div>
    </div>
    <?php endwhile; ?>
    
    
    <!--  <div class="Presentation_box"> <img src="<?php //echo get_bloginfo('template_url')?>/images/presentation.jpg" width="293" height="170" alt="<?php echo the_title(); ?>">
        <p>PRÉSENTATION</p>
        <div class="Presentation">
          <p>SYLC CORPORATION, établi depuis 7 ans <br>dans le secteur de l'automobile, est <br>spécialisé dans l'exportation de véhicules en <br>tous genres en provenance des Etats Unis.<br>
            <br>
            <a href="presentation.html">En Savoir Plus</a></p>
        </div>
      </div>
      <div class="Presentation_box"> <img src="<?php // echo get_bloginfo('template_url')?>/images/POURQUOI.jpg" width="293" height="170" alt="<?php echo the_title(); ?>">
        <p>POURQUOI NOUS CHOISIR?</p>
        <div class="Presentation">
          <p>L'amour et la passion des voitures<br>
            américaines animent de manière<br>
            permanente l'équipe de SYLC<br>
            CORPORATION. Notre expertise...<br>
            <br>
            <a href="<">En Savoir Plus</a></p>
        </div>
      </div>
      <div class="Presentation_box"> <img src="<?php //echo get_bloginfo('template_url')?>/images/services.jpg" width="293" height="170" alt="<?php echo the_title(); ?>">
        <p>NOS SERVICES</p>
        <div class="Presentation">
          <p>SYLC CORPORATION, contrairement  aux<br>
            concurrents, vous offre GRATUITEMENT un <br>
            service de choix. Notre prestation : vous <br>
            faire bénéficier des tarifs ultra compétitifs,...<br>
            <br>
            <a href="our_services.html">En Savoir Plus</a></p>
        </div>
      </div> -->
    
    
      <div class="clear"></div>
    </div>
  </div>
</div>
<!-- topbox end --> 
<!-- container start -->
<div class="container_outer">
  <div class="wrapper"> 
    <!-- containt start -->
    <div class="containt">
    
      
      <div class="newcar_outer">
      
        <div class="newcar_head">
          <p>CLASSIC CAR<span><a href="http://www.sylc-export.com/inventaire/classic-cars/"><img src="<?php echo get_bloginfo('template_url')?>/images/button.gif" style="margin-top: -5px;" alt="<?php echo the_title(); ?>"></a></span></p>
        </div>
        
        <?php 
 //echo "pkhlkjhkjh";
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			//$home_classic_categories = get_categories("child_of=20");
			query_posts( array( 'post_type' => 'wpsc-product', 'posts_per_page' => '3', 'wpsc_product_category' => 'Home--Classic Cars' ));
		?>
        <?php
        $count=1;
           while ( have_posts() ) : the_post();  
           
           if($count==3){ ?>
           	 <div class="newcar_box min_height margin_top">
           <?php }else { ?>
           	 <div class="newcar_box min_height">

         <?php   }?>
           
        
         	<div class="car_outer"> <img class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php echo the_title(); ?>"  title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_thumbnail(); ?>"/></div>
            
            <div class="car_detail">
            	<p><?php the_title(); ?></p>
                
                        	<?php echo wpsc_the_product_description(); ?>
                     
            </div>
            
            <div class="car_price">
            <?php wpsc_the_product_price_display(); ?>
                     <p style="float:right; margin-top:-30px;"> 
                     <span><a href="<?php echo esc_url( wpsc_the_product_permalink() ); ?>">Détails</a><img src="<?php echo get_bloginfo('template_url')?>/images/arrow.png" width="6" height="7" alt="<?php echo the_title(); ?>"></span>
                     </p>
            </div>
      <?php //the_title(); ?>
            </div>
        <?php 
        
        $count++;
        endwhile; ?>
        
        
        <div class="clear"></div>
      </div>
      
      <div class="newcar_outer">
        <div class="newcar_head">
          <p>Voitures clients <span><a href="<?php echo get_page_link(12); ?>"><img src="<?php echo get_bloginfo('template_url')?>/images/button.gif" style="margin-top: -5px;" alt="<?php echo the_title(); ?>"></a></span></p>
        </div>

 <?php 
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			query_posts( array( 'post_type' => 'medias', 'posts_per_page' => 3, 'caller_get_posts' => 1, 'paged' => $paged , 'order' => ASC ) );
		?>
        <?php 
         $count=1;
         while ( have_posts() ) : the_post();  
          if($count==3){ ?>
           	 <div class="newcar_box margin_top">
           <?php }else { ?>
           	 <div class="newcar_box">

         <?php   }?>
           
     <?php $url= do_shortcode( '[types field="videolink"][/types]' ); ?>  
<?php  $val1=trim($url);
							$val=ereg_replace('(.*)v=','',$val1);
							$catcode=substr($val,0,11); ?>



<a class='youtube' href="http://www.youtube.com/embed/<?php echo $catcode; ?>?rel=0" title="">

<?php echo get_the_post_thumbnail( ); ?> </a>
        </div>
           
           
        <?php   $count++;
        endwhile; ?>



        <div class="clear"></div>
      </div>
 
    
     <div class="newcar_outer">
        <div class="newcar_head">
          <p>VOITURES NEUVES <span><a href="http://www.sylc-export.com/inventaire/voitures-neuves/"><img src="<?php echo get_bloginfo('template_url')?>/images/button.gif" style="margin-top: -5px;" alt="<?php echo the_title(); ?>"></a></span></p>
        </div>
        
        <?php //echo do_shortcode('[wpsc_products category_url_name="Voitures Neuves"  sort_order="price" order="asc"]'); ?>
        	
         <?php 
 //echo "pkhlkjhkjh";
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			//$home_voiture_categories = get_categories("child_of=19");
		
			query_posts( array( 'post_type' => 'wpsc-product', 'posts_per_page' => '3', 'wpsc_product_category' => 'Home--Voitures Neuves', 'order ' => 'DESC'  ));
		?>
        
         <?php
$count=1;
         while ( have_posts() ) : the_post();  
         if($count==3){ ?>
           	 <div class="newcar_box min_height margin_top">
           <?php }else { ?>
           	 <div class="newcar_box min_height">

         <?php   }?>
         	<div class="car_outer"> <img class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php echo the_title(); ?>"  title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_thumbnail(); ?>"/></div>
            
            <div class="car_detail">
            	<p><?php the_title(); ?></p>
                
                        	<?php echo wpsc_the_product_description(); ?>
                    
            </div>
            
            <div class="car_price">
            <?php wpsc_the_product_price_display(); ?>
                     <p style="float:right; margin-top:-30px;"> 
                     <span><a href="<?php echo esc_url( wpsc_the_product_permalink() ); ?>">Détails</a><img src="<?php echo get_bloginfo('template_url')?>/images/arrow.png" width="6" height="7" alt="<?php echo the_title(); ?>"></span>
                     </p>
            </div>
      <?php //the_title(); ?>
            </div>
        <?php $count++; 
        endwhile; ?>
        
        
        
      
        <div class="clear"></div>
      </div>
      </div>
        
 <?php wp_reset_query(); ?> 
    <!-- containt end --> 
    
      
    <!-- aside start -->
    <aside>


    	<div class="chatbox">
    
   <?php /*?>  <script type="text/javascript" src="http://seobranddev.com/sylc-corporation/livehelp/livehelp_js.php?eo=0&amp;department=2&amp;serversession=1&amp;pingtimes=10&amp;dynamic=Y&amp;creditline=W"></script><?php */?>
 
<div id="craftysyntax_2">
<p class="news_text">Entrez votre e-mail ici et vous serez inscrit dans notre newsletter</p>
<?php echo do_shortcode('[contact-form-7 id="502" title="newsletter_home"]');?>

</div>

    </div>

<?php /*?><script>
$(window).load(function(){
var $reviews = $('#reviews .review').hide();
$reviews.eq(Math.random()*$reviews.length).show();

});

</script><?php */?>

    
      <div class="moment_outer" id="reviews">
      
      <?php /*?>
      <div class="review">
      
     <?php echo do_shortcode( '[types field="voitures-transit" class="" style=""][/types]' ) ?> 
     
     </div> <?php */?>
    
       
        <div class="review">
        
     <?php echo do_shortcode('[contact-form-7 id="504" title="home_form"]');?>

       </div>
    
      </div>
      




      <?php echo do_shortcode( '[types field="les-affaires" class="" style=""][/types]' ) ?>       
     
     <?php echo do_shortcode( '[types field="more-link" class="" style=""][/types]' ) ?> 
      <?php $tubelink =  do_shortcode( '[types field="youtube-address-for-homepage-pop-up" class="" style=""][/types]' );
            $tubelink = $tubelink."?rel=0&autoplay=1";
      ?> 
     
    <?php
     if(!isset($_SESSION['loginuser']['id'])) { ?>
     <script type="text/javascript"> 
        $(document).ready(function(){
        	//$(".newvideo").colorbox({inline:true, width:"60%"})
        	//$('.newvideo').colorbox({inline:true, width:"50%", height:"auto", open:true, href: "#inline_content"});
        	$.colorbox({ href: '<?php echo $tubelink; ?>', width: '600px', height: '400px', iframe: true });
        	//$.colorbox({open:true,href:"#newvideo",iframe:true, width:"80%", height:"80%"});`
        	
        }); 
</script>  <?php } ?>
     
     
      
      <?php /*?><a href="business_moment.html"><img src="<?php echo get_bloginfo('template_url')?>/images/moment.jpg" width="320" height="235" alt="<?php echo the_title(); ?>"></a> <a href="notre-mission.html"><img src="<?php echo get_bloginfo('template_url')?>/images/logistic.jpg" width="320" height="90" alt="<?php echo the_title(); ?>"></a><a href="search_classic_car.html"> <img src="<?php echo get_bloginfo('template_url')?>/images/votre.jpg" width="320" height="90" alt="<?php echo the_title(); ?>"> </a> <a href="media.html"><img src="<?php echo get_bloginfo('template_url')?>/images/media.jpg" width="320" height="90" alt="<?php echo the_title(); ?>"></a><?php */?>
       </aside>
    <!-- aside end --> 
  </div>
</div>
<!-- container end --> 





<?php get_footer(); ?>
