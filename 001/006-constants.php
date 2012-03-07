<?php

// Defining a constant
define("AUTHOR_EMAIL", 'shahar@arr.gr');
define("ALMOST_PI", 3.14159265);

// Using a constant
$radius = 5;
echo "Circumference: ";
echo $radius * 2 * ALMOST_PI;

// Checking if a constant is defined
if (! defined('APPLICATION_DIR'))
    echo "Error: application root dir not set!";
