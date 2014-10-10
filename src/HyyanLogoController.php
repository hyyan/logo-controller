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
     * Add Theme Customize Support
     * 
     * @param WP_Customize_Manager $manager
     */
    public static function addThemeCustomizeSupport(\WP_Customize_Manager $manager) {

        // add the image filed
        $manager->add_setting('hyyan_logo_controller_image');
        $manager->add_control(new WP_Customize_Image_Control($manager, 'hyyan_logo_controller_image', array(
            'label' => __('Choose your logo image', 'logo-controller')
            , 'section' => 'title_tagline'
        )));
    }

    /**
     * Add the logo to the login page
     * 
     * Change the logo in the login page and also change the url href and title
     * 
     * @return boolean false if the optioh is disabled
     */
    public static function addLoginSupport() {

        $setting = self::getOptions();
        if (!$setting['enable-on-login-page'])
            return false;

        add_filter('login_headerurl', function() {
            return get_bloginfo('url');
        });
        add_filter('login_headertitle', function() {
            return get_bloginfo('description');
        });

        $url = static::getLogoUrl();
        if (!empty($url)) {
            list($width, $height, $type, $attr) = getimagesize($url);
            print(
                    '<style type="text/css">'
                    . ".login h1 a {"
                    . "     background-image: url('{$url}');"
                    . "     background-size: 100%; "
                    . "     width:100%;"
                    . "     height:{$height}px;"
                    . "}"
                    . '</style>'
            );
        } else {
            print(
                    '<style type="text/css">'
                    . ".login h1 a {display:none}"
                    . '</style>'
            );
        }
    }

    public static function getOptions() {
        $default = array(
            // path for default logo image relative to the theme dir
            'default' => '/logo.png',
            //the logo url (default to home page)
            'url' => home_url('/'),
            // the logo desciption default to (get_bloginfo('name', 'display')) 
            'description' => get_bloginfo('name', 'display'),
            // enable logo display on the login page
            'enable-on-login-page' => true,
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
        ($result = get_theme_mod('hyyan_logo_controller_image')) && !empty($result) ?
                        $result : $setting['default'];
        return esc_url($result);
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
