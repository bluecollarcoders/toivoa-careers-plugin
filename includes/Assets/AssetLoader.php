<?php
/**
 * Class to register the Enqueue Script.
 *
 * @package M2_Careers\Assets
 */

namespace M2_Careers\Assets;

use M2_Careers\Traits\Singleton;

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
		add_action( 'enqueue_block_editor_assets', [ $this, 'm2_enqueue_career_sidebar_panel' ] );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0.0
	 */
	public function m2_enqueue_career_sidebar_panel() {

		// Only on Career post edit screen.
		$screen = get_current_screen();

		if ( ! $screen || $screen->post_type !== 'm2_career' ) {
			return;
		}

		$asset_file = include M2_CAREERS_PATH . 'blocks/career-details-sidebar/build/index.asset.php';

		wp_enqueue_script(
			'm2-career-details-sidebar',
			M2_CAREERS_URL . 'blocks/career-details-sidebar/build/index.js',
			$asset_file['dependencies'],
			$asset_file['version'],
			true
		);

		wp_enqueue_script( 'm2-career-details-sidebar' );
	}

}

// Initialize the plugin.
add_action( 'init', [ AssetLoader::class, 'instance' ] );
