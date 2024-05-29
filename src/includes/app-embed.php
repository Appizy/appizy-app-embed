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
		array(
			'id'     => null,
			'save'   => 'disabled',
			'print'  => 'disabled',
			'reset'  => 'disabled',
			'height' => null,
		),
		$attributes,
		'appizy'
	);

	$attachment_url = wp_get_attachment_url( $attributes['id'] );

	$atts_id          = $attributes['id'];
	$height_attribute = $attributes['height'] ? 'height="' . $attributes['height'] . '" ' : '';

	$content = "<div class='appizy-app'><iframe class='appizy-app-iframe' " . $height_attribute .
			"data-app-id='$atts_id' frameborder='0' width='100%' src='$attachment_url'></iframe>";

	if ( 'enabled' === $attributes['save'] || 'enabled' === $attributes['print'] | 'enabled' === $attributes['reset'] ) {
		$content .= '<div class="appizy-app-toolbar">';

		if ( is_user_logged_in() ) {
			if ( 'enabled' === $attributes['save'] ) {
				$content .= '<button class="button button-save" type="submit">Save</button>';
			}
		}

		if ( 'enabled' === $attributes['print'] ) {
			$content .= '<button class="button button-print">Print</button>';
		}

		if ( 'enabled' === $attributes['reset'] ) {
			$content .= '<button class="button button-reset">Reset</button>';
		}
	}

	$content .= '</div>';

	return $content;
}

add_shortcode( 'appizy', 'appizy_shortcode_callback' );

