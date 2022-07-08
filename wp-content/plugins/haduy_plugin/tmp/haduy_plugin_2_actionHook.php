<?php

/**
 * @package haduy_plugin
 * Plugin Name: Ha Duy Plugin
 * Plugin URI: https://haduy-plugin.com/
 * Description : Just test plugin
 * Author: Automattic
 * Author URI: https://haduy-plugin.com/wordpress-plugins/
 * License: GPLv2 or later
 * Text Domain: haduy
 **/
$enter = "<br />";
$path = plugin_dir_path(__FILE__).'/includes';
require_once $path. '/public.php';

$hdmp = new hd_Mp();

add_action( 'wp_footer',array($hdmp,'newFooter')).$enter;
add_action( 'wp_footer',array($hdmp,'newFooter2'));






?>