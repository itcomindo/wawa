<?php

/**
 * Whatsapp Box
 */

defined('ABSPATH') or die('No script kiddies please!');

if (carbon_get_theme_option('wawa_logo')) {
    $wawa_top_class = 'has-logo';
    $wawa_top_logo  = '<img class="wawa-find-this" src="' . esc_url(carbon_get_theme_option('wawa_logo_url')) . '" alt="whatsapp" class="wawa-logo"> <span>' . esc_html(carbon_get_theme_option('wawa_box_header')) . '</span>';
} else {
    $wawa_top_class = '';

    $wawa_top_logo = esc_html(carbon_get_theme_option('wawa_box_header'));
}
?>

<div id="wawa-box" class="animate__animated">
    <div id="wawa-top" class="<?php echo $wawa_top_class; ?>">
        <?php echo $wawa_top_logo; ?>
    </div>
    <div id="wawa-bot">
        <?php
        mm_get_wawa_users();
        ?>
    </div>
    <div id="wawa-close">X</div>
</div>




<?php

function mm_get_wawa_users()
{
    $wawas = carbon_get_theme_option('wawas');
    if ($wawas) {
        foreach ($wawas as $user) {
            $wawa_icon = carbon_get_theme_option('wawa_icon');
            $wawa_photo = carbon_get_theme_option('wawa_photo');
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


            $buttons = $user['wawa_button'];
            $user_cta = $user['wawa_number'];
            $wawa_call = $user['wawa_call'];
            $wawa_email = $user['wawa_email'];
            $is_user_enabled = $user['wawa_enable'];
            $wawa_name = esc_html($user['wawa_name']);
            $wawa_job = esc_html($user['wawa_job']);
            $enable_schedules = $user['wawa_enable_schedule'];
            if ($is_user_enabled && $enable_schedules == true) {

                if ($enable_schedules) {
                    $wawa_free_day = $user['wawa_free_day'];
                    if ($wawa_free_day) {
                        $libur = [];
                        foreach ($wawa_free_day as $libur_on) {
                            $libur[] = $libur_on;
                        }
                        $libur_str = implode(', ', $libur);
                    }
                }
                $day_today = strtolower(date('l'));

                if ($libur_str) {
                    if (!in_array($day_today, $wawa_free_day)) {
?>
                        <div class="wawa-item <?php echo $wawa_photo; ?>" data-libur="<?php echo $libur_str; ?>" data-day-today="<?php echo $day_today; ?>">

                            <?php echo $wawa_left; ?>

                            <div class="wawa-mid wawa-col">
                                <span class="wawa-name wawa-comp"><?php echo $wawa_name; ?></span>
                                <span class="wawa-job wawa-comp"><?php echo $wawa_job; ?></span>
                            </div>
                            <div class="wawa-right wawa-col">
                                <ul class="wawa-list-wr">
                                    <?php
                                    wawa_button_to_show($buttons, $wawa_icon, $user_cta, $wawa_call, $wawa_email);
                                    ?>
                                </ul>
                            </div>
                        </div>
                <?php
                    }
                }
            } elseif ($is_user_enabled && !$enable_schedules) {
                ?>
                <div class="wawa-item <?php echo $wawa_photo; ?>" data-libur="<?php echo $libur_str; ?>" data-day-today="<?php echo $day_today; ?>">

                    <?php echo $wawa_left; ?>

                    <div class="wawa-mid wawa-col">
                        <span class="wawa-name wawa-comp"><?php echo $wawa_name; ?></span>
                        <span class="wawa-job wawa-comp"><?php echo $wawa_job; ?></span>
                    </div>
                    <div class="wawa-right wawa-col">
                        <ul class="wawa-list-wr">
                            <?php
                            wawa_button_to_show($buttons, $wawa_icon, $user_cta, $wawa_call, $wawa_email);
                            ?>
                        </ul>
                    </div>
                </div>
    <?php

            }
        }
    } else {
        mm_get_wawa_users_dummy();
    }
}

function mm_get_wawa_users_dummy()
{
    ?>
    <div class="wawa-item">
        <div class="wawa-left wawa-col">
            <img class="wawa-find-this wawa-user-photo" src="<?php echo mm_get_wawa_images()['user']; ?>" alt="" class="wawa-find-this">
        </div>

        <div class="wawa-mid wawa-col">
            <span class="wawa-name wawa-comp">Johan Cruft</span>
            <span class="wawa-job wawa-comp">Web Developer</span>
        </div>

        <div class="wawa-right wawa-col">
            <ul class="wawa-list-wr">
                <li class="wawa-list">
                    <a href="#" class="wawa-btn wa-btn" rel="noopener nofollow" target="_blank" title="Chat"><?php echo mm_get_wawa_data()['whatsapp-icon']; ?> Chat</a>
                </li>
                <li class="wawa-list">
                    <a href="#" class="wawa-btn call-btn" rel="noopener nofollow" target="_blank" title="Call"><?php echo mm_get_wawa_data()['call-icon']; ?> Call</a>
                </li>
                <li class="wawa-list">
                    <a href="#" class="wawa-btn email-btn" rel="noopener nofollow" target="_blank" title="Email"><?php echo mm_get_wawa_data()['email-icon']; ?> Email</a>
                </li>
            </ul>
        </div>
    </div>
<?php
}
