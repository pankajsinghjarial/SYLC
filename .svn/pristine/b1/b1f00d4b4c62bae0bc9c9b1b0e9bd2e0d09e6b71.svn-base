<?php
global $wp_query;
$image_width = get_option('product_image_width');
/*
 * Most functions called in this page can be found in the wpsc_query.php file
 */
?>
<div id="default_products_page_container" class="wrap wpsc_container">

<?php wpsc_output_breadcrumbs(); ?>

	<?php do_action('wpsc_top_of_products_page'); // Plugin hook for adding things to the top of the products page, like the live search ?>
	<?php if(wpsc_display_categories()): ?>
	  <?php if(wpsc_category_grid_view()) :?>
			<div class="wpsc_categories wpsc_category_grid group">
				<?php wpsc_start_category_query(array('category_group'=> get_option('wpsc_default_category'), 'show_thumbnails'=> 1)); ?>
					<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_grid_item  <?php wpsc_print_category_classes_section(); ?>" title="<?php wpsc_print_category_name(); ?>">
						<?php wpsc_print_category_image(); ?>
					</a>
					<?php wpsc_print_subcategory("", ""); ?>
				<?php wpsc_end_category_query(); ?>

			</div><!--close wpsc_categories-->
	  <?php else:?>
			<ul class="wpsc_categories">

				<?php wpsc_start_category_query(array('category_group'=>get_option('wpsc_default_category'), 'show_thumbnails'=> get_option('show_category_thumbnails'))); ?>
						<li>
							<?php wpsc_print_category_image(); ?>

							<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_link <?php wpsc_print_category_classes_section(); ?>" title="<?php wpsc_print_category_name(); ?>"><?php wpsc_print_category_name(); ?></a>
							<?php if(wpsc_show_category_description()) :?>
								<?php wpsc_print_category_description("<div class='wpsc_subcategory'>", "</div>"); ?>
							<?php endif;?>

							<?php wpsc_print_subcategory("<ul>", "</ul>"); ?>
						</li>
				<?php wpsc_end_category_query(); ?>
			</ul>
		<?php endif; ?>
	<?php endif; ?>
<?php // */ ?>

	<?php if(wpsc_display_products()): ?>

		<?php if(wpsc_is_in_category()) : ?>
			<div class="wpsc_category_details">
				<?php if(wpsc_show_category_thumbnails()) : ?>
					<img src="<?php echo wpsc_category_image(); ?>" alt="<?php echo wpsc_category_name(); ?>" />
				<?php endif; ?>

				<?php if(wpsc_show_category_description() &&  wpsc_category_description()) : ?>
					<?php echo wpsc_category_description(); ?>
				<?php endif; ?>
			</div><!--close wpsc_category_details-->
		<?php endif; ?>
		<?php if(wpsc_has_pages_top()) : ?>
			<div class="wpsc_page_numbers_top">
				<?php wpsc_pagination(); ?>
			</div><!--close wpsc_page_numbers_top-->
		<?php endif; ?>

		<div class="wrapper_indent01">
             <div class="container_left">
             	<div class="containt_nav">
             	<ul id="categorisation_group_20" class="wpsc_categories wpsc_top_level_categories">
             	     <?php //endif; // end sidebar widget area
				global $wpdb;   
				    
                   $sql ="SELECT `wp_terms`.name ,`wp_terms`.slug FROM `wp_terms` LEFT JOIN `wp_term_taxonomy` ON `wp_terms`.term_id = `wp_term_taxonomy`.term_id WHERE `wp_term_taxonomy`.taxonomy = 'wpsc_product_category' AND `wp_term_taxonomy`.parent = 0" ;
//echo $sql;
				$results = $wpdb->get_results($sql);
				//echo "hello".$results;
				//die;
					
    $path = $_SERVER['REQUEST_URI'] ; 
         $test = explode('/',$path);
