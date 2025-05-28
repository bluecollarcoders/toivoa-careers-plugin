<?php

/**
 * Loader class.
 *
 * This class is responsible for loading the plugin's files.
 *
 * @package Toivoa_Careers\Includes
 */

namespace Toivoa_Careers;

use Toivoa_Careers\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Loader class.
 *
 * This class is responsible for loading the plugin's files.
 *
 * @package Toivoa_Careers\Includes
 */
final class Loader {

	use Singleton;

	/**
	 * Loader Constructor.
	 */
	private function __construct() {
		$this->_setup_hooks();
	}

	/**
	 * Setup hooks.
	 */
	private function _setup_hooks() {
		add_action( 'plugin_loaded', [ $this, 'load_classes' ] );
	}

	/**
	 * Get all class names dynamically from the `includes` and `sub` folders.
	 *
	 * @return array
	 */
	private function get_classes(): array {
		$classes  = [];
		$iterator = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator( __DIR__ )
		);

		foreach ( $iterator as $file ) {
			if ( $file->isFile() && $file->getExtension() === 'php' ) {

				$relative_path = str_replace( [ __DIR__ . '/', '.php' ], '', $file->getPathname() );
				$relative_path = str_replace( '/', '\\', $relative_path );
				$class         = __NAMESPACE__ . '\\' . $relative_path;

				if ( class_exists( $class ) ) {
					$classes[] = $class;
				}
			}
		}

		return $classes;
	}

	/**
	 * Load and instantiate classes.
	 *
	 * @return void
	 */
	public function load_classes(): void  {

		foreach ( $this->get_classes() as $class ) {
			if ( ! class_exists( $class ) ) {
				continue;
			}

			$class::instance();
		}
	}
}

// Initialize the class
add_action( 'init', [ Loader::class, 'instance' ] );
