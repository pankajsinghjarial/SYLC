<?php
	// Setup globals
	// @todo: Get these out of template
	global $wp_query;

	// Setup image width and height variables
	// @todo: Investigate if these are still needed here
	$image_width  = get_option( 'single_view_image_width' );
	$image_height = get_option( 'single_view_image_height' );
?>



<div id="single_product_page_container">

	<?php
		// Breadcrumbs
		wpsc_output_breadcrumbs();

		// Plugin hook for adding things to the top of the products page, like the live search
		do_action( 'wpsc_top_of_products_page' );
	?>

	<div class="single_product_display group">
    <div class="detail_wrapper">
<div class="detail_01">
<?php
		/**
		 * Start the product loop here.
		 * This is single products view, so there should be only one
		 */

		while ( wpsc_have_products() ) : wpsc_the_product(); ?>
       <?php //echo next_post_link_plus('order_by=post_date&meta_key=&loop=0&thumb=0&max_length=0&in_same_cat=1&excats=&num_results=1&echo=1'); ?>
       
        		<div class="detail_title">
                    <p><span><?php echo wpsc_the_product_title(); ?></span></p>
                    
                </div>
                
                <div class="detail_outer">
<div class="imagecol">
						<?php if ( wpsc_the_product_thumbnail() ) : ?>
								<a rel="<?php echo wpsc_the_product_title(); ?>" class="<?php echo wpsc_the_product_image_link_classes(); ?>" href="<?php echo esc_url( wpsc_the_product_image() ); ?>">
									<img class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php echo wpsc_the_product_title(); ?>" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_thumbnail(get_option('product_image_width'),get_option('product_image_height'),'','single'); ?>"/>
								</a>
								<?php
								if ( function_exists( 'gold_shpcrt_display_gallery' ) )
									echo gold_shpcrt_display_gallery( wpsc_the_product_id() );
								?>
						<?php else: ?>
									<a href="<?php echo esc_url( wpsc_the_product_permalink() ); ?>">
									<img class="no-image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="No Image" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo WPSC_CORE_THEME_URL; ?>wpsc-images/noimage.png" width="<?php echo get_option('product_image_width'); ?>" height="<?php echo get_option('product_image_height'); ?>" />
									</a>
						<?php endif; ?>
					</div><!--close imagecol-->

				</div>
                   
					<!--<div class="productcol">-->
						<?php do_action('wpsc_product_before_description', wpsc_the_product_id(), $wp_query->post); ?>
						<?php /*?><div class="product_description">
							<?php echo wpsc_the_product_description(); ?>
						</div><?php */?><!--close product_description -->
						<?php do_action( 'wpsc_product_addons', wpsc_the_product_id() ); ?>
                        <div class="car_description">
						<?php if ( wpsc_the_product_additional_description() ) : ?>
                        
                        <script>
							$(document).ready(function(){
								//Examples of how to assign the ColorBox event to elements
								$(".form").colorbox({iframe:true, innerWidth:410, innerHeight:330});
							});
						</script>
                     
                        <?php /*?><?php echo get_page_link(238); ?><?php */?>
							
               
								<p><?php echo wpsc_the_product_additional_description(); ?></p>
                                 
							
						<?php endif; ?>
                        <br /><br />
                         <ul>
                                <li><a  class="inline" href="#detail_form" title=""><img src="<?php echo get_bloginfo('template_url')?>/images/button02.jpg" alt=""></a></li>
                                
                                <?php  
	   $path = $_SERVER['REQUEST_URI'] ; 
         $test = explode('/',$path);
          if (in_array("classic-cars", $test)) {
	  ?>
                                
 <li class="prev_plus"><?php next_post_link_plus( array( 'in_cats' => '183', 'format' => '%link') ); ?></li>
<li class="next_plus"><?php previous_post_link_plus( array('in_cats' => '183', 'format' => '%link') ); ?></li>

<?php } if(in_array("voitures-neuves", $test)){?>
<li class="prev_plus"><?php next_post_link_plus( array( 'in_cats' => '184', 'format' => '%link') ); ?></li>
<li class="next_plus"><?php previous_post_link_plus( array('in_cats' => '184', 'format' => '%link') ); ?></li>

<?php } if(in_array("voitures-en-transit", $test)){?>
<li class="prev_plus"><?php next_post_link_plus( array( 'in_cats' => '185', 'format' => '%link') ); ?></li>
<li class="next_plus"><?php previous_post_link_plus( array('in_cats' => '185', 'format' => '%link') ); ?></li>
<?php }?>



                                  </ul>
                                  </div><!--close single_additional_description-->
						<?php do_action( 'wpsc_product_addon_after_descr', wpsc_the_product_id() ); ?>
						<?php
						/**
						 * Custom meta HTML and loop
						 */
						?>
                        
                        <?php if (wpsc_have_custom_meta()) : ?>
						<div class="custom_meta">
							<?php while ( wpsc_have_custom_meta() ) : wpsc_the_custom_meta(); ?>
								<?php if (stripos(wpsc_custom_meta_name(),'g:') !== FALSE) continue; ?>
								<strong><?php echo wpsc_custom_meta_name(); ?>: </strong><?php echo wpsc_custom_meta_value(); ?><br />
							<?php endwhile; ?>
						</div><!--close custom_meta-->
                        <?php endif; ?>
						<?php
						/**
						 * Form data
						 */
						?>
                        </div>
                   
                    <div class="detail_02">
                    	<div class="ditail_icon">
                			 <?php echo do_shortcode('[wpsr_socialbts url="'.get_permalink().'" type="16px" target="1" effect="none"                   services="facebook,twitter,rss,yahoobookmarks,reddit" imgpath16px="'.plugins_url().'/wp-socializer/public/social-icons/16/"]');?>


                        </div>
                        <div class="clear"></div>
                        
                      	<div class="detail_03">
                        	<p>Stock ID: <?php echo wpsc_product_sku(wpsc_the_product_id());  ?></p>
                        </div>
                        
                        
						<form class="product_form" enctype="multipart/form-data" action="<?php echo esc_url( wpsc_this_page_url() ); ?>" method="post" name="1" id="product_<?php echo wpsc_the_product_id(); ?>">
							<?php do_action ( 'wpsc_product_form_fields_begin' ); ?>
							<?php if ( wpsc_product_has_personal_text() ) : ?>
								<fieldset class="custom_text">
									<legend><?php _e( 'Personalize Your Product', 'wpsc' ); ?></legend>
									<p><?php _e( 'Complete this form to include a personalized message with your purchase.', 'wpsc' ); ?></p>
									<textarea cols='55' rows='5' name="custom_text"></textarea>
								</fieldset>
							<?php endif; ?>

							<?php if ( wpsc_product_has_supplied_file() ) : ?>

								<fieldset class="custom_file">
									<legend><?php _e( 'Upload a File', 'wpsc' ); ?></legend>
									<p><?php _e( 'Select a file from your computer to include with this purchase.', 'wpsc' ); ?></p>
									<input type="file" name="custom_file" />
								</fieldset>
							<?php endif; ?>
						<?php /** the variation group HTML and loop */?>
                        <?php if (wpsc_have_variation_groups()) { ?>
                        <fieldset><legend><?php //_e('Product Options', 'wpsc'); ?></legend>
						<div class="description_outer">
                        <!--<div class="wpsc_variation_forms">-->
                        	<table class="description_table">
							<?php while (wpsc_have_variation_groups()) : wpsc_the_variation_group(); ?>
								<tr>
                                <td><div class="table_text001"><label for="<?php echo wpsc_vargrp_form_id(); ?>"><?php echo wpsc_the_vargrp_name(); ?>:</label></div></td>
								<?php /** the variation HTML and loop */?>
								<td><div class="table_text001"><?php 
								$count=1;
								while(wpsc_have_variations()) : wpsc_the_variation(); 
								
								?>
                                <?php echo wpsc_the_variation_name();
									
									if($count >1)
									{
									echo "";
									}
									 ?>
                                    
								<?php
								$count++;
								  endwhile; ?>
                                
                                
                               <?php /*?> <select class="wpsc_select_variation" name="variation[<?php echo wpsc_vargrp_id(); ?>]" id="<?php echo wpsc_vargrp_form_id(); ?>">
								<?php while (wpsc_have_variations()) : wpsc_the_variation(); ?>
									<option value="<?php echo wpsc_the_variation_id(); ?>" <?php echo wpsc_the_variation_out_of_stock(); ?>><?php echo wpsc_the_variation_name(); ?></option>
								<?php endwhile; ?>
								</select><?php */?>
                                
                                </div></td></tr>
							<?php endwhile; ?>
                            </table>
                              </div>
						<!--close wpsc_variation_forms-->
                        </fieldset>
						<?php } ?>
						<?php /** the variation group HTML and loop ends here */?>

							<?php
							/**
							 * Quantity options - MUST be enabled in Admin Settings
							 */
							?>
							<?php if(wpsc_has_multi_adding()): ?>
                            	<fieldset><legend><?php _e('Quantity', 'wpsc'); ?></legend>
								<div class="wpsc_quantity_update">
								<input type="text" id="wpsc_quantity_update_<?php echo wpsc_the_product_id(); ?>" name="wpsc_quantity_update" size="2" value="1" />
								<input type="hidden" name="key" value="<?php echo wpsc_the_cart_item_key(); ?>"/>
								<input type="hidden" name="wpsc_update_quantity" value="true" />
                                </div><!--close wpsc_quantity_update-->
                                </fieldset>
							<?php endif ;?>
							<!--<div class="wpsc_product_price">-->
								<?php if(wpsc_show_stock_availability()): ?>
									<?php if(wpsc_product_has_stock()) : ?>
										<div id="stock_display_<?php echo wpsc_the_product_id(); ?>" class="in_stock"><?php _e('Product in stock', 'wpsc'); ?></div>
									<?php else: ?>
										<div id="stock_display_<?php echo wpsc_the_product_id(); ?>" class="out_of_stock"><?php _e('Product not in stock', 'wpsc'); ?></div>
									<?php endif; ?>
								<?php endif; ?>
								<?php if(wpsc_product_is_donation()) : ?>
									<label for="donation_price_<?php echo wpsc_the_product_id(); ?>"><?php _e('Donation', 'wpsc'); ?>: </label>
									<input type="text" id="donation_price_<?php echo wpsc_the_product_id(); ?>" name="donation_price" value="<?php echo wpsc_calculate_price(wpsc_the_product_id()); ?>" size="6" />
								<?php else : ?>
                                <div class="description_outer">
                                    <table class="description_table" style="margin-top:0px;">
                                    <tr>
                                    <td><div class="table_text003">Prix</div></td>
                                    <td><div class="table_text004">	<?php wpsc_the_product_price_display(); ?> <span style="float:left; margin-top:-20px; margin-left:90px;">USD</span></div></td>
                                    </tr>
                                    </table>
                              	</div>
									 <!-- multi currency code -->
                                    <?php if(wpsc_product_has_multicurrency()) : ?>
	                                    <?php echo wpsc_display_product_multicurrency(); ?>
                                    <?php endif; ?>
									<?php if(wpsc_show_pnp()) : ?>
										<p class="pricedisplay"><?php //_e('Shipping', 'wpsc'); ?>
                                        <span class="pp_price"><?php //echo wpsc_product_postage_and_packaging(); ?></span></p>
									<?php endif; ?>
								<?php endif; ?>
							<!--</div>--><!--close wpsc_product_price-->
							<!--sharethis-->
							<?php if ( get_option( 'wpsc_share_this' ) == 1 ): ?>
							<div class="st_sharethis" displayText="ShareThis"></div>
							<?php endif; ?>
							<!--end sharethis-->
							<input type="hidden" value="add_to_cart" name="wpsc_ajax_action" />
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id" />
							<?php if( wpsc_product_is_customisable() ) : ?>
								<input type="hidden" value="true" name="is_customisable"/>
							<?php endif; ?>
							<div class="detail_title">
                    			<div style="margin-top:-15px;"> 
									<?php echo wpsc_the_product_description(); ?>
                                </div>
                			</div>

							<?php
							/**
							 * Cart Options
							 */
							?>

							<?php if((get_option('hide_addtocart_button') == 0) &&  (get_option('addtocart_or_buynow') !='1')) : ?>
								<?php if(wpsc_product_has_stock()) : ?>
									<div class="wpsc_buy_button_container">
											<?php if(wpsc_product_external_link(wpsc_the_product_id()) != '') : ?>
											<?php $action = wpsc_product_external_link( wpsc_the_product_id() ); ?>
											<input class="wpsc_buy_button" type="submit" value="<?php echo wpsc_product_external_link_text( wpsc_the_product_id(), __( 'Buy Now', 'wpsc' ) ); ?>" onclick="return gotoexternallink('<?php echo esc_url( $action ); ?>', '<?php echo wpsc_product_external_link_target( wpsc_the_product_id() ); ?>')">
											<?php else: ?>
										<input type="submit" value="<?php _e('Add To Cart', 'wpsc'); ?>" name="Buy" class="wpsc_buy_button" id="product_<?php echo wpsc_the_product_id(); ?>_submit_button"/>
											<?php endif; ?>
										<div class="wpsc_loading_animation">
											<img title="Loading" alt="Loading" src="<?php echo wpsc_loading_animation_url(); ?>" />
											<?php _e('Updating cart...', 'wpsc'); ?>
										</div><!--close wpsc_loading_animation-->
									</div><!--close wpsc_buy_button_container-->
								<?php else : ?>
									<p class="soldout"><?php _e('This product has sold out.', 'wpsc'); ?></p>
								<?php endif ; ?>
							<?php endif ; ?>
							<?php do_action ( 'wpsc_product_form_fields_end' ); ?>
						</form><!--close product_form-->
						
						<?php
							if ( (get_option( 'hide_addtocart_button' ) == 0 ) && ( get_option( 'addtocart_or_buynow' ) == '1' ) )
								echo wpsc_buy_now_button( wpsc_the_product_id() );

							echo wpsc_product_rater();

							echo wpsc_also_bought( wpsc_the_product_id() );

						if(wpsc_show_fb_like()): ?>
	                        <div class="FB_like">
	                        <iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo wpsc_the_product_permalink(); ?>&amp;layout=standard&amp;show_faces=true&amp;width=435&amp;action=like&amp;font=arial&amp;colorscheme=light" frameborder="0"></iframe>
	                        </div><!--close FB_like-->
                        <?php endif; ?>
					</div><!--close productcol-->
					<form onsubmit="submitform(this);return false;" action="<?php echo esc_url( wpsc_this_page_url() ); ?>" method="post" name="product_<?php echo wpsc_the_product_id(); ?>" id="product_extra_<?php echo wpsc_the_product_id(); ?>">
						<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="prodid"/>
						<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="item"/>
					</form>
                 </div>
                    </div>
		</div><!--close single_product_display-->

		<?php echo wpsc_product_comments(); ?>

<?php endwhile;

    do_action( 'wpsc_theme_footer' ); ?>

</div><!--close single_product_page_container-->





<!-- form start -->
<div id ="pro_form">
<div id="detail_form" class="detail_form_outer01" >
	<div class="detail_form_title">
    <p>ENREGISTREZ-VOUS ET RECEVEZ DES ALERTES SUR CETTE VOITURE.</p>
    </div>
    <div class="detail_form_content">
    <div class="form_outer">
          <?php echo do_shortcode('[contact-form-7 id="236" title="detail product"]');?>
          </div>
          </div>
</div>
</div>
<!-- form end --> 
    <?php
             $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      
      ?>
<form>
<input type="hidden" id="car" value="<?php echo wpsc_product_sku(wpsc_the_product_id());  ?>"/>
<input type="hidden" id="pro_url" value="<?php echo $url  ?>"/>
</form>
<script>
$(window).load(function() {	 
document.getElementById('hidden_carid').value = document.getElementById('car').value
document.getElementById('url').value = document.getElementById('pro_url').value
 $("#pro_form").css("display","none");
  $(".hide").css("display","none");
 
});

</script>

