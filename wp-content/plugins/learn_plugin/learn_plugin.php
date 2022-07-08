<?php
/*
Plugin Name: Advanced Quiz
Plugin URI: https://haduytuan.com/
Description: This is a plugin designed by Haduytuan
Version: 4.2.2
Author: Haduytuan
Author URI: https://haduytuan.com/advanced-quiz
License: GPLv2 or later
Text Domain: haduy
*/
if(!function_exists('add_option')){
    echo "Hello there ! You cannot access here ! Sorry";
    exit();
}
define('ADVANCED_QUIZ_VERSION', '2.0.0');
define('ADVANCED_QUIZ_MINIMUM_VERSION', '1.0.0');
define('ADVANCED_QUIZ_PLUGIN_DIR',plugin_dir_path(__FILE__));

function my_active_plugin_dt()
{
    echo "I am Ha Duy Tuan";
}
add_option('storefront_before_footer','my_active_plugin_dt');

//register_activation_hook(__FILE,'my_active_plugin' );
//register_deactivation_hook();
