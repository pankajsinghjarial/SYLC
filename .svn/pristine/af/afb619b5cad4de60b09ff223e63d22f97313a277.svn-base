<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
 
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">


<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed wrapper_hm">


	<?php /*?><header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><?php */?> 
    
    
    <div class="main_header">
  <div class="header">
    <div class="header_left">
      <div class="logo"><a href="http://www.sylc-export.com/ebay/"><img alt="Logo" src="http://www.sylc-export.com/ebay/images/logo.png"></a></div>
    </div>
      
    <div style="float:right; width:150px;"><ul class="header_social">
      <li><a target="_blank" href="https://www.facebook.com/pages/American-Car-Centrale/466939863325404"><img alt="Facebook" src="http://www.americancarcentrale.com/images/facebook_head.png"></a></li>
      <li><a target="_blank" href="http://www.youtube.com/user/yoathome?feature=results_main"><img alt="You Tube" src="http://www.americancarcentrale.com/images/youtube_head.png"></a></li>
    </ul>
    <div class="header_right"> <span class="contactez">Contactez-nous!</span> <span class="cell_number">
      01.60.29.99.02<br>06.98.22.51.82</span> </div></div>
    <div class="header_mid"><span>
    <?php
		//$my_file = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/file.txt';
		$my_file = getcwd().'/../file.txt';
		$handle = fopen($my_file, 'r+') or die('Cannot open file:  '.$my_file);
		$data = fread($handle,filesize($my_file));
		fclose($handle);
		echo number_format($data);
	?> </span> </div>
    <div class="clear"></div>
    <div class="banner"></div>
    <div class="clear"></div>
   <?php /*?> <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu nav', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?><?php */?>
   
   <div class="nav">
      <ul>
        <li><a href="http://www.sylc-export.com/ebay/home"><span> Accueil</span></a></li>
        <li><a href="http://www.sylc-export.com/ebay/announces"><span>LES ANNONCES</span></a></li>
        <li><a href="http://www.sylc-export.com/ebay/page/services" class="active"><span>Services</span></a>
            <ul>
              <li><a href="http://www.sylc-export.com/ebay/page/notre-mission">Notre mission</a></li>
              <li><a href="http://www.sylc-export.com/ebay/page/nos-garanties">Nos Garanties</a></li>
              <li><a href="http://www.sylc-export.com/ebay/page/logistique">Logistiques</a></li>
              <li><a href="http://www.sylc-export.com/ebay/page/conseils">Conseils</a></li>
              <li><a href="http://www.sylc-export.com/ebay/page/calculateur">Calculateur</a></li>
              <li><a href="http://www.sylc-export.com/ebay/page/devis">Devis</a></li>
              <li><a href="http://www.sylc-export.com/ebay/faq">FAQ</a></li>
            </ul>
        </li>
        <li><a href="http://www.sylc-export.com/ebay/page/presentation"><span>Presentation</span></a></li>
        <li><a href="http://www.sylc-export.com/ebay/nosstock"><span>Nos stocks</span></a>
            <ul>
              <li><a href="http://www.sylc-export.com/ebay/nosstock?stockType=neuf">Neuf</a></li>
              <li><a href="http://www.sylc-export.com/ebay/nosstock?stockType=classic">Classic Car</a></li>
            </ul>
        </li>
        <li class="last"><a href="http://www.sylc-export.com/ebay/contacts"><span>Contact</span></a></li>
      </ul>
    </div>
  </div>
</div>



<div class="main_middle">
	<div id="main" class="wrapper container_main">
    <div class="bread-crumbs">
		 <ul class="brb-ul">
		 	<li><a href="http://www.sylc-export.com/ebay"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/car-icon.png"></a></li>
		    <li><a class="bread-cus-active" href="http://www.sylc-export.com/ebay/blog">Blog</a></li>
		 </ul>
 	</div>