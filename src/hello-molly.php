<?php
/**
 * @package Hello_Molly
 * @version 1.0
 */

namespace Appizy;

/*
Plugin Name: Hello Molly
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in
    two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from
    <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Nicolas Hefti
Version: 1.0
*/

class MyPlugin
{
    public static function fooFunc($atts, $content = "")
    {
        return "content = $content";
    }
}

add_shortcode('appi-me', ['MyPlugin', 'fooFunc']));
