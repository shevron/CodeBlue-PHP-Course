<?php

/**
 * Pass-by-reference into a function
 */

function filter_int_values(&$input)
{
    foreach($input as $key => $value) {
        if (! is_integer($value)) {
            unset($input[$key]);
        }
    }
}

$data = array('foo', 2, 5, true, 12.5, 0, 'x');
filter_int_values($data);
var_dump($data);