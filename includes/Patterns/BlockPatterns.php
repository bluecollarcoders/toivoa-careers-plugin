<?php
/**
 * Block Patterns.
 *
 * @package M2_Careers
 */

namespace M2_Careers\Patterns;

use M2_Careers\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class BlockPatterns.
 */
final class BlockPatterns {

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
		add_action( 'init', [ $this, 'register_block_patterns' ] );
	}

	/**
	 * Register block patterns.
	 *
	 * @since 1.0.0
	 */
	public function register_block_patterns() {
		
		register_block_pattern_category( 'm2-careers', [
			'label' => __( 'M2 Careers', 'm2-careers' ),
		] );

		$asset_urls = [
			'%%ASSET_IMAGE_1%%' => M2_CAREERS_URL . 'assets/image-asset-1.png',
			'%%ASSET_IMAGE_2%%' => M2_CAREERS_URL . 'assets/image-asset-2.png',
			'%%ASSET_IMAGE_3%%' => M2_CAREERS_URL . 'assets/image-asset-3.png',
			'%%ASSET_IMAGE_5%%' => M2_CAREERS_URL . 'assets/image-asset-5.png',
			'%%ASSET_IMAGE_6%%' => M2_CAREERS_URL . 'assets/image-asset-6.png',
			'%%ASSET_IMAGE_7%%' => M2_CAREERS_URL . 'assets/image-asset-7.png',
		];

		$pattern_dir = M2_CAREERS_PATH . 'patterns/';
		
		foreach ( glob( $pattern_dir . '*.php' ) as $file ) {
			$file_content = file_get_contents( $file );
			
			// Extract header info and content.
			$header_end = strpos( $file_content, '?>' );

			if ( $header_end !== false ) {
				$pattern_content = trim( substr( $file_content, $header_end + 2 ) );
				$header          = substr( $file_content, 0, $header_end );

				foreach ( $asset_urls as $placeholder => $url ) {
					$pattern_content = str_replace( $placeholder, esc_url( $url ), $pattern_content );
				}
				
				// Parse title from header
				preg_match( '/\* Title:\s*(.+)/', $header, $title_match );
				$title = isset( $title_match[1] ) ? trim( $title_match[1] ) : ucwords( str_replace( '-', ' ', basename( $file, '.php' ) ) );
				
				register_block_pattern(
					'm2-careers/' . basename( $file, '.php' ),
					[
						'title'      => $title,
						'categories' => [ 'm2-careers' ],
						'content'    => $pattern_content,
					]
				);
			}
		}
	}

}

add_action( 'plugins_loaded', [ BlockPatterns::class, 'instance' ] );
