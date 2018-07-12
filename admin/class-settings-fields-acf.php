<?php
/**
 * Site settings page field groups.
 *
 * @package    Burcon_Outfitters
 * @subpackage controlled-chaos\admin
 * @since      1.0.0
 */

namespace CC_Plugin\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Site settings page field groups.
 */
final class Settings_Fields_ACF {

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

			// Register settings page fields.
    		$instance->settings_fields();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void Constructor method is empty.
	 */
	public function __construct() {}

	/**
	 * Register settings page fields.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function settings_fields() {

		if ( function_exists( 'acf_add_local_field_group' ) ) :

			acf_add_local_field_group( [
				'key'    => 'group_5a0c7ff7764ca',
				'title'  => __( 'Settings Page', 'burcon-outfitters' ),
				'fields' => [
					[
						'key'               => 'field_5a0c8d7232b94',
						'label'             => __( 'Dashboard', 'burcon-outfitters' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => __( '', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_5a0c8f393edd6',
						'label'             => __( 'Hide Widgets', 'burcon-outfitters' ),
						'name'              => 'burcon_dashboard_hide_widgets',
						'type'              => 'checkbox',
						'instructions'      => __( 'Select the Dashboard widgets to hide.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'welcome'   => __( 'Welcome', 'burcon-outfitters' ),
							'news'      => __( 'WordPress News', 'burcon-outfitters' ),
							'quick'     => __( 'Quick Press', 'burcon-outfitters' ),
							'at_glance' => __( 'At a Glance', 'burcon-outfitters' ),
							'activity'  => __( 'Activity', 'burcon-outfitters' ),
						],
						'allow_custom'      => 0,
						'save_custom'       => 0,
						'default_value'     => [],
						'layout'            => 'horizontal',
						'toggle'            => 1,
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_5a0c800f57d56',
						'label'             => __( 'Admin Menu', 'burcon-outfitters' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => __( '', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_5aad41ffad3e6',
						'label'             => __( 'Settings Page Label', 'burcon-outfitters' ),
						'name'              => 'burcon_site_settings_link_label',
						'type'              => 'text',
						'instructions'      => __( '', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '51%',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => __( 'Site Settings', 'burcon-outfitters' ),
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_5a0c802257d57',
						'label'             => __( 'Menus Link', 'burcon-outfitters' ),
						'name'              => 'burcon_menus_position',
						'type'              => 'button_group',
						'instructions'      => __( 'Select the position of the Menus page link.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'top'     => __( 'Top Level', 'burcon-outfitters' ),
							'default' => __( 'Default', 'burcon-outfitters' ),
						],
						'allow_null'        => 0,
						'default_value'     => 'top',
						'layout'            => 'horizontal',
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_5a0c808757d58',
						'label'             => __( 'Widgets Link', 'burcon-outfitters' ),
						'name'              => 'burcon_widgets_position',
						'type'              => 'button_group',
						'instructions'      => __( 'Select the position of the Widgets page link.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'top'     => __( 'Top Level', 'burcon-outfitters' ),
							'default' => __( 'Default', 'burcon-outfitters' ),
						],
						'allow_null'        => 0,
						'default_value'     => 'top',
						'layout'            => 'horizontal',
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_5a0c80ab57d59',
						'label'             => __( 'Settings Page', 'burcon-outfitters' ),
						'name'              => 'burcon_settings_link_position',
						'type'              => 'button_group',
						'instructions'      => __( 'Select the position of this Settings page link, and whether to show or hide the other settings links.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'default' => __( 'Default/Show', 'burcon-outfitters' ),
							'top'     => __( 'Top Level/Hide', 'burcon-outfitters' ),
						],
						'allow_null'        => 0,
						'default_value'     => 'default',
						'layout'            => 'horizontal',
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_5a0c8d8a32b95',
						'label'             => __( 'Hide Links', 'burcon-outfitters' ),
						'name'              => 'burcon_admin_hide_links',
						'type'              => 'checkbox',
						'instructions'      => __( 'Select which menu items to hide.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper' => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'choices'           => [
							'themes'  => __( 'Appearance', 'burcon-outfitters' ),
							'plugins' => __( 'Plugins', 'burcon-outfitters' ),
							'users'   => __( 'Users', 'burcon-outfitters' ),
							'tools'   => __( 'Tools', 'burcon-outfitters' ),
							'fields'  => __( 'Custom Fields', 'burcon-outfitters' ),
						],
						'allow_custom'      => 0,
						'save_custom'       => 0,
						'default_value'     => [],
						'layout'            => 'horizontal',
						'toggle'            => 1,
						'return_format'     => 'value',
					],
					[
						'key'               => 'field_5aaa73e38deb3',
						'label'             => __( 'Restore Links Manager', 'burcon-outfitters' ),
						'name'              => 'burcon_links_manager',
						'type'              => 'true_false',
						'instructions'      => __( 'The old Links Manager is hidden by default in newer WordPress installations.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => '',
						'default_value'     => 0,
						'ui'                => 1,
						'ui_on_text'        => __( 'Enabled', 'burcon-outfitters' ),
						'ui_off_text'       => __( 'Disabled', 'burcon-outfitters' ),
					],
					[
						'key'               => 'field_5a0cbb3873e55',
						'label'             => __( 'Admin Pages', 'burcon-outfitters' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => __( '', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_5a0cbb5e73e56',
						'label'             => __( 'Admin Footer Credit', 'burcon-outfitters' ),
						'name'              => 'burcon_admin_footer_credit',
						'type'              => 'text',
						'instructions'      => __( 'The "developed by" credit.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_5a0cbba573e57',
						'label'             => __( 'Admin Footer Link', 'burcon-outfitters' ),
						'name'              => 'burcon_admin_footer_link',
						'type'              => 'url',
						'instructions'      => __( 'Link to the website devoloper.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
					],
					[
						'key'               => 'field_5a1989a036067',
						'label'             => __( 'Meta/SEO', 'burcon-outfitters' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => __( '', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'top',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_5a237090744c4',
						'label'             => __( 'Meta Tags', 'burcon-outfitters' ),
						'name'              => 'burcon_disable_meta_tags',
						'type'              => 'true_false',
						'instructions'      => __( 'Disable if you plan on using Yoast SEO or a similarly awful plugin.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'           => __( 'Check to disable', 'burcon-outfitters' ),
						'default_value'     => 0,
						'ui'                => 0,
						'ui_on_text'        => __( 'Disabled', 'burcon-outfitters' ),
						'ui_off_text'       => __( 'Enabled', 'burcon-outfitters' ),
					],
					[
						'key'               => 'field_5a198d601b523',
						'label'             => __( 'Blog Pages Title', 'burcon-outfitters' ),
						'name'              => 'burcon_meta_blog_title',
						'type'              => 'text',
						'instructions'      => __( 'Will use the site title if left empty.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_5a237090744c4',
									'operator' => '!=',
									'value'    => '1',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_5a198bd736068',
						'label'             => __( 'Blog Pages Description', 'burcon-outfitters' ),
						'name'              => 'burcon_meta_blog_description',
						'type'              => 'textarea',
						'instructions'      => __( 'Will use the site tagline if left empty and if a tagline is set.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_5a237090744c4',
									'operator' => '!=',
									'value'    => '1',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'maxlength'         => '',
						'rows'              => 4,
						'new_lines'         => '',
					],
					[
						'key'               => 'field_5a198c1836069',
						'label'             => __( 'Blog Pages Image', 'burcon-outfitters' ),
						'name'              => 'burcon_meta_blog_image',
						'type'              => 'image',
						'instructions'      => __( 'A minimum of 1230px by 600px is recommended for retina display devices.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_5a237090744c4',
									'operator' => '!=',
									'value'    => '1',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'return_format'     => 'array',
						'preview_size'      => 'medium',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					],
					[
						'key'               => 'field_5b2fd67604455',
						'label'             => __( 'Default Meta Image', 'burcon-outfitters' ),
						'name'              => 'burcon_meta_default_image',
						'type'              => 'image',
						'instructions'      => __( 'Will be used as a fallback for posts without a featured image and used for archive pages. A minimum of 1230px by 600px is recommended for retina display devices.', 'burcon-outfitters' ),
						'required'          => 0,
						'conditional_logic' => [
							[
								[
									'field'    => 'field_5a237090744c4',
									'operator' => '!=',
									'value'    => '1',
								],
							],
						],
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'return_format'     => 'array',
						'preview_size'      => 'medium',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					],
				],
				'location' => [
					[
						[
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => BURCON_ADMIN_SLUG . '-settings',
						],
					],
				],
				'menu_order'            => 0,
				'position'              => 'acf_after_title',
				'style'                 => 'seamless',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
				'description'           => '',
			 ] );

		endif;

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function burcon_settings_fields_acf() {

	return Settings_Fields_ACF::instance();

}

// Run an instance of the class.
burcon_settings_fields_acf();