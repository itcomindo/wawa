<?php

/**
 * Wawa Data
 */

defined('ABSPATH') or die('No script kiddies please!');



/**
 *=========================
 * load options page
 *=========================
 */
function mm_get_wawa_data()
{
    $wawa = [];

    //get style
    $wawa['style'] = esc_html(carbon_get_theme_option('wawa_style'));

    //get position
    $wawa['position'] = esc_html(carbon_get_theme_option('wawa_position'));

    //wawa_greeting
    $wawa['greeting'] = carbon_get_theme_option('wawa_greeting');

    //get greeting text
    $wawa['greeting-text'] = esc_html(carbon_get_theme_option('wawa_greeting_text'));

    //get logo condition and get logo url
    if (carbon_get_theme_option('wawa_logo')) {
        $wawa['logo-url'] = '<img class="wawa-find-this" src="' . esc_url(carbon_get_theme_option('wawa_logo_url')) . '" alt="whatsapp" class="wawa-logo">';
    } else {
        $wawa['logo-url'] = mm_get_wawa_images()['whatsapp'];
    }



    /**
     * get icon
     */


    if (carbon_get_theme_option('wawa_icon')) {
        //whatsapp-icon
        $wawa['whatsapp-icon'] = '<i class="' . carbon_get_theme_option('wawa_icon_whatsapp') . '"></i>';

        //call-icon
        $wawa['call-icon'] = '<i class="' . carbon_get_theme_option('wawa_icon_call') . '"></i>';

        //email-icon
        $wawa['email-icon'] = '<i class="' . carbon_get_theme_option('wawa_icon_email') . '"></i>';
    }







    return $wawa;
}






function wawa_button_to_show($buttons, $wawa_icon, $user_cta = '', $wawa_call = '', $wawa_email = '')
{
    if ($buttons) {
        foreach ($buttons as $btn) {
            if ($btn == 'whatsapp') {
                echo wawa_whatsapp_button($wawa_icon, $user_cta);
            } elseif ($btn == 'call') {
                echo wawa_call_button($wawa_icon, $wawa_call);
            } elseif ($btn == 'email') {
                echo wawa_email_button($wawa_icon, $wawa_email);
            }
        }
    }
}



function wawa_whatsapp_button($wawa_icon, $user_cta)
{
    if ($wawa_icon) {

        if (carbon_get_theme_option('wawa_icon_whatsapp')) {
            $the_icon = '<i class="' . carbon_get_theme_option('wawa_icon_whatsapp') . '"></i>';
        } else {
            $the_icon = mm_get_wawa_images()['whatsapp'];
        }

        $wa_button = '<li class="wawa-list"><a href="//wa.me/' . $user_cta . '" class="wawa-btn wa-btn" rel="noopener nofollow" target="_blank" title="Chat">' . $the_icon . ' Chat</a></li>';
    } else {
        $wa_button = '<li class="wawa-list"><a href="#" class="wawa-btn wa-btn" rel="noopener nofollow" target="_blank" title="Chat">Chat</a></li>';
    }
    return $wa_button;
}


function wawa_call_button($wawa_icon, $wawa_call)
{
    if ($wawa_icon) {

        if (carbon_get_theme_option('wawa_icon_call')) {
            $the_icon = '<i class="' . carbon_get_theme_option('wawa_icon_call') . '"></i>';
        } else {
            $the_icon = mm_get_wawa_images()['call'];
        }

        $wa_button = '<li class="wawa-list"><a href="tel:+' . $wawa_call . '" class="wawa-btn call-btn" rel="noopener nofollow" target="_blank" title="Call">' . $the_icon . ' Call</a></li>';
    } else {
        $wa_button = '<li class="wawa-list"><a href="#" class="wawa-btn call-btn" rel="noopener nofollow" target="_blank" title="Chat">Call</a></li>';
    }
    return $wa_button;
}



function wawa_email_button($wawa_icon, $wawa_email)
{
    if ($wawa_icon) {

        if (carbon_get_theme_option('wawa_icon_email')) {
            $the_icon = '<i class="' . carbon_get_theme_option('wawa_icon_email') . '"></i>';
        } else {
            $the_icon = mm_get_wawa_images()['email'];
        }



        $wa_button = '<li class="wawa-list"><a href="mailto:' . $wawa_email . '" class="wawa-btn email-btn" rel="noopener nofollow" target="_blank" title="Email">' . $the_icon . ' Email</a></li>';
    } else {
        $wa_button = '<li class="wawa-list"><a href="#" class="wawa-btn email-btn" rel="noopener nofollow" target="_blank" title="Chat">Email</a></li>';
    }
    return $wa_button;
}
