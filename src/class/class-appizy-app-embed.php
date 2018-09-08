<?php

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

	/*
	 * Action hooks
	 */
	public function run() {
		$this->register_scripts();

		add_action( 'plugins_loaded', array( $this, 'enqueue_rml_scripts' ) );
	}

	/**
	 * Register plugin styles and scripts
	 */
	public function register_scripts() {
		wp_register_script( 'rml-script', plugins_url( '/../js/embed.js', __FILE__ ), array( 'jquery' ), null, true );
//		wp_register_style( 'rml-style', plugins_url( 'css/read-me-later.css' ) );
	}

	/**
	 * Enqueues plugin-specific scripts.
	 */
	public function enqueue_rml_scripts() {
		wp_enqueue_script( 'rml-script' );

		wp_localize_script( 'rml-script', 'appizyApi', array(
			'test'  => 'toto',
//			'root'  => esc_url_raw( rest_url() ),
			'root'  => '/',
			'nonce' => wp_create_nonce( 'wp_rest' )
		) );
	}

	/**
	 * Enqueues plugin-specific styles.
	 */
	public function enqueue_rml_styles() {
		wp_enqueue_style( 'rml-style' );
	}
}