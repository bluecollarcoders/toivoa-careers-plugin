<?php
/**
 * Template functions for the plugin.
 *
 * @package M2_Careers
 */

namespace M2_Careers;

use M2_Careers\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Template functions for the plugin.
 *
 * This class handles template-related functionality for the M2 Careers plugin.
 * It provides methods for loading and rendering templates used throughout the plugin.
 *
 * @package M2_Careers
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
		
		$path = M2_CAREERS_PATH . "templates/{$template_name}";

		if ( ! file_exists( $path ) ) {
			return '';
		}

		// grab raw html.
		$html = file_get_contents( $path );

		// Build the real assets URL.
		$assets_url = untrailingslashit( M2_CAREERS_URL ) . '/assets/';

		// swap the placeholder for the real URL.
		$html = str_replace(
			'{{PLUGIN_ASSET_URL}}',
			esc_url( $assets_url ),
			$html
		);

		return $html;
	}


	/**
	 * Register block templates.
	 *
	 * @since 1.0.0
	 */
	public function register_block_templates(): void {

		$template_dir     = M2_CAREERS_PATH . 'templates/';
		$plugin_namespace = 'm2-careers';

			foreach ( glob( $template_dir . '*.html' ) as $file ) {
			$slug    = basename( $file, '.html' ); // e.g. single-job
			$content = $this->get_template_content( basename( $file ) );

			$args = [
				'title'      => ucwords( str_replace( '-', ' ', $slug ) ),
				'content'    => $content,
			];

			// Assign post_types for single templates.
			if ( str_starts_with( $slug, 'single-' ) ) {
				$args['post_types'] = [ 'm2_career' ];
			}
			// Handle page templates.
			if ( str_starts_with( $slug, 'page-' ) ) {
				$args['postTypes'] = [ 'page' ];
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
