window.addEventListener('DOMContentLoaded', (event) => {

    jQuery(function () {

        var $whatsappBox = jQuery('#wawa-box');
        var $greetingButton = jQuery('#wawa-greeting');
        // $greetingButton.slideUp(0);
        jQuery($greetingButton).on('click', function () {
            jQuery(this).slideUp(500);
            $whatsappBox.addClass('show animate__bounceInUp');
        });

        //close
        jQuery('#wawa-close').on('click', function () {
            $whatsappBox.removeClass('show animate__bounceInUp');
            $greetingButton.slideDown(500);
        });



        var $wawaGreetingText = jQuery('.wawa-greeting-text');
        setTimeout(function () {
            $wawaGreetingText.addClass('show animate__bounceInUp');
        }, 1000);





    });


});