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

class hd_Mp {

    public static function init(){
      add_action('wp_footer', array(__CLASS__,'newFooter'));
      add_action('wp_footer', array(__CLASS__,'newFooter2'));
    }

    public function newFooter() {
      echo "This is newFooter";
    }
    public function newFooter2() {
      echo "This is newFooter 2".$enter;
    }
}

hd_Mp::init();


?>