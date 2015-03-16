=== Logo Controller ===
Contributors: hyyan 
Tags: logo , cutomizer , wp cutomizer , wordpress cutomizer , logo cutomizer , logo controller, logo plugin , website logo , theme logo , client logo
Requires at least: 3.0.1
Tested up to: 4.0.1
Stable tag: 1.0
License: MIT

Wordpress plugin to add new section for the customizer to allow the user to 
change the logo for website and login page.

== Description ==

**How to use**

Just go to customize page and choose your logo , then use one of the following 
functions in your theme to display the logo.

`
<?php 

// print : http://example.com/path/to/logo.png 
 echo hyyan_get_the_logo(); 

// print : <img src="http://example.com/path/to/logo.png">    
 hyyan_the_logo(); 
`

You can also control the plugin behaviour by using the following filter:

`
<?php
// in the your theme's functions.php file

add_filter('Hyyan\LogoController.options', function(array $default) {
    
    $default['default'] = '/my-logo.png';
    $default['enable-on-login-page'] = true;

    return $default;
});
`

= Contributing =

Everyone is welcome to help contribute and improve this plugin. There are several 
ways you can contribute:

* Reporting issues (please read [issue guidelines](https://github.com/necolas/issue-guidelines))
* Suggesting new features
* Writing or refactoring code
* Fixing [issues](https://github.com/hyyan/logo-controller/issues)


== Installation ==

**Classical Way**

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

**Composer Way**

`composer require hyyan/logo-controller:version`


== Screenshots ==

1. Plugin in customizer
2. Choosen logo in login page