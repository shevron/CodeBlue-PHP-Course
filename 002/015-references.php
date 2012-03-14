<?php

/**
 * Creating References
 */

// This demonstrates assignemtn by value
$varA = 1;
$varB = $varA;

$varA++;
var_dump($varA, $varB);

// While this shows creating a reference
$varA = 1;
$varB = &$varA;

$varA++;
var_dump($varA, $varB);
$varB++;
var_dump($varA, $varB);