<?php
/**
 * Career Meta class.
 *
 * @package ToivoaCareers
 */

namespace Toivoa_Careers\Meta;

use Toivoa_Careers\Traits\Singleton;

// Bail early if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Career Meta class.
 *
 * @package ToivoaCareers
 */
final class CareerMeta {

	use Singleton;

	/**
	 * Constructor.
	 */
	private function __construct() {
		$this->_setup_hooks();
	}

	/**
	 * Setup hooks to register the meta.
	 *
	 * @return void
	 */
	private function _setup_hooks(): void {
		add_action( 'init', [ $this, 'register_career_post_meta' ], 20 );
	}

	/**
	 * Register the career post meta.
	 *
	 * @return void
	 */
	public function register_career_post_meta(): void {
		$this->register_career_meta(
			'job',
			[
				[
					'meta_key'          => 'position_title',
					'label'             => __( 'Position Title', 'toivoa-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'meta_key'          => 'location',
					'label'             => __( 'Location', 'toivoa-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_textarea_field',
				],
				[
					'meta_key'          => 'position_type',
					'label'             => __( 'Position Type', 'toivoa-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_textarea_field',
				],
				[
					'meta_key'          => 'reports_to',
					'label'             => __( 'Reports To', 'toivoa-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_textarea_field',
				]
			]
		);
	}

	/**
	 * Register the career meta.
	 *
	 * @return void
	 */
	private function register_career_meta( string $post_type, array $meta_fields ): void {
		foreach ( $meta_fields as $field ) {
			register_post_meta(
				$post_type,
				$field['meta_key'],
				[
					'show_in_rest'      => true,
					'single'            => true,
					'type'              => $field['type'],
					'sanitize_callback' => $field['sanitize_callback'],
					'description'       => $field['label'],
					'auth_callback'     => '__return_true',
				]
			);
		}
	}

}

// Initialize the plugin.
add_action( 'init', [ CareerMeta::class, 'instance' ] );
