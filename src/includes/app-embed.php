<?php
/**
 * Register shortcode
 *
 * @package Appizy App Embed
 */

/**
 * Callback function for embed shortcode
 *
 * @param array  $atts attributes passed to the shortcode.
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

	return "<iframe id='$iframe_id' class='appizy-iframe' frameborder='0' width='100%' src='$attachment_url'></iframe><script>
                    var appizy_iframe = document.getElementById('$iframe_id');
                    var default_margin = 16;
                    appizy_iframe.addEventListener('load', function() {
                        appizy_iframe.style.height = appizy_iframe.contentWindow.document.body.offsetHeight + default_margin +'px'; 
                    });
            </script>";
}

add_shortcode( 'appizy', 'appizy_shortcode_callback' );
