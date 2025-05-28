<?php
/**
 * Class to register the "Careers" Custom Post Type
 *
 * @package Toivoa_Careers
 */

namespace Toivoa_Careers\PostTypes;

use Toivoa_Careers\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle the "Careers" Custom Post Type registration and functionality.
 *
 * @package Toivoa_Careers\PostTypes
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
		add_filter( 'enter_title_here', [ $this, 'change_title_placeholder_text' ] );
	}

	/**
	 * Register the "Careers" Custom Post Type.
	 *
	 * @since 1.0.0
	 */
	public function register_careers_post_type() {

		$labels = [
			'name'                  => _x( 'Jobs', 'Post Type General Name', 'toivoa-careers' ),
			'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'toivoa-careers' ),
			'menu_name'             => __( 'Jobs', 'toivoa-careers' ),
			'name_admin_bar'        => __( 'Job', 'toivoa-careers' ),
			'archives'              => __( 'Job Archives', 'toivoa-careers' ),
			'attributes'            => __( 'Job Attributes', 'toivoa-careers' ),
			'add_new_item'          => __( 'Add New Job', 'toivoa-careers' ),
			'add_new'               => __( 'Add New', 'toivoa-careers' ),
			'new_item'              => __( 'New Job', 'toivoa-careers' ),
			'edit_item'             => __( 'Edit Job', 'toivoa-careers' ),
			'update_item'           => __( 'Update Job', 'toivoa-careers' ),
			'view_item'             => __( 'View Job', 'toivoa-careers' ),
			'search_items'          => __( 'Search Jobs', 'toivoa-careers' ),
			'not_found'             => __( 'No jobs found', 'toivoa-careers' ),
			'not_found_in_trash'    => __( 'No jobs found in Trash', 'toivoa-careers' ),
			'featured_image'        => __( 'Job Featured Image', 'toivoa-careers' ),
			'set_featured_image'    => __( 'Set job featured image', 'toivoa-careers' ),
			'remove_featured_image' => __( 'Remove job featured image', 'toivoa-careers' ),
			'use_featured_image'    => __( 'Use as job featured image', 'toivoa-careers' ),
			'items_list'            => __( 'Jobs list', 'toivoa-careers' ),
			'items_list_navigation' => __( 'Jobs list navigation', 'toivoa-careers' ),
			'filter_items_list'     => __( 'Filter jobs list', 'toivoa-careers' ),
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => [ 'slug' => 'jobs' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'taxonomies'         => [ 'category', 'post_tag' ],
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

		register_post_type( 'job', $args );

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
		if ( 'job' === get_post_type() ) {
			return esc_html__( 'Enter Job Title', 'toivoa-careers' );
		}

		return $title;
	}

}

// Initialize the plugin.
add_action( 'init', [ CareersPostType::class, 'instance' ] );
