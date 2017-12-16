<?php
/**
 * Appizy App Embed
 *
 * Register shortcode
 *
 * @package Appizy App Embed
 */

/**
 * Callback function for embed shortcode
 *
 * @param array  git$atts attributes passed to the shortcode.
 * @param string $content content inside the shortcode tag.
 *
 * @return string
 */
function foo_func( $atts, $content = '' ) {
	$atts = shortcode_atts(
		[
			'id' => null,
		],
		$atts,
		'appi-me'
	);

	$attachment_url = wp_get_attachment_url( $atts['id'] );

	return "<iframe class='appizy-iframe' frameborder='0' width='100%' src='$attachment_url'></iframe><script>
                    var appizyIFrame = document.getElementsByClassName('appizy-iframe')[0];
                    console.log('Hello', );
                    appizyIFrame.addEventListener('load', function() {
                        document.getElementsByClassName('appizy-iframe')[0].style.height = document.getElementsByClassName('appizy-iframe')[0].contentWindow.document.body.offsetHeight + 16 + 'px'; 
            
                    });
            </script>";
}

add_shortcode( 'appi-me', 'foo_func' );
