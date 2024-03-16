<?php

/**
 * Wawa Options
 * Description: Create options page for Wawa
 */

defined('ABSPATH') or die('No script kiddies please!');

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 *=========================
 * create options page
 *=========================
 */

add_action('carbon_fields_register_fields', 'wawa_fields_options');
function wawa_fields_options()
{
    Container::make('theme_options', 'WAWA')
        ->add_fields(array(

            //separator
            Field::make('separator', 'wawasep', 'Wawa Options')
                ->set_classes('wawa-sep'),



            //Global Setting Start
            Field::make('separator', 'wawasetting', 'Global Setting')
                ->set_classes('wawa-sep child'),


            //select to select style (style 1 to 5)
            Field::make('select', 'wawa_style', 'Style')
                ->add_options(array(
                    'wawa1' => 'Style 1',
                    'wawa2' => 'Style 2',
                    'wawa3' => 'Style 3',
                    'wawa4' => 'Style 4',
                    'wawa5' => 'Style 5',
                ))
                ->set_default_value('wawa1')
                ->set_help_text('Choose the style of the box'),


            //select to choose whatsapp box position
            Field::make('select', 'wawa_position', 'Whatsapp box Position')
                ->add_options(array(
                    'left' => 'Left',
                    'right' => 'Right',
                ))
                ->set_default_value('right')
                ->set_help_text('Choose the position of the box'),



            //checkbox to show greeting or not
            Field::make('checkbox', 'wawa_greeting', 'Show Greeting')
                ->set_option_value('yes')
                ->set_default_value(true)
                ->set_help_text('Do not check if you do not want to show it'),

            //textarea greeting if show greeting is checked
            Field::make('text', 'wawa_greeting_text', 'Greeting Text')
                ->set_required(true)
                ->set_default_value('Customer Service')
                ->set_help_text('e.g Your Greeting: "Customer Service", please do not more than 20 characters!')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'wawa_greeting',
                        'value' => true,
                    ),
                )),


            //checkbox show logo
            Field::make('checkbox', 'wawa_logo', 'Show Logo')
                ->set_option_value('yes')
                ->set_default_value(true)
                ->set_help_text('Do not check if you do not want to show it'),

            //image logo url if show logo is checked
            Field::make('image', 'wawa_logo_url', 'Logo URL')
                ->set_required(true)
                ->set_value_type('url')
                ->set_help_text('Upload your logo with dimension 100x100px, and make sure use .png or image with transparent background!')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'wawa_logo',
                        'value' => true,
                    ),
                )),

            //user photo
            Field::make('checkbox', 'wawa_photo', 'Show User Photo')
                ->set_option_value('yes')
                ->set_default_value(true)
                ->set_help_text('Show your user photo, Do not check if you do not want to show it')
                ->set_classes('wawa-photo'),


            //icon
            Field::make('checkbox', 'wawa_icon', 'Show Icon')
                ->set_option_value('yes')
                ->set_default_value(true)
                ->set_help_text('Show your icon, Do not check if you do not want to show it'),

            //text field icon for whatsapp
            Field::make('text', 'wawa_icon_whatsapp', 'Icon for Whatsapp')
                ->set_default_value('fa-brands fa-whatsapp')
                ->set_help_text('Get class name font awesome for your Icon for Whatsapp, e.g. fa-brands fa-whatsapp or leave it empty if you want to use default icon')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'wawa_icon',
                        'value' => true,
                    ),
                )),
            //text field icon for call
            Field::make('text', 'wawa_icon_call', 'Icon for Call')
                ->set_default_value('fa-solid fa-square-phone')
                ->set_help_text('Get class name font awesome for your Icon for Call, e.g. fa-solid fa-square-phone or leave it empty if you want to use default icon')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'wawa_icon',
                        'value' => true,
                    ),
                )),


            //text field icon for email
            Field::make('text', 'wawa_icon_email', 'Icon for Email')
                ->set_default_value('fa-solid fa-envelope')
                ->set_help_text('Get class name font awesome for your Icon for Email, e.g. fa-solid fa-envelope or leave it empty if you want to use default icon')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'wawa_icon',
                        'value' => true,
                    ),
                )),



            //box header text
            Field::make('text', 'wawa_box_header', 'Box Header')
                ->set_default_value('Customer Services')
                ->set_help_text('Your Box Header, e.g. Contact Us or Customer Service, please write no more than 20 characters!'),





            Field::make('separator', 'wawauserfieldsep', 'Users')
                ->set_classes('wawa-sep child'),


            //complex fields
            Field::make('complex', 'wawas', 'User')
                ->set_layout('tabbed-horizontal')

                ->add_fields(array(



                    //checkbox to enable or disable user
                    Field::make('checkbox', 'wawa_enable', 'Enable')
                        ->set_default_value(true),

                    //multiselect to choose user button assignment: Whatsapp, Call, or Email
                    Field::make('multiselect', 'wawa_button', 'Button')
                        ->add_options(array(
                            'whatsapp' => 'Whatsapp',
                            'call' => 'Call',
                            'email' => 'Email',
                        )),

                    //image user photo
                    Field::make('image', 'wawa_user_photo_url', 'User Photo')
                        ->set_value_type('url')
                        ->set_help_text('Upload your photo with dimension 100x100px, and make sure use .png or image with transparent background!')
                        ->set_classes('wawa-user-photo-url'),



                    //name
                    Field::make('text', 'wawa_name', 'Name')
                        ->set_default_value('Budi Haryono')
                        ->set_help_text('Your Name, e.g. Budi Haryono or leave it empty if you do not want to show it'),

                    //job
                    Field::make('text', 'wawa_job', 'Job')
                        ->set_default_value('Web Developer')
                        ->set_help_text('Your Job, e.g. Web Developer or leave it empty if you do not want to show it'),

                    //number whatsapp number
                    Field::make('text', 'wawa_number', 'Number For Whatsapp')
                        ->set_default_value('6282233566320'),

                    //number call number
                    Field::make('text', 'wawa_call', 'Number for Call')
                        ->set_default_value('6281398912341')
                        ->set_help_text('Your Call Number, e.g. 6281234567890 fill it if you want to use different number for call'),

                    //email
                    Field::make('text', 'wawa_email', 'Email')
                        ->set_default_value('mail.budiharyono@gmail.com')
                        ->set_help_text('Your Email, e.g. mail.budiharyono@gmail.com or leave it empty if you do not want to show it'),

                    //enable schedule
                    Field::make('checkbox', 'wawa_enable_schedule', 'Enable Schedule')
                        ->set_option_value('yes')
                        ->set_default_value(true)
                        ->set_help_text('Do not check if you do not want to enable schedule'),

                    //multiselect to choose disable user on specific day
                    Field::make('multiselect', 'wawa_free_day', 'Disable User On Specific Day')
                        ->add_options(array(
                            'sunday' => 'Sunday',
                            'monday' => 'Monday',
                            'tuesday' => 'Tuesday',
                            'wednesday' => 'Wednesday',
                            'thursday' => 'Thursday',
                            'friday' => 'Friday',
                            'saturday' => 'Saturday',
                        ))
                        ->set_help_text('Choose the day you want to disable this user, do not choose if you want to show it everyday')
                        ->set_conditional_logic(array(
                            array(
                                'field' => 'wawa_enable_schedule',
                                'value' => true,
                            ),
                        )),




                ))

                ->set_header_template('
                <% if (wawa_name) { %>
                    <%- wawa_name %>
                <% } else { %>
                    Service
                <% } %>
            ')









        ));
}
