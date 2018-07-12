<?php
/**
 * Twitter card meta tags.
 *
 * @package    Burcon_Outfitters
 * @subpackage Frontend\Meta_Tags
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://developer.twitter.com/en/docs/tweets/optimize-with-cards/overview/markup.html
 */

namespace CC_Plugin\Frontend\Meta_Tags;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>

<!-- Twitter Card meta -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:domain" content="<?php echo esc_url( home_url() ); ?>">
<meta name="twitter:site" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
<?php if ( ! is_404() ) : ?>
<meta name="twitter:url" content="<?php do_action( 'burcon_meta_url_tag' ); ?>" />
<?php endif; ?>
<meta name="twitter:title" content="<?php do_action( 'burcon_meta_title_tag' ); ?>" />
<?php if ( is_404() ) : ?>
<meta name="twitter:description" content="404: Not Found" />
<?php else : ?>
<meta name="twitter:description" content="<?php do_action( 'burcon_meta_description_tag' ); ?>" />
<?php endif; ?>
<meta name="twitter:image:src" content="<?php do_action( 'burcon_meta_image_tag' ); ?>" />
