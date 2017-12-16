<?php
/**
 * Appizy App Embed
 *
 * Entry point file
 *
 * @author Nicolas Hefti <nicolas@appizy.com>
 * @package appizy-app-embed
 * @version 1.0
 */

/*
Plugin Name: Appizy App Embeld
Description: The easiest and fastest way to embed your web-applications created with Appizy into your WordPress website.
Author: Nicolas Hefti <nicolas@appizy.com>
Version: 1.0
*/

$functions_dir = __DIR__ . DIRECTORY_SEPARATOR . 'includes/';

if ( is_admin() ) {
	include_once $functions_dir . '/admin-config.php';
} else {
	include_once $functions_dir . '/app-embed.php';
}
