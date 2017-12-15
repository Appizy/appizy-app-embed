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

class MyPlugin
{
    public static function fooFunc($atts, $content = "")
    {
        $attachment_url = wp_get_attachment_url(13);

        return "<p>content = <span>$content</span></p>" .
            "<iframe class='appizy-iframe' frameborder='0' width='100%' src='$attachment_url'></iframe>" .
            "<script> 
                    var appizyIFrame = document.getElementsByClassName('appizy-iframe')[0];
                    console.log('Hello', );
                    appizyIFrame.addEventListener('load', function() {
                        document.getElementsByClassName('appizy-iframe')[0].style.height = document.getElementsByClassName('appizy-iframe')[0].contentWindow.document.body.offsetHeight + 16 + 'px'; 
            
                    });
            </script>";
    }

    public static function listMedia($atts, $content = "")
    {
        $args = [
            'order'          => 'ASC',
            'order_by'       => 'publish_date',
            'posts_per_page' => -1,
            'post_status'    => null,
            'post_parent'    => null,
            'default_styles' => true,
            'date_format'    => "Y/m/d",
            'post_type'      => 'attachment',
        ];

        $attachments = get_posts($args);

        $code = '<p>List of medias:</p><ul>';

        foreach ($attachments as $attachment) {
            $attachment_id = $attachment->ID;
            $attachment_title = get_the_title($attachment_id);
            $attachment_url = wp_get_attachment_url($attachment_id);

            $code .= '<li>' . $attachment_id . ', ' . $attachment_title . ', ' . $attachment_url . '</li>';
        }

        $code .= '</ul>';

        return $code;
    }
}

add_shortcode('appi-me', ['MyPlugin', 'fooFunc']);

add_shortcode('appi-list', ['MyPlugin', 'listMedia']);
