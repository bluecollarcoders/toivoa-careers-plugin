<?php
/**
 * Block Patterns.
 *
 * @package ToivoaCareers
 */

namespace Toivoa_Careers\Patterns;

use Toivoa_Careers\Traits\Singleton;

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
		
		register_block_pattern_category( 'toivoa-careers', [
			'label' => __( 'Toivoa Careers', 'toivoa-careers' ),
		] );

		$asset_urls = [
			'%%ASSET_IMAGE_1%%' => TOIVOA_CAREERS_URL . 'assets/image-asset-1.png',
			'%%ASSET_IMAGE_2%%' => TOIVOA_CAREERS_URL . 'assets/image-asset-2.png',
			'%%ASSET_IMAGE_3%%' => TOIVOA_CAREERS_URL . 'assets/image-asset-3.png',
			'%%ASSET_IMAGE_5%%' => TOIVOA_CAREERS_URL . 'assets/image-asset-5.png',
			'%%ASSET_IMAGE_6%%' => TOIVOA_CAREERS_URL . 'assets/image-asset-6.png',
			'%%ASSET_IMAGE_7%%' => TOIVOA_CAREERS_URL . 'assets/image-asset-7.png',
		];

		$pattern_dir = TOIVOA_CAREERS_PATH . 'patterns/';
		
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
					'toivoa-careers/' . basename( $file, '.php' ),
					[
						'title'      => $title,
						'categories' => [ 'toivoa-careers' ],
						'content'    => $pattern_content,
					]
				);
			}
		}
	}

}

add_action( 'plugins_loaded', [ BlockPatterns::class, 'instance' ] );
