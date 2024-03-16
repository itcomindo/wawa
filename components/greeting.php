<?php

/**
 * Greeting
 */

defined('ABSPATH') or die('No script kiddies please!');

?>

<div id="wawa-greeting" class="<?php echo esc_html(mm_get_wawa_data()['style']); ?> animate__animated animate__bounce">
    <?php echo mm_get_wawa_data()['logo-url']; ?>
    <span class="wawa-greeting-text animate__animated animate__delay-1s">
        <?php echo esc_html(mm_get_wawa_data()['greeting-text']); ?>
    </span>
</div>