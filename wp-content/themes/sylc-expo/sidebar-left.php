<div class="container_left">
          <div class="containt_nav">
            <ul>
            <?php
             $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      $url2= get_permalink($post->post_parent); 
      ?>

            <li <?php if($url == $url2) { ?> class="current_page_item" <?php } ?> > <a href="<?php echo get_permalink($post->post_parent); ?>"  > <?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
?></a></li>

<?php
  if($post->post_parent) {
  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0$sort_column=menu_order");
  $title_heading = get_the_title($post->post_parent);

  }
 
  else {
  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
  $title_heading = get_the_title($post->ID);
  }
  ?>
      <?php 
  if ($children) { ?>
 
  
  <?php echo $children; ?>
  
<?php } 


?>
            
</ul>
  
          </div>
          
          <?php if ( ! dynamic_sidebar( 'sidebar-5' ) ) : ?>
                   <?php endif; // end sidebar widget area ?>
                   
          </div>