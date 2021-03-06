<?php
/**
 * About page script options output.
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
<h3><?php _e( 'Script Inclusion and Loading', 'burcon-outfitters' ); ?></h3>
<?php echo sprintf(
	'<p>%1s <a href="%2s">%3s</a> %4s</p>',
	__( 'This plugin is equipped with', 'burcon-outfitters' ),
	esc_url( admin_url( 'options-general.php?page=' . BURCON_ADMIN_SLUG . '-scripts' ) ),
	__( 'an admin page', 'burcon-outfitters' ),
	__( 'for enqueueing third-party scripts included in the plugin, as well as for script loading options.', 'burcon-outfitters' )
 ); ?>
<h3><?php _e( 'Included Vendor Scripts', 'burcon-outfitters' ); ?></h3>
<p><?php _e( 'UI &amp; UX JS plugins ready to use', 'burcon-outfitters' ); ?></p>
<ul>
<?php echo sprintf( '<li>%1s - <a href="%2s" target="_blank">%3s</a></li>', _x( 'Fancybox 3', 'burcon-outfitters' ), esc_attr( 'https://github.com/fancyapps/fancybox' ), esc_url( 'https://github.com/fancyapps/fancybox' ) ); ?>
<?php echo sprintf( '<li>%1s - <a href="%2s" target="_blank">%3s</a></li>', _x( 'Slick', 'burcon-outfitters' ), esc_attr( 'https://github.com/kenwheeler/slick' ), esc_url( 'https://github.com/kenwheeler/slick' ) ); ?>
<?php echo sprintf( '<li>%1s - <a href="%2s" target="_blank">%3s</a></li>', _x( 'Tabslet', 'burcon-outfitters' ), esc_attr( 'https://github.com/vdw/Tabslet' ), esc_url( 'https://github.com/vdw/Tabslet' ) ); ?>
<?php echo sprintf( '<li>%1s - <a href="%2s" target="_blank">%3s</a></li>', _x( 'Sticky-kit', 'burcon-outfitters' ), esc_attr( 'https://github.com/leafo/sticky-kit' ), esc_url( 'https://github.com/leafo/sticky-kit' ) ); ?>
<?php echo sprintf( '<li>%1s - <a href="%2s" target="_blank">%3s</a></li>', _x( 'Tooltipster', 'burcon-outfitters' ), esc_attr( 'https://github.com/iamceege/tooltipster' ), esc_url( 'https://github.com/iamceege/tooltipster' ) ); ?>
<?php echo sprintf( '<li>%1s - <a href="%2s" target="_blank">%3s</a></li>', _x( 'FitVids', 'burcon-outfitters' ), esc_attr( 'https://github.com/davatron5000/FitVids.js' ), esc_url( 'https://github.com/davatron5000/FitVids.js' ) ); ?>
</ul>