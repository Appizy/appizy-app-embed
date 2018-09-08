<?php

/**
 * Class Appizy_App_Embed
 *
 * @package Appizy App Embed
 */
class Appizy_App_Embed {

	public function __construct() {
		$functions_dir = __DIR__ . '/../includes/';

		if ( is_admin() ) {
			include_once $functions_dir . '/admin-config.php';
		} else {
			include_once $functions_dir . '/app-embed.php';
		}

		$this->run();
	}

	/**
	 * Action hook
	 */
	public function run() {
		$this->register_scripts();

		add_action( 'plugins_loaded', array( $this, 'enqueue_appizy_scripts' ) );
	}

	/**
	 * Register plugin styles and scripts
	 */
	public function register_scripts() {
		wp_register_script( 'appizy-script', plugins_url( '/../js/embed.js', __FILE__ ), array( 'jquery' ), null, true );
	}

	/**
	 * Enqueues plugin-specific scripts.
	 */
	public function enqueue_appizy_scripts() {
		wp_enqueue_script( 'appizy-script' );

		wp_localize_script(
			'appizy-script', 'appizyApi', array(
				'root'  => '/',
				'nonce' => wp_create_nonce( 'wp_rest' ),
			)
		);
	}
}
