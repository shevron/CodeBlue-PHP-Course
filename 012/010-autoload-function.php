<?php

/**
 * This is a global autoloader function
 *
 * @param string $class
 */
function __autoload($class)
{
    $filename = strtolower($class) . ".php";
    if (file_exists($filename)) {
        require_once $filename;
    } else {
        return false;
    }
}

/**
 * This shows how another autoloader can be registered with
 * spl_autoload_register()
 */


function myFrameworkAutoloader($class)
{
    if (substr($class, 0, 7) != "Shahar_") {
        return false;
    }

    $filename = SHAHAR_BASEDIR . '/library/' .
                str_replace('_', '/', $class);

    require_once $filename;
}

spl_autoload_register('myFrameworkAutoloader');