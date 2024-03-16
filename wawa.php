<?php

/**
 * Plugin Name: Wawa
 * Plugin URI: https://budiharyono.id/
 * Description: Whatsapp Multiple Number
 * Version: 1.0.0
 * Author: Budi Haryono
 * Author URI: https://budiharyono.id/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') or die('No script kiddies please!');

/**
 *=========================
 *NAME: Load Carbon Fields
 *=========================
 */
function mm_wawa_cf_checker()
{
    require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

/**
 * Load Carbon Fields When Needed
 */
function mm_wawa_loader()
{
    if (!function_exists('carbon_fields_boot_plugin')) {
        mm_wawa_cf_checker();
    }
}
add_action('plugins_loaded', 'mm_wawa_loader');



require_once(plugin_dir_path(__FILE__) . 'wawa-options.php');
require_once(plugin_dir_path(__FILE__) . 'components/components.php');
require_once(plugin_dir_path(__FILE__) . 'wawa-data.php');
require_once(plugin_dir_path(__FILE__) . 'assets/assets.php');


/**
 *  load admin css and js from plugin directory
 * @since 1.0.0
 * @return void
 * @package Wawa
 * @author Budi Haryono
 * @link https://budiharyono.id/
 */
function mm_wawa_load_admin_assets()
{
    wp_enqueue_style('wawa-css', plugin_dir_url(__FILE__) . 'assets/css/wawa-admin.css', array(), '1.0.0', 'all');


    wp_enqueue_script('wawa-admin-js', plugin_dir_url(__FILE__) . 'assets/js/wawa-admin.js', array('jquery'), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'mm_wawa_load_admin_assets');

add_action('wp_enqueue_scripts', 'mm_wawa_load_assets');
/**
 *  load css and js from plugin directory
 * @since 1.0.0
 * @return void
 * @package Wawa
 * @author Budi Haryono
 * @link https://budiharyono.id/
 */
function mm_wawa_load_assets()
{
    wp_enqueue_style('wawa-css', plugin_dir_url(__FILE__) . 'assets/css/wawa.css', array(), '1.0.0', 'all');

    //load https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css
    wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1', 'all');


    $wawa_style = carbon_get_theme_option('wawa_style');
    wp_enqueue_style($wawa_style . '-css', plugin_dir_url(__FILE__) . 'assets/css/' . $wawa_style . '.css', array(), '1.0.0', 'all');




    wp_enqueue_script('wawa-js', plugin_dir_url(__FILE__) . 'assets/js/wawa.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'mm_wawa_load_assets');



function mm_enqueue_fa()
{
    // Ganti 'fontawesome-handle' dengan handle yang sesungguhnya digunakan
    if (!wp_style_is('fontawesome-handle', 'enqueued')) {
        wp_enqueue_style('mm-fontawesome-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1');
    }
}

add_action('wp_enqueue_scripts', 'mm_enqueue_fa');
