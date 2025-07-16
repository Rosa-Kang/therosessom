<?php
namespace TRS_Functionality\Taxonomies;

/**
 * Manages the registration of all custom taxonomies.
 */
class TaxonomyManager {

    /**
     * Registers all custom taxonomies.
     */
    public function register_taxonomies() {
        // Register Testimonial Category Taxonomy
        new TestimonialCategoryTaxonomy();

        // Register Portfolio Category Taxonomy
        new PortfolioCategoryTaxonomy();
    }
}