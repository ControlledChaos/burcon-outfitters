<?php
/**
 * Standard meta tags.
 *
 * @package    Burcon_Outfitters
 * @subpackage Frontend\Meta_Tags
 * @since      controlled-chaos 1.0.0
 */

namespace CC_Plugin\Frontend\Meta_Tags;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>

<!-- Standard meta -->
<meta name="title" content="<?php do_action( 'burcon_meta_title_tag' ); ?>" />
<?php if ( is_404() ) : ?>
<meta name="description" content="404: Not Found" />
<?php else : ?>
<meta name="description" content="<?php do_action( 'burcon_meta_description_tag' ); ?>" />
<?php endif; ?>
<?php if ( is_singular() ) : ?>
<meta name="author" content="<?php do_action( 'burcon_meta_author_tag' ); ?>" />
<?php endif; ?>
<meta name='copyright' content="<?php echo sprintf( '© Copyright %1s %2s. %3s.', get_the_time( 'Y' ), get_bloginfo( 'name' ), esc_attr__( 'All rights reserved', 'burcon-outfitters' ) ); ?>">
<meta name='language' content="<?php echo get_locale(); ?>">
