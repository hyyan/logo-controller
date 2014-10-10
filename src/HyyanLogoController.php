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
        
        // add the image filed
        $manager->add_setting('hyyan_logo_controller_image');
        $manager->add_control(new WP_Customize_Image_Control($manager, 'hyyan_logo_controller_image', array(
            'label' => __('Choose your logo image', 'logo-controller')
            , 'section' => 'title_tagline'
        )));

 
    }

    public static function getOptions() {
        $default = array(
            // path for default logo image relative to the theme dir
            'default' => '/logo.png',
            //the logo url (default to home page)
            'url' => home_url('/'),
            // the logo desciption default to (get_bloginfo('name', 'display')) 
            'description' => get_bloginfo('name', 'display')
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
        return ($result = get_theme_mod('hyyan_logo_controller_image')) && !empty($result) ?
                $result : $setting['default'];
    }

    /**
     * Print logo url
     * 
     * @param string $path the url target
     * @param string $description the logo image description
     * 
     * @see HyyanLogoController::getLogoUrl()
     */
    public static function printLogo($path = null, $description = null) {

        $setting = static::getOptions();

        $path = !empty($path) ? $path : $setting['url'];
        $description = !empty($description) ? $description : $setting['description'];

        echo sprintf(
                '<a href="%1$s" title="%2$s" rel="home">'
                . '<img src="%3$s" alt="%2$s">'
                . '</a>'
                , esc_url($path)
                , esc_attr($description)
                , esc_url(static::getLogoUrl())
        );
    }

}
