<?php
/**
 * Register post types.
 *
 * @package    Burcon_Outfitters
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://codex.wordpress.org/Function_Reference/register_post_type
 */

namespace CC_Plugin\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register post types.
 *
 * @since  1.0.0
 * @access public
 */
final class Post_Types_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register custom post types.
		add_action( 'init', [ $this, 'register' ] );

	}

    /**
     * Register custom post types.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Post Type: Sample custom post (Custom Posts).
         *
         * Renaming:
         * Search case "Custom Post" and replace with your post type capitalized name.
         * Search case "custom post" and replace with your post type lowercase name.
         * Search case "burcon_post_type" and replace with your post type database name.
         */

        $labels = [
            'name'                  => __( 'Custom Posts', 'burcon-outfitters' ),
            'singular_name'         => __( 'Custom Post', 'burcon-outfitters' ),
            'menu_name'             => __( 'Custom Posts', 'burcon-outfitters' ),
            'all_items'             => __( 'All Custom Posts', 'burcon-outfitters' ),
            'add_new'               => __( 'Add New', 'burcon-outfitters' ),
            'add_new_item'          => __( 'Add New Custom Post', 'burcon-outfitters' ),
            'edit_item'             => __( 'Edit Custom Post', 'burcon-outfitters' ),
            'new_item'              => __( 'New Custom Post', 'burcon-outfitters' ),
            'view_item'             => __( 'View Custom Post', 'burcon-outfitters' ),
            'view_items'            => __( 'View Custom Posts', 'burcon-outfitters' ),
            'search_items'          => __( 'Search Custom Posts', 'burcon-outfitters' ),
            'not_found'             => __( 'No Custom Posts Found', 'burcon-outfitters' ),
            'not_found_in_trash'    => __( 'No Custom Posts Found in Trash', 'burcon-outfitters' ),
            'parent_item_colon'     => __( 'Parent Custom Post', 'burcon-outfitters' ),
            'featured_image'        => __( 'Featured image for this custom post', 'burcon-outfitters' ),
            'set_featured_image'    => __( 'Set featured image for this custom post', 'burcon-outfitters' ),
            'remove_featured_image' => __( 'Remove featured image for this custom post', 'burcon-outfitters' ),
            'use_featured_image'    => __( 'Use as featured image for this custom post', 'burcon-outfitters' ),
            'archives'              => __( 'Custom Post archives', 'burcon-outfitters' ),
            'insert_into_item'      => __( 'Insert into Custom Post', 'burcon-outfitters' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Custom Post', 'burcon-outfitters' ),
            'filter_items_list'     => __( 'Filter Custom Posts', 'burcon-outfitters' ),
            'items_list_navigation' => __( 'Custom Posts list navigation', 'burcon-outfitters' ),
            'items_list'            => __( 'Custom Posts List', 'burcon-outfitters' ),
            'attributes'            => __( 'Custom Post Attributes', 'burcon-outfitters' ),
            'parent_item_colon'     => __( 'Parent Custom Post', 'burcon-outfitters' ),
        ];

        $args = [
            'label'               => __( 'Custom Posts', 'burcon-outfitters' ),
            'labels'              => $labels,
            'description'         => __( 'Custom post type description.', 'burcon-outfitters' ),
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_rest'        => false,
            'rest_base'           => 'burcon_post_type_rest_api',
            'has_archive'         => true,
            'show_in_menu'        => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => false,
            'rewrite'             => [
                'slug'       => 'custom-posts',
                'with_front' => true
            ],
            'query_var'           => 'burcon_post_type',
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-admin-post',
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'author',
                'page-attributes',
                'post-formats'
            ],
            'taxonomies'          => [
                'category',
                'post_tag',
                'burcon_taxonomy' // Change to your custom taxonomy name.
            ],
        ];

        register_post_type(
            'burcon_post_type',
            $args
        );

    }

}

// Run the class.
new Post_Types_Register;