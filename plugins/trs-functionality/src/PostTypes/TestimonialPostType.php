<?php
namespace TRS_Functionality\PostTypes;

/**
 * Registers the 'Testimonial' custom post type.
 */
class TestimonialPostType {

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
            'name'                  => _x( 'Testimonials', 'Post Type General Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'menu_name'             => __( 'Testimonials', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'name_admin_bar'        => __( 'Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'archives'              => __( 'Testimonial Archives', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'attributes'            => __( 'Testimonial Attributes', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'parent_item_colon'     => __( 'Parent Testimonial:', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'all_items'             => __( 'All Testimonials', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'add_new_item'          => __( 'Add New Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'add_new'               => __( 'Add New', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'new_item'              => __( 'New Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'edit_item'             => __( 'Edit Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'update_item'           => __( 'Update Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'view_item'             => __( 'View Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'view_items'            => __( 'View Testimonials', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'search_items'          => __( 'Search Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'not_found'             => __( 'Not found', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'not_found_in_trash'    => __( 'Not found in Trash', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'featured_image'        => __( 'Featured Image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'set_featured_image'    => __( 'Set featured image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'remove_featured_image' => __( 'Remove featured image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'use_featured_image'    => __( 'Use as featured image', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'insert_into_item'      => __( 'Insert into Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'items_list'            => __( 'Testimonials list', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'items_list_navigation' => __( 'Testimonials list navigation', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'filter_items_list'     => __( 'Filter Testimonials List', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
        );
        $args = array(
            'label'                 => __( 'Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'description'           => __( 'Testimonial', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'labels'                => $labels,
            'show_in_rest'          => true,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-star-empty',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'testimonials', $args );
    }
}