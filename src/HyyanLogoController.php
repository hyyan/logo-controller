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
            'title' => __('Site Logo', 'hyyan-logo-controller')
            , 'priority' => 0,
            'capability' => 'edit_theme_options',
        ));

        $manager->add_setting('hyyan_logo_controller');
        $manager->add_control(new WP_Customize_Image_Control($manager, 'hyyan_logo_controller', array(
            'label' => __('Choose your logo image', 'hyyan-logo-controller')
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
