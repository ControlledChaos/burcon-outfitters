<?php
/**
 * Open Graph meta tags.
 *
 * @package    Burcon_Outfitters
 * @subpackage Frontend\Meta_Tags
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       http://ogp.me/
 */

namespace CC_Plugin\Frontend\Meta_Tags;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>

<!-- Open Graph meta -->
<meta property="og:url" content="<?php do_action( 'burcon_meta_url_tag' ); ?>" />
<meta property="og:type" content="website" />
<meta property="og:locale" content="<?php echo get_locale(); ?>" />
<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
<meta property="og:title" content="<?php do_action( 'burcon_meta_title_tag' ); ?>" />
<?php if ( is_404() ) : ?>
<meta property="og:description" content="404: Not Found" />
<?php else : ?>
<meta property="og:description" content="<?php do_action( 'burcon_meta_description_tag' ); ?>" />
<?php endif; ?>
<meta property="og:image" content="<?php do_action( 'burcon_meta_image_tag' ); ?>" />
