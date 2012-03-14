<?php

/**
 * Defining Functions
 */

// Functions can be called before they are defined
var_dump(is_lowercase('foo bar baz'));
var_dump(is_lowercase('foo bar baZ'));

// Check if a string is all lower case
function is_lowercase($string)
{
    $len = strlen($string);
    for ($c = 0; $c < strlen($string); $c++) {
        if (ord($string[$c]) >= ord('A') &&
            ord($string[$c]) <= ord('Z')) {

            return false;
        }
    }

    return true;
}
