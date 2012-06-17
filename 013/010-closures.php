<?php

/**
 * This function returns a callable filter for
 * numeric values
 */
function minMaxFilter($min, $max) {
    return function ($number) use ($min, $max) {
        return ($number >= $min && $number <= $max);
    };
}

$data = range(1, 10, 2);
var_dump(array_filter($data, minMaxFilter(3, 7)));

/**
 * Decode all percent encoded characters which are allowed to be
 * represented literally. Will not decode any characters which
 * are not listed in the 'allowed' list
 *
 * This example is taken from Zend Framework 2.0 and used under the terms of
 * the new BSD license. (C) 2012 Zend Technologies LTD
 */
function decodeUrlEncodedChars($input, $allowed = '')
{
    $decodeCb = function($match) use ($allowed) {
        $char = rawurldecode($match[0]);
        if (preg_match($allowed, $char)) {
            return $char;
        }
        return strtoupper($match[0]);
    };

    return preg_replace_callback('/%[A-Fa-f0-9]{2}/', $decodeCb, $input);
}
