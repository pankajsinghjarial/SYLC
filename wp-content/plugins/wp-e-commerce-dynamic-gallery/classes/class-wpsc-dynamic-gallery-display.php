<?php
/**
 * WP e-Commerce Dynamic Gallery Display Class
 *
 * Class Function into WP e-Commerce plugin
 *
 * Table Of Contents
 *
 * wpsc_dynamic_gallery_display()
 */
class WPSC_Dynamic_Gallery_Display_Class
{
	public static function wpsc_dynamic_gallery_display( $product_id = 0 ) {
		/**
		 * Single Product Image
		 */
		global $post;
		global $wpsc_dgallery_global_settings, $wpsc_dgallery_style_setting, $wpsc_dgallery_thumbnail_settings;

		if ( $product_id <= 0 ) {
			$product_id = $post->ID;
		}
		$lightbox_class = 'lightbox';

		// Get all attached images to this product

		$featured_img = get_post_meta( $product_id, '_thumbnail_id' );
		$attached_images = (array) get_posts( array(
			'post_type'   => 'attachment',
			'post_mime_type' => 'image',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $product_id ,
			'orderby'     => 'menu_order',
			'order'       => 'ASC',
		) );

		$attached_thumb = array();
		if ( count($attached_images) > 0 ) {
			$i = 0;
			foreach ( $attached_images as $key => $object ) {
				if ( get_post_meta( $object->ID, '_wpsc_exclude_image', true ) == 1) continue;
				$i++;
				if ( in_array( $object->ID, $featured_img ) ) {
					$attached_thumb[0] = $object;
				} else {
					$attached_thumb[$i] = $object;
				}
			}
		}
		ksort($attached_thumb);
		$product_id .= '_'.rand(100,10000);

		//Gallery settings
		$g_width = $wpsc_dgallery_style_setting['product_gallery_width_fixed'];
		$g_auto = $wpsc_dgallery_style_setting['product_gallery_auto_start'];
        $g_speed = $wpsc_dgallery_style_setting['product_gallery_speed'];
        $g_effect = $wpsc_dgallery_style_setting['product_gallery_effect'];
        $g_animation_speed = $wpsc_dgallery_style_setting['product_gallery_animation_speed'];
		$popup_gallery = $wpsc_dgallery_global_settings['popup_gallery'];

        $g_thumb_width = $wpsc_dgallery_thumbnail_settings['thumb_width'];
		if ( $g_thumb_width <= 0 ) $g_thumb_width = 105;
        $g_thumb_height = $wpsc_dgallery_thumbnail_settings['thumb_height'];
		if ( $g_thumb_height <= 0 ) $g_thumb_height = 75;

        $zoom_label = __('ZOOM +', 'wpsc_dgallery');
        if ($popup_gallery == 'deactivate') {
            $zoom_label = '';
            $lightbox_class = '';
        }

		$html = '';

		$_upload_dir = wp_upload_dir();
		if ( file_exists( $_upload_dir['basedir'] . '/sass/wpsc_dynamic_gallery.min.css' ) ) {
			$html .= '<link media="screen" type="text/css" href="' . str_replace(array('http:','https:'), '', $_upload_dir['baseurl'] ) . '/sass/wpsc_dynamic_gallery.min.css" rel="stylesheet" />' . "\n";
		} else {
			ob_start();
			include( WPSC_DYNAMIC_GALLERY_DIR . '/templates/customized_style.php' );
			$html .= ob_get_clean();
		}

        $html .= '<div class="images">
          <div class="product_gallery">';
            $html .=  '<script type="text/javascript">
                jQuery(function() {
                    var settings_defaults_'.$product_id.' = { loader_image: "'.WPSC_DYNAMIC_GALLERY_JS_URL.'/mygallery/loader.gif",
                        start_at_index: 0,
                        gallery_ID: "'.$product_id.'",
						lightbox_class: "'.$lightbox_class.'",
                        description_wrapper: false,
                        thumb_opacity: 0.5,
                        animate_first_image: false,
                        animation_speed: '.$g_animation_speed.'000,
                        width: false,
                        height: false,
                        display_next_and_prev: true,
                        display_back_and_forward: true,
                        scroll_jump: 0,
                        slideshow: {
                            enable: true,
                            autostart: '.$g_auto.',
                            speed: '.$g_speed.'000,
                            start_label: "'.__('START SLIDESHOW', 'wpsc_dgallery').'",
                            stop_label: "'.__('STOP SLIDESHOW', 'wpsc_dgallery').'",
							zoom_label: "'.$zoom_label.'",
                            stop_on_scroll: true,
                            countdown_prefix: "(",
                            countdown_sufix: ")",
                            onStart: false,
                            onStop: false
                        },
                        effect: "'.$g_effect.'",
                        enable_keyboard_move: true,
                        cycle: true,
                        callbacks: {
                        init: false,
                        afterImageVisible: false,
                        beforeImageVisible: false
                    }
                };
                jQuery("#gallery_'.$product_id.'").adGallery(settings_defaults_'.$product_id.');
            });
            </script>';
            $html .=  '<div id="gallery_'.$product_id.'" class="ad-gallery" style="width: '.$g_width.'px;">
                <div class="ad-image-wrapper"></div>
                <div class="ad-controls"> </div>
                  <div class="ad-nav">
                    <div class="ad-thumbs">
                      <ul class="ad-thumb-list">';

						$script_colorbox = '';
						$script_fancybox = '';
                        if ( is_array($attached_thumb) && count($attached_thumb) > 0 ) {
                            $i = 0;
                            $display = '';

                                $script_colorbox .= '<script type="text/javascript">';
								$script_fancybox .= '<script type="text/javascript">';
                                $script_colorbox .= '(function($){';
								$script_fancybox .= '(function($){';
                                $script_colorbox .= '$(function(){';
								$script_fancybox .= '$(function(){';
                                $script_colorbox .= '$(document).on("click", ".ad-gallery .lightbox", function(ev) { if( $(this).attr("rel") == "gallery_'.$product_id.'") {
									var idx = $("#gallery_'.$product_id.' .ad-image img").attr("idx");';
								$script_fancybox .= '$(document).on("click", ".ad-gallery .lightbox", function(ev) { if( $(this).attr("rel") == "gallery_'.$product_id.'") {
									var idx = $("#gallery_'.$product_id.' .ad-image img").attr("idx");';
                                if (count($attached_thumb) <= 1 ) {
                                   $script_colorbox .= '$(".gallery_product_'.$product_id.'").colorbox({open:true, maxWidth:"100%", title: function() { return "&nbsp;";} });';
									$script_fancybox .= '$.fancybox(';
                                } else {
                                    $script_colorbox .= '$(".gallery_product_'.$product_id.'").colorbox({rel:"gallery_product_'.$product_id.'", maxWidth:"100%", title: function() { return "&nbsp;";} }); $(".gallery_product_'.$product_id.'_"+idx).colorbox({open:true, maxWidth:"100%", title: function() { return "&nbsp;";} });';
									$script_fancybox .= '$.fancybox([';
                                }
                                $common = '';

								$idx = 0;
                                foreach ($attached_thumb as $item_thumb) {
									if ( get_post_meta( $item_thumb->ID, '_wpsc_exclude_image', true ) == 1 ) continue;
                                    $li_class = '';
                                    if ( $i == 0 ){ $li_class = 'first_item'; } elseif ( $i == count($attached_thumb)-1 ) { $li_class = 'last_item'; }
                                    $image_attribute = wp_get_attachment_image_src( $item_thumb->ID, 'full');
                                    $image_lager_default_url = $image_attribute[0];

									$image_thumb_attribute = wp_get_attachment_image_src( $item_thumb->ID, 'wpsc-dynamic-gallery-thumb');
                                    $image_thumb_default_url = $image_thumb_attribute[0];

                                    $thumb_height = $g_thumb_height;
                                    $thumb_width = $g_thumb_width;
                                    $width_old = $image_thumb_attribute[1];
                                    $height_old = $image_thumb_attribute[2];
									if ( $width_old > $g_thumb_width || $height_old > $g_thumb_height ){
                                        if ( $height_old > $g_thumb_height && $g_thumb_height > 0 ) {
                                            $factor = ($height_old / $g_thumb_height);
                                            $thumb_height = $g_thumb_height;
                                            $thumb_width = $width_old / $factor;
                                        }
                                        if ( $thumb_width > $g_thumb_width && $g_thumb_width > 0 ) {
                                            $factor = ($width_old / $g_thumb_width);
                                            $thumb_height = $height_old / $factor;
                                            $thumb_width = $g_thumb_width;
                                        } elseif ( $thumb_width == $g_thumb_width && $width_old > $g_thumb_width && $g_thumb_width > 0 ) {
                                            $factor = ($width_old / $g_thumb_width);
                                            $thumb_height = $height_old / $factor;
                                            $thumb_width = $g_thumb_width;
                                        }
                                    } else {
										$thumb_height = $height_old;
                                        $thumb_width = $width_old;
                                    }
                                   $alt = get_post_meta($item_thumb->ID, '_wp_attachment_image_alt', true);
								   $img_description = $item_thumb->post_excerpt;

                                    $html .=  '<li class="'.$li_class.'"><a alt="'.esc_attr( $alt ).'" class="gallery_product_'.$product_id.' gallery_product_'.$product_id.'_'.$idx.'"  title="'. esc_attr( $img_description ) .'" rel="gallery_product_'.$product_id.'" href="'.$image_lager_default_url.'"><div><img idx="'.$idx.'" style="width:'.$thumb_width.'px !important;height:'.$thumb_height.'px !important" src="'.$image_thumb_default_url.'" alt="Produit image sylc export" data-caption="'. esc_attr( $img_description ) .'" class="image'.$i.'" width="'.$thumb_width.'" height="'.$thumb_height.'"></div></a></li>';
                                    $img_description =  esc_js( $img_description ) ;
                                    if ( $img_description != '' ) {
										$script_fancybox .= $common.'{href:"'.$image_lager_default_url.'",title:"'.$img_description.'"}';
                                    } else {
										$script_fancybox .= $common.'{href:"'.$image_lager_default_url.'",title:""}';
                                    }
                                    $common = ',';
                                    $i++;
									$idx++;
								}
								 //$.fancybox([ {href : 'img1.jpg', title : 'Title'}, {href : 'img2.jpg', title : 'Title'} ])
                                if ( count($attached_thumb) <= 1 ) {
									$script_fancybox .= ');';
                                } else {
									$script_fancybox .= '],{
										 \'index\': idx
      								});';
                                }
                                $script_colorbox .= 'ev.preventDefault();';
                                $script_colorbox .= '} });';
								$script_fancybox .= '} });';
                                $script_colorbox .= '});';
								$script_fancybox .= '});';
                                $script_colorbox .= '})(jQuery);';
								$script_fancybox .= '})(jQuery);';
                                $script_colorbox .= '</script>';
								$script_fancybox .= '</script>';
                        } else {
                            $html .=  '<li style="width:'.$g_thumb_width.'px;height:'.$g_thumb_height.'px;"> <a style="width:'.($g_thumb_width-2).'px !important;height:'.($g_thumb_height - 2).'px !important;overflow:hidden;float:left !important" class="" rel="gallery_product_'.$product_id.'" href="'.WPSC_DYNAMIC_GALLERY_JS_URL . '/mygallery/no-image.png"> <div><img style="width:'.$g_thumb_width.'px;height:'.$g_thumb_height.'px;" src="'.WPSC_DYNAMIC_GALLERY_JS_URL . '/mygallery/no-image.png" class="image" alt="No image product sylc export"> </div></a> </li>';
                        }
						if ($popup_gallery == 'deactivate') {
                            $script_colorbox = '';
                            $script_fancybox = '';
                        } elseif ( $popup_gallery == 'colorbox' ) {
                        	$html .=  $script_colorbox;
						} else {
							$html .=  $script_fancybox;
						}
                        $html .=  '</ul>
                        </div>
                      </div>
                    </div>
          		</div>
        </div>';

		return $html;
	}
}
?>