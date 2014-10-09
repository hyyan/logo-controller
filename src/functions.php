<?php

/*
 * This file is part of the hyyan/admin-color-schema package.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
