<?php
/**
 * Plugin Name:     Toivoa Careers
 * Plugin URI:      https://toivoacoaching.com/
 * Description:     Provides a Careers Custom Post Type and block templates.
 * Version:         1.0.0
 * Author:          Caleb Matteis
 * Text Domain:     toivoa-careers
 */

use Toivoa_Careers\Loader;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Absolute filesystem path to our plugin directory.
 *
 * @var string
 */
if ( ! defined( 'TOIVOA_CAREERS_PATH' ) ) {
	define( 'TOIVOA_CAREERS_PATH', plugin_dir_path( __FILE__ ) );
}

/**
 * URL to our plugin directory.
 *
 * @var string
 */
if ( ! defined( 'TOIVOA_CAREERS_URL' ) ) {
	define( 'TOIVOA_CAREERS_URL', plugin_dir_url( __FILE__ ) );
}

// Load Composer Autoloader.
$autoload = TOIVOA_CAREERS_PATH . '/vendor/autoload.php';

// Autoland (if using composer).
if ( ! file_exists( $autoload ) ) {
	return;
}

// Autoload.php.
require_once $autoload;

Loader::instance();
