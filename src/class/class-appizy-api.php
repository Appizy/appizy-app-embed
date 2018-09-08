<?php

/**
 * Applications API endpoint
 *
 * @package Appizy App Embed
 */
class Appizy_Api extends WP_REST_Controller {

	public function __construct() {
		$this->register_routes();
	}

	/**
	 * Grab latest post title by an author!
	 *
	 * @param array $data Options for the function.
	 *
	 * @return string|null Post title for the latest,  * or null if none.
	 */
	public function get_data( $data ) {
		$posts = get_post_meta( $data['id'], $this->get_meta_storage_key() );

		return json_encode( $posts );
	}

	/**
	 * @param $data
	 *
	 * @return string
	 */
	public function update_data( $data ) {
		$json = $data->get_body_params();

		if ( ! add_post_meta( $data['id'], $this->get_meta_storage_key(), $json, true ) ) {
			update_post_meta( $data['id'], $this->get_meta_storage_key(), $json );
		}

		return 'done';
	}

	public function register_routes() {
		add_action(
			'rest_api_init', function () {
				$namespace = 'appizy/v1';
				$base      = 'app';

				register_rest_route(
					$namespace, '/' . $base . '/(?P<id>[\d]+)', array(
						array(
							'methods'  => WP_REST_Server::READABLE,
							'callback' => array( $this, 'get_data' ),
							'args'     => array(
								'context' => array(
									'default' => 'view',
								),
							),
						),
						array(
							'methods'  => WP_REST_Server::EDITABLE,
							'callback' => array( $this, 'update_data' ),
						),
						array(
							'methods' => WP_REST_Server::DELETABLE,
							'args'    => array(
								'force' => array(
									'default' => false,
								),
							),
						),
					)
				);
			}
		);
	}

	/**
	 * @return string
	 */
	private function get_meta_storage_key() {
		return 'APPIZY_' . get_current_user_id();
	}
}
