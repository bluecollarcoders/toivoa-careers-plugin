<?php
/**
 * Block Registrar.
 *
 * @package M2_Careers\Blocks
 * @since 1.0.0
 */

namespace M2_Careers\Blocks;

use M2_Careers\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class BlockRegistrar.
 *
 * @package M2_Careers\Blocks
 * @since 1.0.0
 */
final class BlockRegistrar {

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
		add_action( 'init', [ $this, 'register_blocks' ] );
	}

	/**
	 * Register blocks.
	 *
	 * @since 1.0.0
	 */
	public function register_blocks() {
		$dir = M2_CAREERS_PATH . 'blocks/breadcrumb-block';

		// Only register the block definition
		register_block_type( $dir, [
			'render_callback' => [ $this, 'render_breadcrumb_block' ],
		] );
	}

	/**
	 * Called at render time, *not* on init.
	 */
	public function render_breadcrumb_block( $attrs, $content ) {
		// Now this runs in block context, so wrapper works
		$wrapper = get_block_wrapper_attributes();
		ob_start();
		?>
		<nav <?php echo $wrapper; ?>>
		<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'm2-careers' ); ?></a>
		<span>/</span>
		<a href="<?php echo esc_url( get_post_type_archive_link( 'm2_career' ) ); ?>">
			<?php esc_html_e( 'Careers', 'm2-careers' ); ?>
		</a>
		<?php if ( is_singular( 'm2_career' ) ) : ?>
			<span>/</span>
			<span><?php echo esc_html( get_the_title() ); ?></span>
		<?php endif; ?>
		</nav>
		<?php
		return ob_get_clean();
	}

}

// Initialize the plugin.
add_action( 'init', [ BlockRegistrar::class, 'instance' ] );
