<?php
/**
 * Plugin Uninstall
 *
 * Uninstalling deletes options, tables, and pages.
 *
 */
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();

if (get_option('wpsc_dgallery_lite_clean_on_deletion') == 'yes') {
    delete_option('wpsc_dgallery_container_settings');
    delete_option('wpsc_dgallery_global_settings');
    delete_option('wpsc_dgallery_caption_settings');
    delete_option('wpsc_dgallery_navbar_settings');
    delete_option('wpsc_dgallery_lazyload_settings');
    delete_option('wpsc_dgallery_thumbnail_settings');

    delete_option('wpsc_dgallery_style_setting');

    delete_option('product_gallery_width');
    delete_option('width_type');
    delete_option('product_gallery_height');
    delete_option('product_gallery_auto_start');
    delete_option('product_gallery_speed');
    delete_option('product_gallery_effect');
    delete_option('product_gallery_animation_speed');
    delete_option('dynamic_gallery_stop_scroll_1image');
    delete_option('bg_image_wrapper');
    delete_option('border_image_wrapper_color');

    delete_option('popup_gallery');
    delete_option('dynamic_gallery_show_variation');

    delete_option('caption_font');
    delete_option('caption_font_size');
    delete_option('caption_font_style');
    delete_option('product_gallery_text_color');
    delete_option('product_gallery_bg_des');

    delete_option('product_gallery_nav');
    delete_option('navbar_font');
    delete_option('navbar_font_size');
    delete_option('navbar_font_style');
    delete_option('bg_nav_color');
    delete_option('bg_nav_text_color');
    delete_option('navbar_height');

    delete_option('lazy_load_scroll');
    delete_option('transition_scroll_bar');

    delete_option('enable_gallery_thumb');
    delete_option('dynamic_gallery_hide_thumb_1image');
    delete_option('thumb_width');
    delete_option('thumb_height');
    delete_option('thumb_spacing');

    delete_option('wpsc_dgallery_lite_clean_on_deletion');

    delete_post_meta_by_key('_actived_d_gallery');
    delete_post_meta_by_key('_wpsc_dgallery_show_variation');
    delete_post_meta_by_key('_wpsc_exclude_image');
    delete_post_meta_by_key('_wpsc_dgallery_in_variations');
}
