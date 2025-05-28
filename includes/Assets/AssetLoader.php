<?php
/**
 * Class to register the Enqueue Script.
 *
 * @package Toivoa\Careers
 */

namespace Toivoa_Careers\Assets;

use Toivoa_Careers\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Asset Loader class.
 *
 * Handles the registration and enqueuing of scripts and styles for the plugin.
 *
 * @since 1.0.0
 */

final class AssetLoader {

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
		add_action( 'enqueue_block_editor_assets', [ $this, 'toivoa_enqueue_job_sidebar_panel' ] );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0.0
	 */
	public function toivoa_enqueue_job_sidebar_panel() {

		// Only on Job post edit screen.
		$screen = get_current_screen();

		if ( ! $screen || $screen->post_type !== 'job' ) {
			return;
		}
		
		  $asset_file = include TOIVOA_CAREERS_PATH . 'blocks/job-details-sidebar/build/index.asset.php';

			wp_enqueue_script(
				'toivoa-job-details-sidebar',
				TOIVOA_CAREERS_URL . 'blocks/job-details-sidebar/build/index.js',
				$asset_file['dependencies'],
				$asset_file['version'],
				true
			);

			wp_enqueue_script( 'toivoa-job-details-sidebar' );
	}

}

// Initialize the plugin.
add_action( 'init', [ AssetLoader::class, 'instance' ] );
