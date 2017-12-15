<?php
/**
 * @package Hello_Molly
 * @version 1.0
 */

/*
Plugin Name: Hello Molly
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in
    two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from
    <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Nicolas Hefti
Version: 1.0
*/

$functions_dir = plugin_dir_path( __FILE__ ) . 'includes/';

// include_once( $functions_dir . 'initialise.php' );		    			// Initialisation scripts
if ( is_admin() ) {
	include_once( $functions_dir . 'admin-config.php' );                // Various administration config. options
} else {
	//include_once( $functions_dir . 'add-scripts.php' );                    // Add scripts to the main theme
	include_once( $functions_dir . 'app-embed.php' );                    // Filter to apply code embeds
}