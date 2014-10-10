<?php

/*
 * This file is part of the hyyan/admin-color-schema package.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * HyyanLogoController
 *
 * @author Hyyan
 */
class HyyanLogoController {

    /**
     * Setup the logo controller
     * 
     * @param WP_Customize_Manager $manager
     */
    public static function setup(\WP_Customize_Manager $manager) {

        $manager->add_section('hyyan_logo_section', array(
            'title' => __('Site Logo', 'logo-controller')
            , 'priority' => 0,
            'capability' => 'edit_theme_options',
        ));

        $manager->add_setting('hyyan_logo_controller');
        $manager->add_control(new WP_Customize_Image_Control($manager, 'hyyan_logo_controller', array(
            'label' => __('Choose your logo image', 'logo-controller')
            , 'section' => 'hyyan_logo_section'
        )));
    }

    public static function getOptions() {
        $default = array(
            // path for default logo image relative to the theme dir
            'default' => '/logo.png',
        );
        return apply_filters('Hyyan\LogoController.options', $default);
    }

    /**
     * Get the logo url
     * 
     * @return string
     */
    public static function getLogoUrl() {
        $setting = self::getOptions();
        return ($result = get_theme_mod('hyyan_logo_controller')) && !empty($result) ?
                $result : $setting['default'];
    }

}

/**
 * Get the logo url
 * 
 * @see mlst_Logo_Controller::getgetLogoUrl()
 * 
 * @return string
 */
function hyyan_get_the_logo() {
    return HyyanLogoController::getLogoUrl();
}

/**
 * Print logo url
 * 
 * @param string $path the url target
 * @param string $description the logo image description
 * 
 * @see mlst_Logo_Controller::getgetLogoUrl()
 */
function hyyan_the_logo($path = null, $description = null) {

    $path = !empty($path) ? $path : home_url('/');
    $description = !empty($description) ? $description : get_bloginfo('name', 'display');

    echo sprintf(
            '<a href="%1$s" title="%2$s" rel="home">'
            . '<img src="%3$s" alt="%2$s">'
            . '</a>'
            , esc_url($path)
            , esc_attr($description)
            , esc_url(hyyan_get_the_logo())
    );
}
