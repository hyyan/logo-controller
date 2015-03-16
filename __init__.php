<?php

/*
 * Plugin Name: Hyyan Logo Controller
 * Plugin URI: https://github.com/hyyan/logo-controller/
 * Description: Wordpress plugin to add new option for the theme customizer allowing the user to change the logo
 * Author: Hyyan Abo Fakher
 * Version: 1.0
 * Author URI: https://github.com/hyyan
 * GitHub Plugin URI: hyyan/logo-controller
 * Domain Path: /languages
 * Text Domain: logo-controller
 * License: MIT License
 */

if (!defined('ABSPATH'))
    exit('restricted access');

require_once __DIR__ . '/src/Hyyan/LogoController/Plugin.php';
require_once __DIR__ . '/src/helpers.php';

/**
 * Add translation
 */
add_action('plugins_loaded', function() {
    load_plugin_textdomain(
            'logo-controller'
            , false
            , trailingslashit(basename(dirname(__FILE__))) . 'languages/'
    );
});
/**
 * Bootstrap the plugin
 */
add_action('customize_register', array('\Hyyan\LogoController\Plugin', 'addThemeCustomizeSupport'));
add_action('login_head', array('\Hyyan\LogoController\Plugin', 'addLoginSupport'));
