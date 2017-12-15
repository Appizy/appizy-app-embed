<?php

class MyPlugin {
	public static function fooFunc( $atts, $content = "" ) {
		$atts = shortcode_atts(
			[
				'id' => null,
			],
			$atts,
			'appi-me'
		);

		$attachment_url = wp_get_attachment_url( $atts['id'] );

		return "<iframe class='appizy-iframe' frameborder='0' width='100%' src='$attachment_url'></iframe>" .
		       "<script> 
                    var appizyIFrame = document.getElementsByClassName('appizy-iframe')[0];
                    console.log('Hello', );
                    appizyIFrame.addEventListener('load', function() {
                        document.getElementsByClassName('appizy-iframe')[0].style.height = document.getElementsByClassName('appizy-iframe')[0].contentWindow.document.body.offsetHeight + 16 + 'px'; 
            
                    });
            </script>";
	}
}

add_shortcode( 'appi-me', [ 'MyPlugin', 'fooFunc' ] );
