<?php
/**
 * Content for the Welcome Panel help tab.
 *
 * @package    Burcon_Outfitters
 * @subpackage Admin\Partials\Help
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @todo       Change this content when the custom welcome
 *             panel is ready to use.
 */

namespace CC_Plugin\Admin\Dashboard\Partials\Help;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>
<h3><?php _e( 'Welcome Panel', 'burcon-outfitters' ); ?></h3>
<p><?php _e( 'A custom, widgetized welcome panel is coming soon.', 'burcon-outfitters' ); ?></p>
<?php
echo sprintf(
	'<p>%1s <a href="%2s">%3s</a> %4s</p>',
	__( 'View options on the', 'burcon-outfitters' ),
	esc_url( 'http://localhost/controlledchaos/wp-admin/index.php?page=' . BURCON_ADMIN_SLUG . '-settings' ),
	__( 'Dashboard Settings', 'burcon-outfitters' ),
	__( 'page.', 'burcon-outfitters' )
); ?>