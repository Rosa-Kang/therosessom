<?php
namespace TRS_Functionality\Taxonomies;

/**
 * Registers the 'Portfolio Category' custom taxonomy for the 'portfolio' post type.
 */
class PortfolioCategoryTaxonomy {

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
            'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'menu_name'                  => __( 'Portfolio Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'all_items'                  => __( 'All Portfolio Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'parent_item'                => __( 'Parent Portfolio Category', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'parent_item_colon'          => __( 'Parent Portfolio Category:', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'new_item_name'              => __( 'New Portfolio Category Name', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'add_new_item'               => __( 'Add New Portfolio Category', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'edit_item'                  => __( 'Edit Portfolio Category', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'update_item'                => __( 'Update Portfolio Category', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'view_item'                  => __( 'View Portfolio Category', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'separate_items_with_commas' => __( 'Separate Portfolio Categories with commas', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'add_or_remove_items'        => __( 'Add or remove Portfolio Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'choose_from_most_used'      => __( 'Choose from the most used', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'popular_items'              => __( 'Popular Portfolio Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'search_items'               => __( 'Search Portfolio Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'not_found'                  => __( 'Not Found', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'no_terms'                   => __( 'No Portfolio Categories', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'items_list'                 => __( 'Portfolio Categories list', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
            'items_list_navigation'      => __( 'Portfolio Categories list navigation', TRS_FUNCTIONALITY_TEXT_DOMAIN ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true, // Make it hierarchical like categories
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => false, // Categories usually don't need tag clouds
            'show_in_menu'               => true,
            'show_in_quick_edit'         => true,
            'show_in_rest'               => true, // Enable for Gutenberg/REST API
            'query_var'                  => true,
            'rewrite'                    => array( 'slug' => 'portfolio-category' ),
        );
        register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

        // Add default categories if they don't exist
        if ( ! term_exists( 'Video', 'portfolio_category' ) ) {
            wp_insert_term( 'Video', 'portfolio_category', array( 'slug' => 'video' ) );
        }
        if ( ! term_exists( 'Photography', 'portfolio_category' ) ) {
            wp_insert_term( 'Photography', 'portfolio_category', array( 'slug' => 'photography' ) );
        }
    }
}