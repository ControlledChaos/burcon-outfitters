<?php
/**
 * About page site settings output.
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
<h3><?php _e( 'Website settings', 'burcon-outfitters' ); ?></h3>
<?php echo sprintf(
	'<p>%1s <a href="%2s">%3s</a> %4s</p>',
	__( 'The plugin is equipped with', 'burcon-outfitters' ),
	esc_url( admin_url( '?page=' . BURCON_ADMIN_SLUG . '-settings' ) ),
	__( 'an admin page', 'burcon-outfitters' ),
	__( 'for customizing the user interface of WordPress, as well as other useful features.', 'burcon-outfitters' )
 ); ?>
<h3><?php _e( 'Clean Up the Admin', 'burcon-outfitters' ); ?></h3>
<ul>
<li><?php _e( 'Remove dashboard widgets: WordPress news, quick press', 'burcon-outfitters' ); ?></li>
<li><?php _e( 'Make Menus and Widgets top level menu items', 'burcon-outfitters' ); ?></li>
<li><?php _e( 'Remove select admin menu items', 'burcon-outfitters' ); ?></li>
<li><?php _e( 'Remove WordPress logo from admin bar', 'burcon-outfitters' ); ?></li>
<li><?php _e( 'Remove access to theme and plugin editors', 'burcon-outfitters' ); ?></li>
</ul>
<h3><?php _e( 'Enchance the Admin', 'burcon-outfitters' ); ?></h3>
<ul>
<li><?php _e( 'Add three admin bar menus', 'burcon-outfitters' ); ?></li>
<li><?php _e( 'Add custom post types to the At a Glance widget', 'burcon-outfitters' ); ?></li>
<li><?php _e( 'Custom admin footer message', 'burcon-outfitters' ); ?></li>
</ul>