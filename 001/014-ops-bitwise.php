<?php

// Bitwise Operators

$a = 0xff;       // 11111111

// Bitwise AND
$b = $a & 0xf;   // 00001111

// Bitwise OR
$c = $b | 128;   // 10001111

// Bitwise XOR
$d = $c ^ 0xf0;  // 01111111

// Bitwise NOT
$e = ~$d;        // 11111111111111111111111110000000
$e = ~$d & 0xff; // 10000000

// Shift left
$f = $e << 2;    // 1000000000

// Shift right
$g = $f >> 8;    // 0000000010