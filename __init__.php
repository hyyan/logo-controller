<?php

/*
 * Plugin Name: Hyyan Logo Controller
 * Plugin URI: https://github.com/hyyan/logo-controller/
 * Description: Wordpress plugin to add new option for the theme customizer allowing the user to change the logo
 * Author: Hyyan Abo Fakher
 * Version: 0.1
 * Author URI: https://github.com/hyyan
 * Domain Path: /languages
 * Text Domain: hyyan-logo-controller
 * License: MIT License
 */

require_once __DIR__ . '/src/HyyanLogoController.php';
require_once __DIR__ . '/src/functions.php';

add_action('customize_register', array('HyyanLogoController', 'setup'));
