<?php

/**
 * New syntax in PHP 5.4
 */

// Shorthand array notation
$planets = ['Saturn', 'Jupiter', 'Neptune'];
// same as array('Saturn', 'Jupiter', 'Neptune');

// Binary notation
var_dump(15 == 0xf == 017 == 0b1111);

// Array Dereferencing
$earth = get_planets()[2];

// Object Constructor Dereferencing / Chaining
$select = (new Select())->where(['name = ?' => $name])
                        ->where('active = 1');
