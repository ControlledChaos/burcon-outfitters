<?php
/**
 * Register taxonomies.
 *
 * @package    Burcon_Outfitters
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://codex.wordpress.org/Function_Reference/register_taxonomy
 */

namespace CC_Plugin\Includes\Taxonomies_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register taxonomies.
 *
 * @since  1.0.0
 * @access public
 */
final class Taxonomies_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register custom taxonomies.
		add_action( 'init', [ $this, 'register' ] );

	}

    /**
     * Register custom taxonomies.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Taxonomy: Sample taxonomy (Taxonomy).
         *
         * Renaming:
         * Search case "Taxonomy" and replace with your post type singular name.
         * Search case "Taxonomies" and replace with your post type plural name.
         * Search case "burcon_taxonomy" and replace with your taxonomy database name.
         * Search case "taxonomies" and replace with your taxonomy permalink slug.
         */

        $labels = [
            'name'                       => __( 'Taxonomies', 'burcon-outfitters' ),
            'singular_name'              => __( 'Taxonomy', 'burcon-outfitters' ),
            'menu_name'                  => __( 'Taxonomy', 'burcon-outfitters' ),
            'all_items'                  => __( 'All Taxonomies', 'burcon-outfitters' ),
            'edit_item'                  => __( 'Edit Taxonomy', 'burcon-outfitters' ),
            'view_item'                  => __( 'View Taxonomy', 'burcon-outfitters' ),
            'update_item'                => __( 'Update Taxonomy', 'burcon-outfitters' ),
            'add_new_item'               => __( 'Add New Taxonomy', 'burcon-outfitters' ),
            'new_item_name'              => __( 'New Taxonomy', 'burcon-outfitters' ),
            'parent_item'                => __( 'Parent Taxonomy', 'burcon-outfitters' ),
            'parent_item_colon'          => __( 'Parent Taxonomy', 'burcon-outfitters' ),
            'popular_items'              => __( 'Popular Taxonomies', 'burcon-outfitters' ),
            'separate_items_with_commas' => __( 'Separate Taxonomies with commas', 'burcon-outfitters' ),
            'add_or_remove_items'        => __( 'Add or Remove Taxonomies', 'burcon-outfitters' ),
            'choose_from_most_used'      => __( 'Choose from the most used Taxonomies', 'burcon-outfitters' ),
            'not_found'                  => __( 'No Taxonomies Found', 'burcon-outfitters' ),
            'no_terms'                   => __( 'No Taxonomies', 'burcon-outfitters' ),
            'items_list_navigation'      => __( 'Taxonomies List Navigation', 'burcon-outfitters' ),
            'items_list'                 => __( 'Taxonomies List', 'burcon-outfitters' )
        ];

        $args = [
            'label'              => __( 'Taxonomies', 'burcon-outfitters' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => false,
            'label'              => 'Taxonomies',
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug'         => 'taxonomies',
                'with_front'   => true,
                'hierarchical' => false,
            ],
            'show_admin_column'  => true,
            'show_in_rest'       => true,
            'rest_base'          => 'taxonomies',
            'show_in_quick_edit' => true
        ];

        register_taxonomy(
            'burcon_taxonomy',
            [
                'burcon_post_type'
            ],
            $args
        );

    }

}

// Run the class.
new Taxonomies_Register;