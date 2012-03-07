<?php

// The Concatenation Operator

$foo = "Hello";
$bar = "World";
echo $foo . ", " . $bar;

// Other types are juggled to string
$count = 5;
var_dump("You are number " . $count);