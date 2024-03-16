<?php

/**
 * WAWA Item
 */

defined('ABSPATH') or die('No script kiddies please!');

function mm_get_wawa_item($wawa_photo, $buttons, $wawa_icon, $user_cta, $wawa_call, $wawa_email, $wawa_left)
{
?>
    <div class="wawa-item <?php echo $wawa_photo; ?>">

        <?php echo $wawa_left; ?>

        <div class="wawa-mid wawa-col">
            <span class="wawa-name wawa-comp">Johan Cruft</span>
            <span class="wawa-job wawa-comp">Web Developer</span>
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
