# [Wordpress Logo Controller ](https://github.com/hyyan/logo-controller/)

[![project status](http://stillmaintained.com/hyyan/logo-controller.png)](http://stillmaintained.com/hyyan/logo-controller)
[![Latest Stable Version](https://poser.pugx.org/hyyan/logo-controller/v/stable.svg)](https://packagist.org/packages/hyyan/logo-controller)
[![Total Downloads](https://poser.pugx.org/hyyan/logo-controller/downloads.svg)](https://packagist.org/packages/hyyan/logo-controller)
[![License](https://poser.pugx.org/hyyan/logo-controller/license.svg)](https://packagist.org/packages/hyyan/logo-controller)

Wordpress plugin to add new section for the customizer to allow the user to 
change the logo for website and login page.

![ScreenShot](https://raw.github.com/hyyan/logo-controller/master/screenshot-2.png)

## How to install

### Classical way
    
1. Download the plugin as zip archive and then upload it to your wordpress plugins folder and 
extract it there.
2. Activate the plugin from your admin panel

### Composer way

1. run composer command : ``` composer require hyyan/logo-controller```

## How to use

### Plugin configutaion

The plugin comes with following configuration as default :

```php
$default = array(
    // path for default logo 
    'default' => '/logo.png',
    //the logo url (default to home page)
    'url' => home_url('/'),
    // the logo desciption default to (get_bloginfo('name', 'display')) 
    'description' => get_bloginfo('name', 'display'),
    // enable logo display on the login page
    'enable-on-login-page' => true,
);
```

You can override the default configuration using ```add_filter``` function like 
in the following example :

```php
// in the your theme's functions.php file

add_filter('Hyyan\LogoController.options', function(array $default) {

    $default['default'] = '/my-logo.png';
    $default['enable-on-login-page'] = false;

    return $default;
});
```

### Display the logo in your theme

The plugin does not make any assumption about the place of your logo so you have
to add it manually , probably in your ```header.php``` template.

```php
<?php 

 // in you theme template use the following functions to get the logo
  
// print : http://example.com/path/to/logo.png 
 echo hyyan_get_the_logo(); 

// print : <img src="http://example.com/path/to/logo.png" alt="Website Title">    
 hyyan_the_logo(); 

```

## Contributing

Everyone is welcome to help contribute and improve this plugin. There are several 
ways you can contribute:

* Reporting issues (please read [issue guidelines](https://github.com/necolas/issue-guidelines))
* Suggesting new features
* Writing or refactoring code
* Fixing [issues](https://github.com/hyyan/logo-controller/issues)

