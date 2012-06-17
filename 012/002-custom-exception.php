<?php

/**
 * Define a specific exception class for reporting
 * invalid argument types
 *
 */
class InvalidTypeException extends Exception
{
    public $expectedType = null;
    public $gotType = null;
}

function check_number($value) {
    if (! is_numeric($value)) {
        $ex = new InvalidTypeException("Expecting a numertic value");
        $ex->expectedType = 'int';
        $ex->gotType = is_object($value) ?
                       get_class($value) :
                       gettype($value);
        throw $ex;
    }

    return (int) $value;
}
