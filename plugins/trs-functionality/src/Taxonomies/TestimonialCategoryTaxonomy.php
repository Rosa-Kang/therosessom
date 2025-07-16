<?php
namespace TRS_Functionality\Taxonomies;

/**
 * Registers the 'Testimonial Category' custom taxonomy.
 */
class TestimonialCategoryTaxonomy {

    /**
     * Constructor.
     */
    public function __construct() {
        $this->register();
    }

    /**
     * Register the taxonomy.
     */
    private function register() {
        $labels = array(
            'name'                       => _x( 'Testimonial Categories', 'Taxonomy General Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'singular_name'              => _x( 'Testimonial Category', 'Taxonomy Singular Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'menu_name'                  => __( 'Testimonial Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'all_items'                  => __( 'All Testimonial Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'parent_item'                => __( 'Parent Testimonial Category', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'parent_item_colon'          => __( 'Parent Testimonial Category:', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'new_item_name'              => __( 'New Testimonial Category Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'add_new_item'               => __( 'Add New Testimonial Category', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'edit_item'                  => __( 'Edit Testimonial Category', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'update_item'                => __( 'Update Testimonial Category', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'view_item'                  => __( 'View Testimonial Category', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'separate_items_with_commas' => __( 'Separate Testimonial Categories with commas', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'add_or_remove_items'        => __( 'Add or remove Testimonial Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'choose_from_most_used'      => __( 'Choose from the most used', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'popular_items'              => __( 'Popular Testimonial Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'search_items'               => __( 'Search Testimonial Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'not_found'                  => __( 'Not Found', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'no_terms'                   => __( 'No Testimonial Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'items_list'                 => __( 'Testimonial Categories list', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'items_list_navigation'      => __( 'Testimonial Categories list navigation', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_menu'               => true,
            'show_in_quick_edit'         => true,
            'show_in_rest'               => true,
            'query_var'                  => true,
            'rewrite'                    => array( 'slug' => 'testimonial-category' ),
        );
        register_taxonomy( 'testimonial_category', array( 'testimonials' ), $args );
    }
}