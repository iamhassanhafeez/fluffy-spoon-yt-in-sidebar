<?php
/**
 * Plugin Name: Fluffy Spoon YT in Sidebar
 * Description: This plugin creates a widget to facilitate you with optins to show your youtube channel details in widebar or footer.
 * Author: Hassan Hafeez
 * Plugin URI: https://github.com/iamhassanhafeez/fluffy-spoon-yt-in-sidebar
 * Author URI: https://github.com/iamhassanhafeez
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: fs-yt-in-sidebar
 */

 if(!defined('ABSPATH')) exit;

 require_once plugin_dir_path(__FILE__).'includes/class-fs-yt-widget.php';


 function register_fs_yt_widget(){
    register_widget('FSYTWidget');
 }
 add_action('widgets_init', 'register_fs_yt_widget');

 
?>