<?php
namespace TRS_Functionality\PostTypes;

/**
 * Manages the registration of all custom post types.
 */
class PostTypeManager {

    /**
     * Registers all custom post types.
     */
    public function register_post_types() {
        // Register Testimonials Post Type
        new TestimonialPostType();

        // Register Portfolio Post Type (formerly Local Love)
        new PortfolioPostType();

        // Register Business Info Post Type
        new BusinessInfoPostType();
    }
}