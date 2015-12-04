<?php
/*
Plugin Name: WP e-Commerce Dynamic Gallery LITE
Plugin URI: http://a3rev.com/shop/wp-e-commerce-dynamic-gallery/
Description: Bring your product pages and presentation alive with WP e-Commerce Dynamic Gallery. Simply and Beautifully.
Version: 1.2.5
Author: A3 Revolution
Author URI: http://www.a3rev.com/
License: GPLv2 or later
*/

/*
	WP e-Commerce Dynamic Gallery. Plugin for the WP e-Commerce plugin.
	Copyright © 2011 A3 Revolution Software Development team

	A3 Revolution Software Development team
	admin@a3rev.com
	PO Box 1170
	Gympie 4570
	QLD Australia
*/
?>
<?php
define('WPSC_DYNAMIC_GALLERY_FILE_PATH', dirname(__FILE__));
define('WPSC_DYNAMIC_GALLERY_DIR_NAME', basename(WPSC_DYNAMIC_GALLERY_FILE_PATH));
define('WPSC_DYNAMIC_GALLERY_FOLDER', dirname(plugin_basename(__FILE__)));
define('WPSC_DYNAMIC_GALLERY_NAME', plugin_basename(__FILE__));
define('WPSC_DYNAMIC_GALLERY_URL', untrailingslashit(plugins_url('/', __FILE__)));
define('WPSC_DYNAMIC_GALLERY_DIR', WP_PLUGIN_DIR . '/' . WPSC_DYNAMIC_GALLERY_FOLDER);
define('WPSC_DYNAMIC_GALLERY_CSS_URL', WPSC_DYNAMIC_GALLERY_URL . '/assets/css');
define('WPSC_DYNAMIC_GALLERY_IMAGES_URL', WPSC_DYNAMIC_GALLERY_URL . '/assets/images');
define('WPSC_DYNAMIC_GALLERY_JS_URL', WPSC_DYNAMIC_GALLERY_URL . '/assets/js');
if (!defined("WPSC_DYNAMIC_GALLERY_DOCS_URI")) define("WPSC_DYNAMIC_GALLERY_DOCS_URI", "http://docs.a3rev.com/user-guides/plugins-extensions/wp-e-commerce/wpec-dynamic-gallery/");

include ('admin/admin-ui.php');
include ('admin/admin-interface.php');

include ('admin/admin-pages/dynamic-gallery-page.php');

include ('admin/admin-init.php');
include ('admin/less/sass.php');

include ('classes/class-wpsc-dynamic-gallery-functions.php');
include ('classes/class-wpsc-dynamic-gallery-variations.php');
include ('classes/class-wpsc-dynamic-gallery-preview.php');
include ('classes/class-wpsc-dynamic-gallery-hook-filter.php');
include ('classes/class-wpsc-dynamic-gallery-metaboxes.php');
include ('classes/class-wpsc-dynamic-gallery-display.php');

include ('admin/wpsc-dynamic-gallery-admin.php');

/**
 * Call when the plugin is activated
 */
register_activation_hook(__FILE__, 'wpsc_dynamic_gallery_install');


?>