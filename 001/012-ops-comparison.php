<?php

// Comparison operators

$foo = 1;
$bar = 2;

$foo == $bar; // are $foo and $bar equal?
$foo != $bar; // are $foo and $bar different?
$foo <> $bar; // are $foo and $bar different?
$foo  < $bar; // is $foo smaller than $bar?
$foo  > $bar; // is $foo greater than $bar?
$foo <= $bar; // is $foo smaller than or equal to $bar?
$foo >= $bar; // is $foo greater than or equal to $bar?

// are $foo and $bar identical in type and value?
$foo === $bar;
// are $foo and $bar different in type or value?
$foo !== $bar;

// Equality vs. Identity
$foo = "5";
$bar = 5;

var_dump($foo == $bar);  // TRUE
var_dump($foo === $bar); // FALSE

// Beware of this common pitfall:
var_dump($foo = bar);    // int(5)