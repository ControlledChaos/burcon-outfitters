<?php
/**
 * Settings for site customization.
 *
 * Uses the CCA_PARENT_PREFIX constant to get the options prefix
 * used in the parent plugin.
 *
 * @package    Burcon_Outfitters
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CC_Plugin\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Settings for site customization.
 *
 * @since  1.0.0
 * @access public
 */
class Settings_Fields_Site {

	/**
	 * Holds the values to be used in the fields callbacks.
	 *
	 * @var array
	 */
	private $options;

	/**
	 * Get an instance of the plugin class.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
    public function __construct() {

		// Register settings sections and fields.
		add_action( 'admin_init', [ $this, 'settings' ] );

	}

	/**
	 * Plugin site settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 *
	 * @link  https://codex.wordpress.org/Settings_API
	 */
	public function settings() {

		/**
		 * Dashboard settings.
		 *
		 * @since 1.0.0
		 */

		// Dashboard settings section.
		add_settings_section(
			'burcon-site-dashboard',
			__( 'Dashboard Settings', 'burcon-outfitters' ),
			[],
			'burcon-site-dashboard'
		);

		// Use the custom welcome panel.
		add_settings_field(
			'burcon_custom_welcome',
			__( 'Custom Welcome', 'burcon-outfitters' ),
			[ $this, 'burcon_custom_welcome_callback' ],
			'burcon-site-dashboard',
			'burcon-site-dashboard',
			[ esc_html__( 'Use the custom Welcome panel on the Dashboard', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon_dashboard',
			'burcon_custom_welcome'
		);

		// Hide the welcome panel.
		add_settings_field(
			'burcon_hide_welcome',
			__( 'Hide Welcome', 'burcon-outfitters' ),
			[ $this, 'burcon_hide_welcome_callback' ],
			'burcon-site-dashboard',
			'burcon-site-dashboard',
			[ esc_html__( 'Hide the Welcome panel on the Dashboard', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon_dashboard',
			'burcon_hide_welcome'
		);

		// Hide the welcome panel dismiss button.
		add_settings_field(
			'burcon_remove_welcome_dismiss',
			__( 'Remove Dismiss', 'burcon-outfitters' ),
			[ $this, 'burcon_remove_welcome_dismiss_callback' ],
			'burcon-site-dashboard',
			'burcon-site-dashboard',
			[ esc_html__( 'Remove the Welcome panel dismiss button', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon_dashboard',
			'burcon_remove_welcome_dismiss'
		);

		// Hide WordPress News widget.
		add_settings_field(
			'burcon_hide_wp_news',
			__( 'Hide WordPress News', 'burcon-outfitters' ),
			[ $this, 'burcon_hide_wp_news_callback' ],
			'burcon-site-dashboard',
			'burcon-site-dashboard',
			[ esc_html__( 'Hide the WordPress News widget on the Dashboard', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon_dashboard',
			'burcon_hide_wp_news'
		);

		// Hide Quick Draft (QuickPress) widget.
		add_settings_field(
			'burcon_hide_quickpress',
			__( 'Hide Quick Draft', 'burcon-outfitters' ),
			[ $this, 'burcon_hide_quickpress_callback' ],
			'burcon-site-dashboard',
			'burcon-site-dashboard',
			[ esc_html__( 'Hide the Quick Draft widget on the Dashboard', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon_dashboard',
			'burcon_hide_quickpress'
		);

		// Hide At a Glance widget.
		add_settings_field(
			'burcon_hide_at_glance',
			__( 'Hide At a Glance', 'burcon-outfitters' ),
			[ $this, 'burcon_hide_at_glance_callback' ],
			'burcon-site-dashboard',
			'burcon-site-dashboard',
			[ esc_html__( 'Hide the At a Glance widget on the Dashboard', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon_dashboard',
			'burcon_hide_at_glance'
		);

		// Hide Activity widget.
		add_settings_field(
			'burcon_hide_activity',
			__( 'Hide Activity', 'burcon-outfitters' ),
			[ $this, 'burcon_hide_activity_callback' ],
			'burcon-site-dashboard',
			'burcon-site-dashboard',
			[ esc_html__( 'Hide the Activity widget on the Dashboard', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon_dashboard',
			'burcon_hide_activity'
		);

		/**
		 * Admin menu settings.
		 *
		 * @since 1.0.0
		 */

		// Admin menu settings section.
		add_settings_section(
			'burcon-site-admin-menu',
			__( 'Admin Menu Settings', 'burcon-outfitters' ),
			[],
			'burcon-site-admin-menu'
		);

		// Site Settings page position.
		add_settings_field(
			'burcon_site_settings_position',
			__( 'Site Settings Position', 'burcon-outfitters' ),
			[ $this, 'burcon_site_settings_position_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Make this settings page a top-level link.', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_site_settings_position'
		);

		// Site Settings page link label.
		add_settings_field(
			'burcon_site_settings_link_label',
			__( 'Site Settings Label', 'burcon-outfitters' ),
			[ $this, 'burcon_site_settings_link_label_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Change the label of the link to this page', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_site_settings_link_label'
		);

		// Site Settings page link icon if set to top level.
		add_settings_field(
			'burcon_site_settings_link_icon',
			__( 'Site Settings Icon', 'burcon-outfitters' ),
			[ $this, 'burcon_site_settings_link_icon_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Enter a Dashicons class for the icon of the link to this page', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_site_settings_link_icon'
		);

		// Site Plugin page position.
		add_settings_field(
			'burcon_site_plugin_position',
			__( 'Site Plugin Position', 'burcon-outfitters' ),
			[ $this, 'burcon_site_plugin_position_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Make the site-specific plugin settings page a top-level link.', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_site_plugin_position'
		);

		// Site Plugin page link label.
		add_settings_field(
			'burcon_site_plugin_link_label',
			__( 'Site Plugin Label', 'burcon-outfitters' ),
			[ $this, 'burcon_site_plugin_link_label_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Change the label of the link to the site-specific plugin page', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_site_plugin_link_label'
		);

		// Site Plugin page link icon if set to top level.
		add_settings_field(
			'burcon_site_plugin_link_icon',
			__( 'Site Plugin Icon', 'burcon-outfitters' ),
			[ $this, 'burcon_site_plugin_link_icon_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Enter a Dashicons class for the icon of the link to the site-specific plugin page', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_site_plugin_link_icon'
		);

		// Menus link position.
		add_settings_field(
			'burcon_menus_position',
			__( 'Menus Position', 'burcon-outfitters' ),
			[ $this, 'burcon_menus_position_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Make Menus a top-level link', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_menus_position'
		);

		// Widgets link position.
		add_settings_field(
			'burcon_widgets_position',
			__( 'Widgets Position', 'burcon-outfitters' ),
			[ $this, 'burcon_widgets_position_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Make Widgets a top-level link', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_widgets_position'
		);

		// Hide Appearance link.
		add_settings_field(
			'burcon_hide_appearance',
			__( 'Hide Appearance', 'burcon-outfitters' ),
			[ $this, 'burcon_hide_appearance_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Hide the Appearance link in the admin menu', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_hide_appearance'
		);

		// Hide Plugins link.
		add_settings_field(
			'burcon_hide_plugins',
			__( 'Hide Plugins', 'burcon-outfitters' ),
			[ $this, 'burcon_hide_plugins_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Hide the Plugins link in the admin menu', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_hide_plugins'
		);

		// Hide Users link.
		add_settings_field(
			'burcon_hide_users',
			__( 'Hide Users', 'burcon-outfitters' ),
			[ $this, 'burcon_hide_users_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Hide the Users link in the admin menu', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_hide_users'
		);

		// Hide Tools link.
		add_settings_field(
			'burcon_hide_tools',
			__( 'Hide Tools', 'burcon-outfitters' ),
			[ $this, 'burcon_hide_tools_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'Hide the Tools link in the admin menu', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_hide_tools'
		);

		// Show/Hide Links Manager link.
		add_settings_field(
			'burcon_hide_links',
			__( 'Restore Links Manager', 'burcon-outfitters' ),
			[ $this, 'burcon_hide_links_callback' ],
			'burcon-site-admin-menu',
			'burcon-site-admin-menu',
			[ esc_html__( 'The old Links Manager is hidden by default in newer WordPress installations', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-admin-menu',
			'burcon_hide_links'
		);

		/**
		 * Admin pages settings.
		 *
		 * @since 1.0.0
		 */

		// Admin pages settings section.
		add_settings_section(
			'burcon-site-admin-pages',
			__( 'Admin Pages Settings', 'burcon-outfitters' ),
			[],
			'burcon-site-admin-pages'
		);

		/**
		 * Meta & SEO settings.
		 *
		 * @since 1.0.0
		 */

		// Meta/SEO settings section.
		add_settings_section(
			'burcon-site-meta-seo',
			__( 'Meta & SEO Settings', 'burcon-outfitters' ),
			[],
			'burcon-site-meta-seo'
		);

		// Disable meta tags.
		add_settings_field(
			'burcon_disable_meta',
			__( 'Meta Tags', 'burcon-outfitters' ),
			[ $this, 'burcon_disable_meta_callback' ],
			'burcon-site-meta-seo',
			'burcon-site-meta-seo',
			[ esc_html__( 'Disable if your theme includes SEO meta tags or if you plan on using an SEO plugin.', 'burcon-outfitters' ) ]
		);

		register_setting(
			'burcon-site-meta-seo',
			'burcon_disable_meta'
		);

	}

	/**
	 * Site Settings page position.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_site_settings_position_callback( $args ) {

		$option = get_option( 'burcon_site_settings_position' );

		$html = '<p><input type="checkbox" id="burcon_site_settings_position" name="burcon_site_settings_position" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_site_settings_position"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Site Settings page link label.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_site_settings_link_label_callback( $args ) {

		$option = get_option( 'burcon_site_settings_link_label' );

		$html = '<p><input type="text" size="50" id="burcon_site_settings_link_label" name="burcon_site_settings_link_label" value="' . esc_attr( $option ) . '" placeholder="' . esc_attr( __( 'Site Settings', 'burcon-outfitters' ) ) . '" /><br />';

		$html .= '<label for="burcon_site_settings_link_label"> ' . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Site Settings page link icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_site_settings_link_icon_callback( $args ) {

		$option = get_option( 'burcon_site_settings_link_icon' );

		$html = '<p><input type="text" size="50" id="burcon_site_settings_link_icon" name="burcon_site_settings_link_icon" value="' . esc_attr( $option ) . '" placeholder="' . esc_attr( __( 'dashicons-admin-settings', 'burcon-outfitters' ) ) . '" /><br />';

		$html .= '<label for="burcon_site_settings_link_icon"> ' . $args[0] . '</label>';

		$html .= '<br /><span class="description">' . esc_html( 'Takes affect in the admin menu only if the page is top level. Always takes affect on the plugin page tab for Site Settings.' ) . '</span></p>';

		echo $html;

	}

	/**
	 * Site Plugin page position.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_site_plugin_position_callback( $args ) {

		$option = get_option( 'burcon_site_plugin_position' );

		$html = '<p><input type="checkbox" id="burcon_site_plugin_position" name="burcon_site_plugin_position" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_site_plugin_position"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Site Plugin page link label.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_site_plugin_link_label_callback( $args ) {

		$option = get_option( 'burcon_site_plugin_link_label' );

		$html = '<p><input type="text" size="50" id="burcon_site_plugin_link_label" name="burcon_site_plugin_link_label" value="' . esc_attr( $option ) . '" placeholder="' . esc_attr( __( 'Site Plugin', 'burcon-outfitters' ) ) . '" /><br />';

		$html .= '<label for="burcon_site_plugin_link_label"> ' . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Site Plugin page link icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_site_plugin_link_icon_callback( $args ) {

		$option = get_option( 'burcon_site_plugin_link_icon' );

		$html = '<p><input type="text" size="50" id="burcon_site_settings_link_icon" name="burcon_site_plugin_link_icon" value="' . esc_attr( $option ) . '" placeholder="' . esc_attr( __( 'dashicons-welcome-learn-more', 'burcon-outfitters' ) ) . '" /><br />';

		$html .= '<label for="burcon_site_plugin_link_icon"> ' . $args[0] . '</label>';

		$html .= '<br /><span class="description">' . esc_html( 'Takes affect in the admin menu only if the page is top level. Always takes affect on the plugin page tab for Site Settings.' ) . '</span></p>';

		echo $html;

	}

	/**
	 * Menus link position.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_menus_position_callback( $args ) {

		$option = get_option( 'burcon_menus_position' );

		$html = '<p><input type="checkbox" id="burcon_menus_position" name="burcon_menus_position" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_menus_position"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Widgets link position.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_widgets_position_callback( $args ) {

		$option = get_option( 'burcon_widgets_position' );

		$html = '<p><input type="checkbox" id="burcon_widgets_position" name="burcon_widgets_position" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_widgets_position"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Use custom welcome panel.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_custom_welcome_callback( $args ) {

		$option = get_option( 'burcon_custom_welcome' );

		$html = '<p><input type="checkbox" id="burcon_custom_welcome" name="burcon_custom_welcome" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_custom_welcome"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Hide welcome panel.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_hide_welcome_callback( $args ) {

		$option = get_option( 'burcon_hide_welcome' );

		$html = '<p><input type="checkbox" id="burcon_hide_welcome" name="burcon_hide_welcome" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_hide_welcome"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Remove welcome dismiss.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_remove_welcome_dismiss_callback( $args ) {

		$option = get_option( 'burcon_remove_welcome_dismiss' );

		$html = '<p><input type="checkbox" id="burcon_remove_welcome_dismiss" name="burcon_remove_welcome_dismiss" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_remove_welcome_dismiss"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Hide WordPress News widget.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_hide_wp_news_callback( $args ) {

		$option = get_option( 'burcon_hide_wp_news' );

		$html = '<p><input type="checkbox" id="burcon_hide_wp_news" name="burcon_hide_wp_news" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_hide_wp_news"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Hide Quick Draft (QuickPress) widget.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_hide_quickpress_callback( $args ) {

		$option = get_option( 'burcon_hide_quickpress' );

		$html = '<p><input type="checkbox" id="burcon_hide_quickpress" name="burcon_hide_quickpress" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_hide_quickpress"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Hide At a Glance widget.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_hide_at_glance_callback( $args ) {

		$option = get_option( 'burcon_hide_at_glance' );

		$html = '<p><input type="checkbox" id="burcon_hide_at_glance" name="burcon_hide_at_glance" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_hide_at_glance"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Hide Activity widget.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_hide_activity_callback( $args ) {

		$option = get_option( 'burcon_hide_activity' );

		$html = '<p><input type="checkbox" id="burcon_hide_activity" name="burcon_hide_activity" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_hide_activity"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Hide Appearance link.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_hide_appearance_callback( $args ) {

		$option = get_option( 'burcon_hide_appearance' );

		$html = '<p><input type="checkbox" id="burcon_hide_appearance" name="burcon_hide_appearance" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_hide_appearance"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Hide Plugins link.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_hide_plugins_callback( $args ) {

		$option = get_option( 'burcon_hide_plugins' );

		$html = '<p><input type="checkbox" id="burcon_hide_plugins" name="burcon_hide_plugins" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_hide_plugins"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Hide Users link.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_hide_users_callback( $args ) {

		$option = get_option( 'burcon_hide_users' );

		$html = '<p><input type="checkbox" id="burcon_hide_users" name="burcon_hide_users" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_hide_users"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Hide Tools link.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_hide_tools_callback( $args ) {

		$option = get_option( 'burcon_hide_tools' );

		$html = '<p><input type="checkbox" id="burcon_hide_tools" name="burcon_hide_tools" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_hide_tools"> ' . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Show/Hide Links Manager link.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_hide_links_callback( $args ) {

		$option = get_option( 'burcon_hide_links' );

		$html = '<p><input type="checkbox" id="burcon_hide_links" name="burcon_hide_links" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_hide_links"> ' . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Disable meta tags.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function burcon_disable_meta_callback( $args ) {

		$option = get_option( 'burcon_disable_meta' );

		$html = '<p><input type="checkbox" id="burcon_disable_meta" name="burcon_disable_meta" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_disable_meta"> '  . $args[0] . '</label></p>';

		echo $html;

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function burcon_settings_fields_site() {

	return Settings_Fields_Site::instance();

}

// Run an instance of the class.
burcon_settings_fields_site();