<?php
/**
 * @package Appizy App Embed
 */

/*
Plugin Name: Appizy App Embed
Description: The easiest and fastest way to embed your web-applications created with Appizy into your WordPress website.
Author: Appizy
Author URI: http://www.appizy.com
Version: 1.0
Text Domain: appizy
*/

/*
Copyright (C) 2017 Appizy

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


$functions_dir = __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR;

if (is_admin()) {
    include_once $functions_dir . '/admin-config.php';
} else {
    include_once $functions_dir . '/app-embed.php';
}

include_once $functions_dir . '/api.php';

//$appizy = new Slug_Custom_Route();
//$appizy->register_routes();