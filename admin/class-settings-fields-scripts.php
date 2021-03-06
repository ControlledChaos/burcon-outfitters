<?php
/**
 * Settings fields for script loading and more.
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
 * Settings fields for script loading and more.
 *
 * @since  1.0.0
 * @access public
 */
class Settings_Fields_Scripts {

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

		// Register settings.
		add_action( 'admin_init', [ $this, 'settings' ] );

		// Include jQuery Migrate.
		$migrate = get_option( 'burcon_jquery_migrate' );
		if ( ! $migrate ) {
			add_action( 'wp_default_scripts', [ $this, 'include_jquery_migrate' ] );
		}

	}

	/**
	 * Register settings via the WordPress Settings API.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function settings() {

		/**
		 * Generl script options.
		 */
		add_settings_section( 'burcon-scripts-general', __( 'General Options', 'burcon-outfitters' ), [ $this, 'scripts_general_section_callback' ], 'burcon-scripts-general' );

		// Inline scripts.
		add_settings_field( 'burcon_inline_scripts', __( 'Inline Scripts', 'burcon-outfitters' ), [ $this, 'burcon_inline_scripts_callback' ], 'burcon-scripts-general', 'burcon-scripts-general', [ esc_html__( 'Add script contents to footer', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-general',
			'burcon_inline_scripts'
		);

		// Inline styles.
		add_settings_field( 'burcon_inline_styles', __( 'Inline Styles', 'burcon-outfitters' ), [ $this, 'burcon_inline_styles_callback' ], 'burcon-scripts-general', 'burcon-scripts-general', [ esc_html__( 'Add script-related CSS contents to head', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-general',
			'burcon_inline_styles'
		);

		// Inline jQuery.
		add_settings_field( 'burcon_inline_jquery', __( 'Inline jQuery', 'burcon-outfitters' ), [ $this, 'burcon_inline_jquery_callback' ], 'burcon-scripts-general', 'burcon-scripts-general', [ esc_html__( 'Deregister jQuery and add its contents to footer', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-general',
			'burcon_inline_jquery'
		);

		// Include jQuery Migrate.
		add_settings_field( 'burcon_jquery_migrate', __( 'jQuery Migrate', 'burcon-outfitters' ), [ $this, 'burcon_jquery_migrate_callback' ], 'burcon-scripts-general', 'burcon-scripts-general', [ esc_html__( 'Use jQuery Migrate for backwards compatibility', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-general',
			'burcon_jquery_migrate'
		);

		// Remove emoji script.
		add_settings_field( 'burcon_remove_emoji_script', __( 'Emoji Script', 'burcon-outfitters' ), [ $this, 'remove_emoji_script_callback' ], 'burcon-scripts-general', 'burcon-scripts-general', [ esc_html__( 'Remove emoji script from <head>', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-general',
			'burcon_remove_emoji_script'
		);

		// Remove WordPress version appended to script links.
		add_settings_field( 'burcon_remove_script_version', __( 'Script Versions', 'burcon-outfitters' ), [ $this, 'remove_script_version_callback' ], 'burcon-scripts-general', 'burcon-scripts-general', [ esc_html__( 'Remove WordPress version from script and stylesheet links in <head>', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-general',
			'burcon_remove_script_version'
		);

		// Minify HTML.
		add_settings_field( 'burcon_html_minify', __( 'Minify HTML', 'burcon-outfitters' ), [ $this, 'html_minify_callback' ], 'burcon-scripts-general', 'burcon-scripts-general', [ esc_html__( 'Minify HTML source code to increase load speed', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-general',
			'burcon_html_minify'
		);

		/**
		 * Use included vendor scripts & options.
		 */
		add_settings_section( 'burcon-scripts-vendor', __( 'Included Vendor Scripts', 'burcon-outfitters' ), [ $this, 'scripts_vendor_section_callback' ], 'burcon-scripts-vendor' );

		// Use Slick.
		add_settings_field( 'burcon_enqueue_slick', __( 'Slick', 'burcon-outfitters' ), [ $this, 'enqueue_slick_callback' ], 'burcon-scripts-vendor', 'burcon-scripts-vendor', [ esc_html__( 'Use Slick script and stylesheets', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-vendor',
			'burcon_enqueue_slick'
		);

		// Use Tabslet.
		add_settings_field( 'burcon_enqueue_tabslet', __( 'Tabslet', 'burcon-outfitters' ), [ $this, 'enqueue_tabslet_callback' ], 'burcon-scripts-vendor', 'burcon-scripts-vendor', [ esc_html__( 'Use Tabslet script', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-vendor',
			'burcon_enqueue_tabslet'
		);

		// Use Sticky-kit.
		add_settings_field( 'burcon_enqueue_stickykit', __( 'Sticky-kit', 'burcon-outfitters' ), [ $this, 'enqueue_stickykit_callback' ], 'burcon-scripts-vendor', 'burcon-scripts-vendor', [ esc_html__( 'Use Sticky-kit script', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-vendor',
			'burcon_enqueue_stickykit'
		);

		// Use Tooltipster.
		add_settings_field( 'burcon_enqueue_tooltipster', __( 'Tooltipster', 'burcon-outfitters' ), [ $this, 'enqueue_tooltipster_callback' ], 'burcon-scripts-vendor', 'burcon-scripts-vendor', [ esc_html__( 'Use Tooltipster script and stylesheet', 'burcon-outfitters' ) ] );

		register_setting(
			'burcon-scripts-vendor',
			'burcon_enqueue_tooltipster'
		);

		// Site Settings section.
		if ( class_exists( 'acf_pro' ) || ( class_exists( 'acf' ) && class_exists( 'acf_options_page' ) ) ) {

			add_settings_section( 'burcon-registered-fields-activate', __( 'Registered Fields Activation', 'burcon-outfitters' ), [ $this, 'registered_fields_activate' ], 'burcon-registered-fields-activate' );

			add_settings_field( 'burcon_acf_activate_settings_page', __( 'Site Settings Page', 'burcon-outfitters' ), [ $this, 'registered_fields_page_callback' ], 'burcon-registered-fields-activate', 'burcon-registered-fields-activate', [ __( 'Deactive the field group for the "Site Settings" options page.', 'burcon-outfitters' ) ] );

			register_setting(
				'burcon-registered-fields-activate',
				'burcon_acf_activate_settings_page'
			);

		}

	}

	/**
	 * General section callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function scripts_general_section_callback( $args ) {

		$html = sprintf( '<p>%1s</p>', esc_html__( 'Inline settings only apply to scripts and styles included with the plugin.' ) );

		echo $html;

	}

	/**
	 * Inline jQuery.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function burcon_inline_jquery_callback( $args ) {

		$option = get_option( 'burcon_inline_jquery' );

		$html = '<p><input type="checkbox" id="burcon_inline_jquery" name="burcon_inline_jquery" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_inline_jquery"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Include jQuery Migrate.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function burcon_jquery_migrate_callback( $args ) {

		$option = get_option( 'burcon_jquery_migrate' );

		$html = '<p><input type="checkbox" id="burcon_jquery_migrate" name="burcon_jquery_migrate" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_jquery_migrate"> '  . $args[0] . '</label><br />';

		$html .= '<small><em>Some outdated plugins and themes may be dependent on an old version of jQuery</em></small></p>';

		echo $html;

	}

	/**
	 * Inline scripts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function burcon_inline_scripts_callback( $args ) {

		$option = get_option( 'burcon_inline_scripts' );

		$html = '<p><input type="checkbox" id="burcon_inline_scripts" name="burcon_inline_scripts" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_inline_scripts"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Inline styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function burcon_inline_styles_callback( $args ) {

		$option = get_option( 'burcon_inline_styles' );

		$html = '<p><input type="checkbox" id="burcon_inline_styles" name="burcon_inline_styles" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_inline_styles"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Remove emoji script.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function remove_emoji_script_callback( $args ) {

		$option = get_option( 'burcon_remove_emoji_script' );

		$html = '<p><input type="checkbox" id="burcon_remove_emoji_script" name="burcon_remove_emoji_script" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_remove_emoji_script"> '  . $args[0] . '</label><br />';

		$html .= '<small><em>Emojis will still work in modern browsers</em></small></p>';

		echo $html;

	}

	/**
	 * Script options and enqueue settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function remove_script_version_callback( $args ) {

		$option = get_option( 'burcon_remove_script_version' );

		$html = '<p><input type="checkbox" id="burcon_remove_script_version" name="burcon_remove_script_version" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_remove_script_version"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Minify HTML source code.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function html_minify_callback( $args ) {

		$option = get_option( 'burcon_html_minify' );

		$html = '<p><input type="checkbox" id="burcon_html_minify" name="burcon_html_minify" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_html_minify"> '  . $args[0] . '</label></p>';

		echo $html;

	}

	/**
	 * Vendor section callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function scripts_vendor_section_callback( $args ) {

		$html = sprintf( '<p>%1s</p>', esc_html__( 'Look for Fancybox options on the Media Settings page.' ) );

		echo $html;

	}

	/**
	 * Use Slick.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function enqueue_slick_callback( $args ) {

		$option = get_option( 'burcon_enqueue_slick' );

		$html = '<p><input type="checkbox" id="burcon_enqueue_slick" name="burcon_enqueue_slick" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_enqueue_slick"> '  . $args[0] . '</label>';

		echo $html;

	}

	/**
	 * Use Tabslet.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function enqueue_tabslet_callback( $args ) {

		$option = get_option( 'burcon_enqueue_tabslet' );

		$html = '<p><input type="checkbox" id="burcon_enqueue_tabslet" name="burcon_enqueue_tabslet" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_enqueue_tabslet"> '  . $args[0] . '</label>';

		echo $html;

	}

	/**
	 * Use Sticky-kit.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function enqueue_stickykit_callback( $args ) {

		$option = get_option( 'burcon_enqueue_stickykit' );

		$html = '<p><input type="checkbox" id="burcon_enqueue_stickykit" name="burcon_enqueue_stickykit" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_enqueue_stickykit"> '  . $args[0] . '</label>';

		echo $html;

	}

	/**
	 * Use Tooltipster.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function enqueue_tooltipster_callback( $args ) {

		$option = get_option( 'burcon_enqueue_tooltipster' );

		$html = '<p><input type="checkbox" id="burcon_enqueue_tooltipster" name="burcon_enqueue_tooltipster" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="burcon_enqueue_tooltipster"> '  . $args[0] . '</label>';

		echo $html;

	}

	/**
	 * Site Settings section.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function registered_fields_activate() {

		if ( class_exists( 'acf_pro' ) || ( class_exists( 'acf' ) && class_exists( 'acf_options_page' ) ) ) {

			echo sprintf( '<p>%1s</p>', esc_html( 'The Burcon Outfitters plugin registers custom fields for Advanced Custom Fields Pro that can be imported for editing. These built-in field goups must be deactivated for the imported field groups to take effect.', 'burcon-outfitters' ) );

		}

	}

	/**
	 * Site Settings section callback.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	public function registered_fields_page_callback( $args ) {

		if ( class_exists( 'acf_pro' ) || ( class_exists( 'acf' ) && class_exists( 'acf_options_page' ) ) ) {

			$html = '<p><input type="checkbox" id="burcon_acf_activate_settings_page" name="burcon_acf_activate_settings_page" value="1" ' . checked( 1, get_option( 'burcon_acf_activate_settings_page' ), false ) . '/>';

			$html .= '<label for="burcon_acf_activate_settings_page"> '  . $args[0] . '</label></p>';

			echo $html;

		}

	}

	/**
	 * Include jQuery Migrate.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
    public function include_jquery_migrate( $scripts ) {

		if ( ! empty( $scripts->registered['jquery'] ) ) {

			$scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, [ 'jquery-migrate' ] );

		}

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function burcon_settings_fields_scripts() {

	return Settings_Fields_Scripts::instance();

}

// Run an instance of the class.
burcon_settings_fields_scripts();