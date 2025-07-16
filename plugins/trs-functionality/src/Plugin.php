<?php
namespace TRS_Functionality;

use TRS_Functionality\Admin\AdminManager;
use TRS_Functionality\PostTypes\PostTypeManager;
use TRS_Functionality\Taxonomies\TaxonomyManager;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks,
 * and public-facing site hooks.
 */
class Plugin {

    /**
     * The loader that's responsible for maintaining and registering all hooks.
     * @var array
     */
    protected $loaders;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public area.
     */
    public function __construct() {
        $this->loaders = [];
        $this->define_admin_hooks();
        $this->define_post_type_hooks();
        $this->define_taxonomy_hooks();
    }

    /**
     * Register all of the hooks related to the admin area.
     */
    private function define_admin_hooks() {
        $admin_manager = new AdminManager( TRS_FUNCTIONALITY_BASENAME );

        add_filter( 'http_request_args', [ $admin_manager, 'hide_plugin_from_updates' ], 5, 2 );
        add_action( 'admin_notices', [ $admin_manager, 'hide_update_notice_nonadmins' ], 1 );
        add_action( 'admin_menu', [ $admin_manager, 'remove_menus' ] );
        add_action( 'admin_menu', [ $admin_manager, 'remove_submenus' ], 110 );
        add_filter( 'post_updated_messages', [ $admin_manager, 'set_updated_messages' ] );

        // Store for later execution if needed, though direct add_action/filter is fine here.
        $this->loaders[] = $admin_manager;
    }

    /**
     * Register all of the hooks related to custom post types.
     */
    private function define_post_type_hooks() {
        $post_type_manager = new PostTypeManager();
        add_action( 'init', [ $post_type_manager, 'register_post_types' ], 0 );

        $this->loaders[] = $post_type_manager;
    }

    /**
     * Register all of the hooks related to custom taxonomies.
     */
    private function define_taxonomy_hooks() {
        $taxonomy_manager = new TaxonomyManager();
        add_action( 'init', [ $taxonomy_manager, 'register_taxonomies' ], 0 );

        $this->loaders[] = $taxonomy_manager;
    }

    /**
     * Run the loader to execute all of the hooks.
     */
    public function run() {
        // Activation Hook
        register_activation_hook( TRS_FUNCTIONALITY_PATH . 'trs-functionality.php', [ $this, 'activate' ] );
        // Deactivation Hook (if needed)
        // register_deactivation_hook( TRS_FUNCTIONALITY_PATH . 'trs-functionality.php', [ $this, 'deactivate' ] );
    }

    /**
     * Plugin activation hook.
     *
     * @static
     */
    public static function activate() {
        if ( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }

        // Flush permalink rewrite rules
        flush_rewrite_rules();

        // Any other activation tasks...
    }

    /**
     * Plugin deactivation hook.
     *
     * @static
     */
    // public static function deactivate() {
    //    // Any deactivation tasks...
    // }
}