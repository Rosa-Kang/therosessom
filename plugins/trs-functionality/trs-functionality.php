<?php
/**
 * Plugin Name: TRS Functionality
 * Description: This very important plugin contains all of the core functionality for this website so that it remains theme-independent.
 * Version: 2.0.0
 * Author: Therosessom
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: trs-functionality
 *
 * @package TRS_Functionality
 * @author Therosessom
 * @license GPL-2.0+
 * @copyright 2020 Therosessom
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Define plugin constants
define( 'TRS_FUNCTIONALITY_VERSION', '1.0.0' );
define( 'TRS_FUNCTIONALITY_PATH', plugin_dir_path( __FILE__ ) );
define( 'TRS_FUNCTIONALITY_URL', plugin_dir_url( __FILE__ ) );
define( 'TRS_FUNCTIONALITY_BASENAME', plugin_basename( __FILE__ ) );
define( 'TRS_FUNCTIONALITY_TEXT_DOMAIN', 'trs-functionality' );

// Autoload Composer dependencies
if ( file_exists( TRS_FUNCTIONALITY_PATH . 'vendor/autoload.php' ) ) {
    require_once TRS_FUNCTIONALITY_PATH . 'vendor/autoload.php';
}

// Initialize the plugin
function trs_functionality_run() {
    $plugin = new TRS_Functionality\Plugin();
    $plugin->run();
}
add_action( 'plugins_loaded', 'trs_functionality_run' );