<?php
/**
 * Class to register the "Careers" Custom Post Type
 *
 * @package M2_Careers
 */

namespace M2_Careers\PostTypes;

use M2_Careers\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle the "Careers" Custom Post Type registration and functionality.
 *
 * @package M2_Careers\PostTypes
 * @since 1.0.0
 */
final class CareersPostType {

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
		add_action( 'init', [ $this, 'register_careers_post_type' ] );
		add_action( 'init', [ $this, 'register_careers_taxonomies' ] );
		add_filter( 'enter_title_here', [ $this, 'change_title_placeholder_text' ] );
		add_action( 'pre_get_posts', [ $this, 'hide_non_open_roles_from_public_queries' ] );
	}

	/**
	 * Register the "Careers" Custom Post Type.
	 *
	 * @since 1.0.0
	 */
	public function register_careers_post_type() {

		$labels = [
			'name'                  => _x( 'Careers', 'Post Type General Name', 'm2-careers' ),
			'singular_name'         => _x( 'Career', 'Post Type Singular Name', 'm2-careers' ),
			'menu_name'             => __( 'Careers', 'm2-careers' ),
			'name_admin_bar'        => __( 'Career', 'm2-careers' ),
			'archives'              => __( 'Career Archives', 'm2-careers' ),
			'attributes'            => __( 'Career Attributes', 'm2-careers' ),
			'add_new_item'          => __( 'Add New Career', 'm2-careers' ),
			'add_new'               => __( 'Add New', 'm2-careers' ),
			'new_item'              => __( 'New Career', 'm2-careers' ),
			'edit_item'             => __( 'Edit Career', 'm2-careers' ),
			'update_item'           => __( 'Update Career', 'm2-careers' ),
			'view_item'             => __( 'View Career', 'm2-careers' ),
			'search_items'          => __( 'Search Careers', 'm2-careers' ),
			'not_found'             => __( 'No careers found', 'm2-careers' ),
			'not_found_in_trash'    => __( 'No careers found in Trash', 'm2-careers' ),
			'featured_image'        => __( 'Career Featured Image', 'm2-careers' ),
			'set_featured_image'    => __( 'Set career featured image', 'm2-careers' ),
			'remove_featured_image' => __( 'Remove career featured image', 'm2-careers' ),
			'use_featured_image'    => __( 'Use as career featured image', 'm2-careers' ),
			'items_list'            => __( 'Careers list', 'm2-careers' ),
			'items_list_navigation' => __( 'Careers list navigation', 'm2-careers' ),
			'filter_items_list'     => __( 'Filter careers list', 'm2-careers' ),
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => [ 'slug' => 'careers' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'taxonomies'         => [ 'm2_career_type', 'm2_business_unit' ],
			'menu_icon'          => 'dashicons-media-spreadsheet',
			'show_in_rest'       => true,
			'supports'           => [
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'author',
				'revisions',
				'custom-fields',
			],
		];

		register_post_type( 'm2_career', $args );

	}

	/**
	 * Update placeholder text for post titles.
	 * Set posts to have placeholder text of "Enter the Job Title".
	 *
	 * @param string $title The placeholder text for the title of the post.
	 *
	 * @return string The filtered placeholder text.
	 */
	public function change_title_placeholder_text( string $title ): string {
		if ( 'm2_career' === get_post_type() ) {
			return esc_html__( 'Enter Career Title', 'm2-careers' );
		}

		return $title;
	}

	/**
	 * Register career taxonomies.
	 *
	 * @since 1.0.0
	 */
	public function register_careers_taxonomies() {
		// Career Type taxonomy
		$career_type_labels = [
			'name'              => _x( 'Career Types', 'taxonomy general name', 'm2-careers' ),
			'singular_name'     => _x( 'Career Type', 'taxonomy singular name', 'm2-careers' ),
			'search_items'      => __( 'Search Career Types', 'm2-careers' ),
			'all_items'         => __( 'All Career Types', 'm2-careers' ),
			'edit_item'         => __( 'Edit Career Type', 'm2-careers' ),
			'update_item'       => __( 'Update Career Type', 'm2-careers' ),
			'add_new_item'      => __( 'Add New Career Type', 'm2-careers' ),
			'new_item_name'     => __( 'New Career Type Name', 'm2-careers' ),
			'menu_name'         => __( 'Career Types', 'm2-careers' ),
		];

		$career_type_args = [
			'hierarchical'      => false,
			'labels'            => $career_type_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'career-type' ],
			'show_in_rest'      => true,
		];

		register_taxonomy( 'm2_career_type', [ 'm2_career' ], $career_type_args );

		// Business Unit taxonomy
		$business_unit_labels = [
			'name'              => _x( 'Business Units', 'taxonomy general name', 'm2-careers' ),
			'singular_name'     => _x( 'Business Unit', 'taxonomy singular name', 'm2-careers' ),
			'search_items'      => __( 'Search Business Units', 'm2-careers' ),
			'all_items'         => __( 'All Business Units', 'm2-careers' ),
			'edit_item'         => __( 'Edit Business Unit', 'm2-careers' ),
			'update_item'       => __( 'Update Business Unit', 'm2-careers' ),
			'add_new_item'      => __( 'Add New Business Unit', 'm2-careers' ),
			'new_item_name'     => __( 'New Business Unit Name', 'm2-careers' ),
			'menu_name'         => __( 'Business Units', 'm2-careers' ),
		];

		$business_unit_args = [
			'hierarchical'      => false,
			'labels'            => $business_unit_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'business-unit' ],
			'show_in_rest'      => true,
		];

		register_taxonomy( 'm2_business_unit', [ 'm2_career' ], $business_unit_args );

		// Create default terms
		$this->create_default_terms();
	}

	/**
	 * Create default taxonomy terms.
	 *
	 * @since 1.0.0
	 */
	private function create_default_terms() {
		// Career Type terms
		if ( ! term_exists( 'Internal', 'm2_career_type' ) ) {
			wp_insert_term( 'Internal', 'm2_career_type', array( 'slug' => 'internal' ) );
		}
		if ( ! term_exists( 'Partner', 'm2_career_type' ) ) {
			wp_insert_term( 'Partner', 'm2_career_type', array( 'slug' => 'partner' ) );
		}

		// Business Unit terms
		if ( ! term_exists( 'M2 Talent', 'm2_business_unit' ) ) {
			wp_insert_term( 'M2 Talent', 'm2_business_unit' );
		}
		if ( ! term_exists( 'M2 Development', 'm2_business_unit' ) ) {
			wp_insert_term( 'M2 Development', 'm2_business_unit' );
		}
		if ( ! term_exists( 'M2 Learning', 'm2_business_unit' ) ) {
			wp_insert_term( 'M2 Learning', 'm2_business_unit' );
		}
	}


	/**
	 * Hide non-open roles from public archive queries.
	 *
	 * @param WP_Query $query The WP_Query instance.
	 */
	public function hide_non_open_roles_from_public_queries( $query ) {
		if ( ! is_admin() && $query->is_main_query() ) {
			if ( is_post_type_archive( 'm2_career' ) || ( is_home() && 'm2_career' === $query->get( 'post_type' ) ) ) {
				$meta_query = $query->get( 'meta_query' ) ?: [];
				$meta_query[] = [
					'key'     => 'm2_status',
					'value'   => 'Open',
					'compare' => '='
				];
				$query->set( 'meta_query', $meta_query );
			}
		}
	}

}

// Initialize the plugin.
add_action( 'init', [ CareersPostType::class, 'instance' ] );
