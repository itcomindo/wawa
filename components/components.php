<?php

/**
 * C
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_wawa_load_components()
{
    if (carbon_get_theme_option('wawa_greeting')) {
        require_once(plugin_dir_path(__FILE__) . 'greeting.php');
        require_once(plugin_dir_path(__FILE__) . 'box.php');
    }
}
add_action('wp_footer', 'mm_wawa_load_components', 100);

require_once(plugin_dir_path(__FILE__) . 'wawa-item.php');
