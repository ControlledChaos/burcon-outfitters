<?php
/**
 * About page media options output.
 *
 * @package    Burcon_Outfitters
 * @subpackage Admin\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CC_Plugin\Admin\Partials;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>
<h2><?php _e( 'Media and Upload Options', 'burcon-outfitters' ); ?></h2>
<h3><?php _e( 'Image Sizes', 'burcon-outfitters' ); ?></h3>
<ul>
<li><?php _e( 'Add option to hard crop the medium and/or large image sizes', 'burcon-outfitters' ); ?></li>
<li><?php _e( 'Add option to allow SVG uploads to the Media Library', 'burcon-outfitters' ); ?></li>
</ul>
<h3><?php _e( 'Fancybox Presentation', 'burcon-outfitters' ); ?></h3>
<h3><?php _e( 'SVG Uploads', 'burcon-outfitters' ); ?></h3>