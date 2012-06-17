<?php

/**
 * Throwing an Exception
 */

function check_number($value) {
    if (! is_numeric($value)) {
        $msg = "Expecting numeric value, got " .
               gettype($value);
        throw new Exception($msg);
    }

    return (int) $value;
}