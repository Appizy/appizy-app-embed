<?php
/**
 * Appizy App Embed
 *
 * @author Nicolas Hefti <nicolas@hefti.fr>
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

if ( is_admin() ) {
	include_once $functions_dir . 'admin-config.php';
} else {
	include_once $functions_dir . 'app-embed.php';
}
