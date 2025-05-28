<?php
/**
 * Template functions for the plugin.
 *
 * @package Toivoa_Careers
 */

namespace Toivoa_Careers;

use Toivoa_Careers\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Template functions for the plugin.
 *
 * This class handles template-related functionality for the Toivoa Careers plugin.
 * It provides methods for loading and rendering templates used throughout the plugin.
 *
 * @package Toivoa_Careers
 */

final class Templates {

	use Singleton;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {
		$this->setup_hooks();
	}

	/**
	 * Setup hooks.
	 *
	 * @since 1.0.0
	 */
	protected function setup_hooks() {
		add_action( 'init', [ $this, 'register_block_templates' ] );
	}

	/**
	 * Get the content of a template.
	 *
	 * @param string $template_name The name of the template.
	 * @return string The content of the template.
	 */
	private function get_template_content( string $template_name ): string {
		
		$path = TOIVOA_CAREERS_PATH . "templates/{$template_name}";

        if ( file_exists( $path ) ) {
            ob_start();
            include $path;
            return ob_get_clean();
        }

        return '';
	}


	/**
	 * Register block templates.
	 *
	 * @since 1.0.0
	 */
	public function register_block_templates(): void {

		$template_dir     = TOIVOA_CAREERS_PATH . 'templates/';
		$plugin_namespace = 'toivoa-careers';

			foreach ( glob( $template_dir . '*.html' ) as $file ) {
			$slug    = basename( $file, '.html' ); // e.g. single-job
			$content = $this->get_template_content( basename( $file ) );

			$args = [
				'title'      => ucwords( str_replace( '-', ' ', $slug ) ),
				'content'    => $content,
			];

			// Only assign post_types for single templates.
			if ( str_starts_with( $slug, 'single-' ) ) {
				$args['post_types'] = [ 'job' ];
			}

			register_block_template(
				"{$plugin_namespace}//{$slug}",
				$args
			);

		}
	}

}

// Initialize the class
add_action('plugins_loaded', [ Templates::class, 'instance' ] );
