<?php
/**
 * Register shortcode
 *
 * @package Appizy App Embed
 */

/**
 * Callback function for embed shortcode
 *
 * @param array $attributes attributes passed to the shortcode.
 * @param string $content content inside the shortcode tag.
 *
 * @return string
 */
function appizy_shortcode_callback( $attributes, $content = '' ) {
	$attributes = shortcode_atts(
		[
			'id'   => null,
			'save' => 'disabled',
		],
		$attributes,
		'appizy'
	);

	$attachment_url = wp_get_attachment_url( $attributes['id'] );

	$atts_id = $attributes['id'];

	$content = "<div class='appizy-app'><iframe class='appizy-app-iframe' " .
		"data-app-id='$atts_id' frameborder='0' width='100%' src='$attachment_url'></iframe>";

	if ( is_user_logged_in() ) {

		if ( 'enabled' === $attributes['save'] ) {
			$content .= '<div class="appizy-app-toolbar">';
			$content .= '<button type="submit">Save</button>';
			$content .= '</div>';
		}
	}

	$content .= '</div>';

	return $content;
}

add_shortcode( 'appizy', 'appizy_shortcode_callback' );

