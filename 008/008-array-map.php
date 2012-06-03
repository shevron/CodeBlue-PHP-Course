<?php

$input = array(1, 2, 3, 4, 5);

// array_map example
$half = function($val) {
    return $val / 2;
};

var_dump(array_map($half, $input));
