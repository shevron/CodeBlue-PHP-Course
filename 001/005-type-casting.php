<?php

// Type Casting Examples
$number = 5.6;
$string = (string) $number;
var_dump($number, $string);

// Casting arrays to strings always returns "Array"
$array = array(1, 2, 3);
var_dump((string) $array);

// Casting strings to numbers works as long as it "looks like a number"
$string = "5 days and 4 nights";
var_dump((int) string);

$string = "6.666";
var_dump((int) string);
