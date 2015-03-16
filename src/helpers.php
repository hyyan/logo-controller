<?php

/*
 * This file is part of the hyyan/logo-controller package.
 * (c) Hyyan Abo Fakher <tiribthea4hyyan@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Get the logo url
 * 
 * @see HyyanLogoController::getLogoUrl()
 * 
 * @return string
 */
function hyyan_get_the_logo() {
    return \Hyyan\LogoController\Plugin::getLogoUrl();
}

/**
 * Print logo url
 * 
 * @param string $path the url target
 * @param string $description the logo image description
 * 
 * @see HyyanLogoController::printLogo
 */
function hyyan_the_logo($path = null, $description = null) {
    \Hyyan\LogoController\Plugin::printLogo($path, $description);
}
