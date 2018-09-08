<?php
/**
 * Register shortcode
 *
 * @package Appizy App Embed
 */

/**
 * Callback function for embed shortcode
 *
 * @param array $atts attributes passed to the shortcode.
 * @param string $content content inside the shortcode tag.
 *
 * @return string
 */
function appizy_shortcode_callback( $atts, $content = '' ) {
	$atts = shortcode_atts(
		[
			'id' => null,
		],
		$atts,
		'appizy'
	);

	$attachment_url = wp_get_attachment_url( $atts['id'] );
	$iframe_id      = uniqid( 'appizy-iframe' );

	$atts_id = $atts['id'];

	$template = include 'embed.tpl.php';

	return $template;
}

add_shortcode( 'appizy', 'appizy_shortcode_callback' );

