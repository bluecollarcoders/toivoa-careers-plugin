<?php
/**
 * Plugin Name:     M2 Careers
 * Plugin URI:      https://measuretwice.com/
 * Description:     Provides a Careers Custom Post Type and meta fields for the Measure Twice ecosystem.
 * Version:         1.0.0
 * Author:          Caleb Matteis
 * Text Domain:     m2-careers
 */

use M2_Careers\Loader;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Absolute filesystem path to our plugin directory.
 *
 * @var string
 */
if ( ! defined( 'M2_CAREERS_PATH' ) ) {
	define( 'M2_CAREERS_PATH', plugin_dir_path( __FILE__ ) );
}

/**
 * URL to our plugin directory.
 *
 * @var string
 */
if ( ! defined( 'M2_CAREERS_URL' ) ) {
	define( 'M2_CAREERS_URL', plugin_dir_url( __FILE__ ) );
}

// Load Composer Autoloader.
$autoload = M2_CAREERS_PATH . '/vendor/autoload.php';

// Autoland (if using composer).
if ( ! file_exists( $autoload ) ) {
	return;
}

// Autoload.php.
require_once $autoload;

Loader::instance();
