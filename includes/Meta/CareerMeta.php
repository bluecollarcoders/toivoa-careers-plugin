<?php
/**
 * Career Meta class.
 *
 * @package M2_Careers
 */

namespace M2_Careers\Meta;

use M2_Careers\Traits\Singleton;

// Bail early if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Career Meta class.
 *
 * @package M2_Careers
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
			'm2_career',
			[
				[
					'meta_key'          => 'm2_location',
					'label'             => __( 'Location', 'm2-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'meta_key'          => 'm2_compensation',
					'label'             => __( 'Compensation', 'm2-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'meta_key'          => 'm2_openings',
					'label'             => __( 'Number of Openings', 'm2-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'meta_key'          => 'm2_status',
					'label'             => __( 'Status', 'm2-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'meta_key'          => 'm2_apply_url',
					'label'             => __( 'Apply URL', 'm2-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'esc_url_raw',
				],
				[
					'meta_key'          => 'm2_partner_company',
					'label'             => __( 'Company Display Name', 'm2-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'meta_key'          => 'm2_employment_type',
					'label'             => __( 'Employment Type', 'm2-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'meta_key'          => 'm2_employment_type',
					'label'             => __( 'Employment Type', 'm2-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'meta_key'          => 'm2_role_type',
					'label'             => __( 'Role Type', 'm2-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_text_field',
				],
				[
					'meta_key'          => 'm2_remote_type',
					'label'             => __( 'Remote Type', 'm2-careers' ),
					'type'              => 'string',
					'sanitize_callback' => 'sanitize_text_field',
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
