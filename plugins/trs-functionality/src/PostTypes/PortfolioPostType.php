<?php
namespace TRS_Functionality\PostTypes;

/**
 * Registers the 'Portfolio' custom post type.
 */
class PortfolioPostType {

    /**
     * Constructor.
     */
    public function __construct() {
        $this->register();
    }

    /**
     * Register the post type.
     */
    private function register() {
        $labels = array(
            'name'                  => _x( 'Portfolios', 'Post Type General Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'menu_name'             => __( 'Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'name_admin_bar'        => __( 'Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'archives'              => __( 'Portfolio Archives', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'attributes'            => __( 'Portfolio Attributes', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'parent_item_colon'     => __( 'Parent Portfolio:', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'all_items'             => __( 'All Portfolios', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'add_new_item'          => __( 'Add New Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'add_new'               => __( 'Add New', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'new_item'              => __( 'New Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'edit_item'             => __( 'Edit Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'update_item'           => __( 'Update Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'view_item'             => __( 'View Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'view_items'            => __( 'View Portfolios', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'search_items'          => __( 'Search Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'not_found'             => __( 'Not found', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'not_found_in_trash'    => __( 'Not found in Trash', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'featured_image'        => __( 'Featured Image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'set_featured_image'    => __( 'Set featured image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'remove_featured_image' => __( 'Remove featured image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'use_featured_image'    => __( 'Use as featured image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'insert_into_item'      => __( 'Insert into Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'uploaded_to_this_item' => __( 'Uploaded to this Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'items_list'            => __( 'Portfolio list', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'items_list_navigation' => __( 'Portfolio list navigation', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'filter_items_list'     => __( 'Filter Portfolio List', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
        );
        $args = array(
            'label'                 => __( 'Portfolio', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'description'           => __( 'Website Portfolio items', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-images-alt2', // Changed icon to reflect portfolio
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true, // Often useful for portfolios
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post', // Changed to 'post' for standard post capabilities
            'rewrite'               => array( 'slug' => 'portfolio' ),
            'show_in_rest'          => true,
            'taxonomies'            => array( 'portfolio_category' ), // Link to the new taxonomy
        );
        register_post_type( 'portfolio', $args );
    }
}