<?php
/**
 * Site settings page output.
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
}

/**
 * Active tab switcher.
 *
 * @since  1.0.0
 * @return void
 */
if ( isset( $_GET[ 'tab' ] ) ) {
    $active_tab = $_GET[ 'tab' ];
} else {
    $active_tab = 'dashboard';
}

/**
 * Set up the page tabs as an array for adding tabs
 * from another plugin or from a theme.
 *
 * @since  1.0.0
 * @return array
 */
$tabs = [

    // Dashboard tab.
    sprintf(
        '<a href="?page=%1s-settings&tab=dashboard" class="nav-tab %2s"><span class="dashicons dashicons-dashboard"></span> %3s</a>',
        BURCON_ADMIN_SLUG,
        $active_tab == 'dashboard' ? 'nav-tab-active' : '',
        esc_html__( 'Dashboard', 'burcon-outfitters' )
    ),

    // Admin menu tab.
    sprintf(
        '<a href="?page=%1s-settings&tab=admin-menu" class="nav-tab %2s"><span class="dashicons dashicons-menu"></span> %3s</a>',
        BURCON_ADMIN_SLUG,
        $active_tab == 'admin-menu' ? 'nav-tab-active' : '',
        esc_html__( 'Admin Menu', 'burcon-outfitters' )
    ),

    // Admin pages tab.
    sprintf(
        '<a href="?page=%1s-settings&tab=admin-pages" class="nav-tab %2s"><span class="dashicons dashicons-admin-page"></span> %3s</a>',
        BURCON_ADMIN_SLUG,
        $active_tab == 'admin-pages' ? 'nav-tab-active' : '',
        esc_html__( 'Admin Pages', 'burcon-outfitters' )
    ),

    // Meta/SEO tab.
    sprintf(
        '<a href="?page=%1s-settings&tab=meta-seo" class="nav-tab %2s"><span class="dashicons dashicons-tag"></span> %3s</a>',
        BURCON_ADMIN_SLUG,
        $active_tab == 'meta-seo' ? 'nav-tab-active' : '',
        esc_html__( 'Meta/SEO', 'burcon-outfitters' )
    )

];

// Apply a filter to the tabs array for adding tabs.
$page_tabs = apply_filters( 'burcon_tabs_site_settings', $tabs );

/**
 * Do settings section and fields by tab.
 *
 * @since  1.0.0
 * @return void
 */
if ( 'dashboard' == $active_tab  ) {
    $section = 'burcon-site-dashboard';
    $fields  = 'burcon_dashboard';
} elseif ( 'admin-menu' == $active_tab ) {
    $section = 'burcon-site-admin-menu';
    $fields  = 'burcon-site-admin-menu';
} elseif ( 'admin-pages' == $active_tab ) {
    $section = 'burcon-site-admin-pages';
    $fields  = 'burcon-site-admin-pages';
} elseif ( 'meta-seo' == $active_tab ) {
    $section = 'burcon-site-meta-seo';
    $fields  = 'burcon-site-meta-seo';
} else {
    $section = null;
    $fields  = null;
}

// Apply filters to the sections and fields for new tabs.
$do_section = apply_filters( 'burcon_section_site_settings', $section );
$do_fields  = apply_filters( 'burcon_fields_site_settings', $fields );

/**
 * Conditional save button text by tab.
 *
 * @since  1.0.0
 * @return string Returns the button label.
 */
if ( 'dashboard' == $active_tab  ) {
    $save = __( 'Save Dashboard', 'burcon-outfitters' );
} elseif ( 'admin-menu' == $active_tab ) {
    $save = __( 'Save Menu', 'burcon-outfitters' );
} elseif ( 'admin-pages' == $active_tab ) {
    $save = __( 'Save Pages', 'burcon-outfitters' );
} elseif ( 'meta-seo' == $active_tab ) {
    $save = __( 'Save Meta', 'burcon-outfitters' );
} else {
    $save = __( 'Save Settings', 'burcon-outfitters' );
}

// Apply a filter for new tabs added by another plugin or from a theme.
$button = apply_filters( 'burcon_save_site_settings', $save );

?>
<div class="wrap">
	<?php echo sprintf(
        '<h1 class="wp-heading-inline">%1s %2s</h1>',
        get_bloginfo( 'name' ),
        esc_html__( 'Settings', 'burcon-outfitters' )
    ); ?>
    <p class="description"><?php esc_html_e( 'Customize the way WordPress is used.', 'burcon-outfitters' ); ?></p>
    <hr class="wp-header-end">
    <h2 class="nav-tab-wrapper">
		<?php echo implode( $page_tabs ); ?>
    </h2>
	<form method="post" action="options.php">
        <?php
        settings_fields( $do_fields );
        do_settings_sections( $do_section );
        ?>
        <p class="submit"><?php submit_button( $button, 'primary', '', false, [] ); ?></p>
    </form>
</div>