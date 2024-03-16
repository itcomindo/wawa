<?php

/**
 * Whatsapp Left Box
 */

defined('ABSPATH') or die('No script kiddies please!');


function mm_wawa_get_left_box($wawa_photo)
{
    if ($wawa_photo) {
        $wawa_photo = 'has-photo';
        if ($user['wawa_user_photo_url']) {
            $wawa_user_photo_url = $user['wawa_user_photo_url'];
        } else {
            $wawa_user_photo_url = mm_get_wawa_images()['user'];
        }
        $wawa_left = '<div class="wawa-left wawa-col"><img class="wawa-find-this wawa-user-photo" src="' . $wawa_user_photo_url . '" alt="" class="wawa-find-this">
    </div>';
    } else {
        $wawa_photo = '';
        $wawa_left = '';
    }
}


function mm_wawa_get_wawa_photo($wawa_photo)
{
    if ($wawa_photo) {
        $wawa_photo = 'has-photo';
        if ($user['wawa_user_photo_url']) {
            $wawa_user_photo_url = $user['wawa_user_photo_url'];
        } else {
            $wawa_user_photo_url = mm_get_wawa_images()['user'];
        }
        $wawa_left = '<div class="wawa-left wawa-col"><img class="wawa-find-this wawa-user-photo" src="' . $wawa_user_photo_url . '" alt="" class="wawa-find-this">
    </div>';
    } else {
        $wawa_photo = '';
        $wawa_left = '';
    }
}
