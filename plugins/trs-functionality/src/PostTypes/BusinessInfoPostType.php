<?php
namespace TRS_Functionality\PostTypes;

/**
 * Registers the 'Business Info' custom post type.
 */
class BusinessInfoPostType {

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
            'name'                  => _x( 'Business Info', 'Post Type General Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'singular_name'         => _x( 'Business Info', 'Post Type Singular Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'menu_name'             => __( 'Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'name_admin_bar'        => __( 'Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'archives'              => __( 'Business Info Archives', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'attributes'            => __( 'Business Info Attributes', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'parent_item_colon'     => __( 'Parent Business Info:', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'all_items'             => __( 'All Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'add_new_item'          => __( 'Add New Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'add_new'               => __( 'Add New', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'new_item'              => __( 'New Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'edit_item'             => __( 'Edit Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'update_item'           => __( 'Update Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'view_item'             => __( 'View Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'view_items'            => __( 'View Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'search_items'          => __( 'Search Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'not_found'             => __( 'Not found', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'not_found_in_trash'    => __( 'Not found in Trash', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'featured_image'        => __( 'Featured Image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'set_featured_image'    => __( 'Set featured image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'remove_featured_image' => __( 'Remove featured image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'use_featured_image'    => __( 'Use as featured image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'insert_into_item'      => __( 'Insert into business info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'uploaded_to_this_item' => __( 'Uploaded to this business info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'items_list'            => __( 'Business Info list', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'items_list_navigation' => __( 'Business Info list navigation', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'filter_items_list'     => __( 'Filter business info list', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
        );
        $args = array(
            'label'                 => __( 'Business Info', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'description'           => __( 'Business Info (Logo, Social Profiles, Address, Email, etc.)', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'labels'                => $labels,
            'show_in_rest'          => true,
            'supports'              => array( 'title', 'editor', 'custom-fields', 'page-attributes' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-nametag',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'business_info', $args );
    }
}