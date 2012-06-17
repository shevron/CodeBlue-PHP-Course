<?php

// Callable Examples

// String with function name
uasort($myArray, 'strcmp');

// Static Class Method
$handler = array('MyApp\Context', 'handleException');
set_exception_handler($handler);

// Dynamic Object Method
$callable = array($myObject, 'publicMethod');
call_user_func_array($callable, $parameters);

// An object that implements __invoke()
class MinimumFilter
{
    protected $min = 0;

    public function __construct($min)
    {
        $this->min = $min;
    }

    public function __invoke($var)
    {
        return ($var >= $this->min);
    }
}

$positive = new MinimumFilter(1);
array_filter($data, $positive);
