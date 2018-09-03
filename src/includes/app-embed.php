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

	return "<iframe id='$iframe_id' class='appizy-iframe' frameborder='0' width='100%' src='$attachment_url'></iframe>
			<button id='save'>Save</button>
			<script>
                    var appizy_iframe = document.getElementById('$iframe_id');
                    var default_margin = 16;
                    appizy_iframe.addEventListener('load', function() {
                        appizy_iframe.style.height = appizy_iframe.contentWindow.document.body.offsetHeight + default_margin +'px';
                        
                        jQuery.get('/wp-json/appizy/v1/app/$atts_id', function(data){
                            data = JSON.parse(data);
                            data = data[0];
                       		console.log(data);
                        	appizy_iframe.contentWindow.APY.setInputs(data);
                        	appizy_iframe.contentWindow.APY.calculate();
                    	});
                    });
                  
                    
                    var saveButton = document.getElementById('save');
                    saveButton.addEventListener('click', function(){
                    	var inputs = appizy_iframe.contentWindow.APY.getInputs();
                    	console.log(inputs);
                    	
                    	jQuery.post('/wp-json/appizy/v1/app/$atts_id', inputs, function(){
                    	    console.log('It works');
                    	}, 'json');
                    });
            </script>";
}

add_shortcode( 'appizy', 'appizy_shortcode_callback' );
