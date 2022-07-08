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
 
 define('HD_PLUGIN_URL',plugin_dir_url(__FILE__));
 define('HD_PLUGIN_DIR',plugin_dir_path(__FILE__));
 define('HD_VIEW_DIR',HD_PLUGIN_DIR.'/views');

if(!is_admin()) {
  require_once HD_PLUGIN_DIR.'/public.php'; 
  new Ha_duyMP();
} else {
  require_once HD_PLUGIN_DIR.'/admin.php';
  new Ha_duy_Admin();
}

?>