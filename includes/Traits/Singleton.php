<?php
/**
 * Singleton trait.
 *
 * This trait implements the singleton pattern for classes that need to ensure
 * only one instance exists throughout the application lifecycle.
 *
 * @package Toivoa_Careers\Includes
 */

namespace Toivoa_Careers\Traits;

/**
 * Singleton trait.
 *
 * This trait implements the singleton pattern for classes that need to ensure
 * only one instance exists throughout the application lifecycle.
 *
 * @package Toivoa_Careers\Includes
 */
trait Singleton {

    /**
     * The singleton instance.
     *
     * @var static
     */
    private static $instance;

    /**
     * Get the singleton instance.
     *
     * @return static The singleton instance.
     */
    public static function instance() {
        if ( null === self::$instance ) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * Prevent direct instantiation.
     */
    private function __construct() {}

    /**
     * Prevent cloning of the instance.
     */
    private function __clone() {}

    /**
     * Prevent unserializing of the instance.
     */
    private function __wakeup() {
        throw new \Exception( 'Cannot unserialize a singleton.' );
    }
}