foreach($results as $r)
{
?>	
	<li <?php if (in_array($r->slug, $test)) {  ?> class="current_page_item" <?php } ?>>
    <?php 
    echo '<a href="http://www.sylc-export.com/inventaire/'.$r->slug.'">'.$r->name.'</a>';
    ?>
    </li>
    <?php
}
?>                            
         </ul>         
                 <?php /*?>  <?php
        $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          $url2="http://www.sylc-export.com/inventaire/classic-cars/" ;
            $url3="http://www.sylc-export.com/inventaire/voitures-neuves/" ;
              $url4="http://www.sylc-export.com/inventaire/voitures-en-transit/" ;
      
      ?>
             	<ul id="categorisation_group_20" class="wpsc_categories wpsc_top_level_categories">
                  <li <?php if($url == $url2) { ?> class="current_page_item" <?php } ?> >
                    <a href="http://www.sylc-export.com/inventaire/classic-cars/" class:selected="">Classic Cars</a>
                        </li>
</ul>
<ul id="categorisation_group_19" class="wpsc_categories wpsc_top_level_categories">
<li <?php if($url == $url3) { ?> class="current_page_item" <?php } ?> >
<a href="http://www.sylc-export.com/inventaire/voitures-neuves/" class:selected="">Voitures Neuves</a>
</li>
</ul>
<ul id="categorisation_group_18" class="wpsc_categories wpsc_top_level_categories">
<li <?php if($url == $url4) { ?> class="current_page_item" <?php } ?>>
<a href="http://www.sylc-export.com/inventaire/voitures-en-transit/" class:selected="">Voitures En Transit</a>
</li>
</ul><?php */?>

               </div>
                	<?php if ( ! dynamic_sidebar( 'sidebar-5' ) ) : ?>
                 <?php endif; // end sidebar widget area ?>
             </div>
		<div class="wpsc_default_product_list">
        <div class="classic_car_outer">
		<?php /** start the product loop here */?>
		<?php while (wpsc_have_products()) :  wpsc_the_product(); ?>

			<?php /*?><div class="default_product_display product_view_<?php echo wpsc_the_product_id(); ?> <?php echo wpsc_category_class(); ?> group"><?php */?>
            <li>
            	<div class="classic_car_box">
                	<div class="car_outer01">
                	<?php if(wpsc_show_thumbnails()) :?>
									
                       
							<img class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>"  title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_thumbnail(); ?>"/>
							
						
						<?php
						if(gold_cart_display_gallery()) :
							echo gold_shpcrt_display_gallery(wpsc_the_product_id(), true);
						endif;
						?>
					
				<?php endif; ?>
                </div>
                <div class="classic_car_detail">
				<h2>
							<?php if(get_option('hide_name_link') == 1) : ?>
								<?php echo wpsc_the_product_title(); ?>
							<?php else: ?>
								<a class="wpsc_product_title" href="<?php echo esc_url( wpsc_the_product_permalink() ); ?>">
									<?php echo wpsc_the_product_title(); ?>
                                </a>
							<?php endif; ?>
					</h2>	
                    
                        	<?php echo wpsc_the_product_description(); ?>
                       
				</div>
                
                <div class="classic_car_price" style="padding-top:5px;">
                	<?php wpsc_the_product_price_display(); ?>
                     <p style="float:right; margin-top:-30px;"> 
                     <span><a href="<?php echo esc_url( wpsc_the_product_permalink() ); ?>">Détails</a><img src="<?php echo get_bloginfo('template_url')?>/images/arrow.png" width="6" height="7" alt=""></span>
                     </p>
                </div>
				<?php /*?>	<div class="productcol" style="margin-left:<?php echo $image_width + 20; ?>px;" ><?php */?>



						<?php
							do_action('wpsc_product_before_description', wpsc_the_product_id(), $wp_query->post);
							do_action('wpsc_product_addons', wpsc_the_product_id());
						?>


						<!--<div class="wpsc_description">
							
                        </div>--><!--close wpsc_description-->

						<?php /*?><?php if(wpsc_the_product_additional_description()) : ?>
						<div class="additional_description_container">
								<img class="additional_description_button"  src="<?php echo WPSC_CORE_THEME_URL; ?>wpsc-images/icon_window_expand.gif" alt="<?php esc_html_e( 'Additional Description', 'wpsc' ); ?>" /><a href="<?php echo esc_url( wpsc_the_product_permalink() ); ?>" class="additional_description_link"><?php esc_html_e('More Details', 'wpsc'); ?>
							</a>
							<div class="additional_description">
								<p><?php echo wpsc_the_product_additional_description(); ?></p>
							</div><!--close additional_description-->
						</div><!--close additional_description_container-->
						<?php endif; ?><?php */?>

						<?php if(wpsc_product_external_link(wpsc_the_product_id()) != '') : ?>
							<?php $action =  wpsc_product_external_link(wpsc_the_product_id()); ?>
						<?php else: ?>
						<?php $action = wpsc_this_page_url(); ?>
						<?php endif; ?>
						<form class="product_form"  enctype="multipart/form-data" action="<?php echo esc_url( $action ); ?>" method="post" name="product_<?php echo wpsc_the_product_id(); ?>" id="product_<?php echo wpsc_the_product_id(); ?>" >
						<?php do_action ( 'wpsc_product_form_fields_begin' ); ?>
						<?php /** the variation group HTML and loop */?>
                        <?php if (wpsc_have_variation_groups()) { ?>
                        <fieldset><legend><?php //_e('Product Options', 'wpsc'); ?></legend>
						<?php /*?><div class="wpsc_variation_forms">
                        	<table>
							<?php while (wpsc_have_variation_groups()) : wpsc_the_variation_group(); ?>
								<tr><td class="col1"><label for="<?php echo wpsc_vargrp_form_id(); ?>"><?php echo wpsc_the_vargrp_name(); ?>:</label></td>
								
								<td class="col2"><select class="wpsc_select_variation" name="variation[<?php echo wpsc_vargrp_id(); ?>]" id="<?php echo wpsc_vargrp_form_id(); ?>">
								<?php while (wpsc_have_variations()) : wpsc_the_variation(); ?>
									<option value="<?php echo wpsc_the_variation_id(); ?>" <?php echo wpsc_the_variation_out_of_stock(); ?>><?php echo wpsc_the_variation_name(); ?></option>
								<?php endwhile; ?>
								</select></td></tr>
							<?php endwhile; ?>
                            </table>
						</div><?php */?><!--close wpsc_variation_forms-->
                        </fieldset>
						<?php } ?>
						<?php /** the variation group HTML and loop ends here */?>

							<!-- THIS IS THE QUANTITY OPTION MUST BE ENABLED FROM ADMIN SETTINGS -->
							<?php if(wpsc_has_multi_adding()): ?>
                            	<fieldset><legend><?php _e('Quantity', 'wpsc'); ?></legend>
								<div class="wpsc_quantity_update">
                                <?php /*<label for="wpsc_quantity_update_<?php echo wpsc_the_product_id(); ?>"><?php _e('Quantity', 'wpsc'); ?>:</label>*/ ?>
								<input type="text" id="wpsc_quantity_update_<?php echo wpsc_the_product_id(); ?>" name="wpsc_quantity_update" size="2" value="1" />
								<input type="hidden" name="key" value="<?php echo wpsc_the_cart_item_key(); ?>"/>
								<input type="hidden" name="wpsc_update_quantity" value="true" />
                                </div><!--close wpsc_quantity_update-->
                                </fieldset>
							<?php endif ;?>

							<div class="wpsc_product_price">
								<?php if( wpsc_show_stock_availability() ): ?>
									<?php if(wpsc_product_has_stock()) : ?>
										<div id="stock_display_<?php echo wpsc_the_product_id(); ?>" class="in_stock"><?php _e('Product in stock', 'wpsc'); ?></div>
									<?php else: ?>
										<div id="stock_display_<?php echo wpsc_the_product_id(); ?>" class="out_of_stock"><?php _e('Product not in stock', 'wpsc'); ?></div>
									<?php endif; ?>
								<?php endif; ?>
							<?php /*?>	<?php if(wpsc_product_is_donation()) : ?>
									<label for="donation_price_<?php echo wpsc_the_product_id(); ?>"><?php _e('Donation', 'wpsc'); ?>: </label>
									<input type="text" id="donation_price_<?php echo wpsc_the_product_id(); ?>" name="donation_price" value="<?php echo wpsc_calculate_price(wpsc_the_product_id()); ?>" size="6" />

								<?php else : ?>
									<?php wpsc_the_product_price_display(); ?>

									<!-- multi currency code -->
									<?php if(wpsc_product_has_multicurrency()) : ?>
	                                	<?php echo wpsc_display_product_multicurrency(); ?>
                                    <?php endif; ?>

									<?php if(wpsc_show_pnp()) : ?>
										<p class="pricedisplay"><?php _e('Shipping', 'wpsc'); ?>:<span class="pp_price"><?php echo wpsc_product_postage_and_packaging(); ?></span></p>
									<?php endif; ?>
								<?php endif; ?><?php */?>
							</div><!--close wpsc_product_price-->

							<input type="hidden" value="add_to_cart" name="wpsc_ajax_action"/>
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id"/>

														
							<?php do_action ( 'wpsc_product_form_fields_end' ); ?>
						</form><!--close product_form-->

						<?php if((get_option('hide_addtocart_button') == 0) && (get_option('addtocart_or_buynow')=='1')) : ?>
							<?php echo wpsc_buy_now_button(wpsc_the_product_id()); ?>
						<?php endif ; ?>

						<?php echo wpsc_product_rater(); ?>


					<?php // */ ?>
				<!--</div>-->
                <!--close productcol-->
			<?php if(wpsc_product_on_special()) : ?><span class="sale"><?php _e('Sale', 'wpsc'); ?></span><?php endif; ?>
		<!--</div>--><!--close default_product_display-->
        </div>
		</li>
		<?php endwhile; ?>
		<?php /** end the product loop here */?>
        <div class="clear"></div>
        <?php do_action( 'wpsc_theme_footer' ); ?>

		<?php if(wpsc_has_pages_bottom()) : ?>
        
         <?php //wpsc_pagination(); ?>
         <?php if(function_exists('wp_paginate')) {
    		wp_paginate();} 
		
		?>
        	
            <?php endif; ?>
        </div>
		</div>
        </div>
		<?php if(wpsc_product_count() == 0):?>
			<h3><?php  _e('There are no products in this group.', 'wpsc'); ?></h3>
		<?php endif ; ?>
	    <?php //do_action( 'wpsc_theme_footer' ); ?>

		<?php //if(wpsc_has_pages_bottom()) : ?>
			<!--<div class="wpsc_page_numbers_bottom">-->
           
       
				<?php //wpsc_pagination(); ?>
                
			<!--</div>--><!--close wpsc_page_numbers_bottom-->
		<?php //endif; ?>
	<?php endif; ?>
</div>
<!--close default_products_page_container-->
