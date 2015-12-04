<?php
/**
 * Template Name: detail-form
 * Description: A Page Template that showcases Sticky Posts, Asides, and Blog Posts
 *
 * The showcase template in Twenty Eleven consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

// Enqueue showcase script for the slider
?>

		<div class="detail_form_outer01">
	<div class="detail_form_title">
    <p>ENREGISTREZ-VOUS ET RECEVEZ DES ALERTES SUR CETTE VOITURE.</p>
    </div>
    <div class="detail_form_content">
    <div class="form_outer">
    
    
    	<?php do_shortcode('[contact-form-7 id="236" title="Sans titre"]'); ?>
    
            </div>
          </div>
</div>