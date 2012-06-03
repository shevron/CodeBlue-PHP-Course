<?php

// Our initial array:
$input = array("war"       => "peace",
               "freedom"   => "slavery",
               "ignorance" => "power");

// sort example
$sorted = $input;
sort($sorted);
var_dump($sorted);

// array(3) {
//   [0]=>
//   string(5) "peace"
//   [1]=>
//   string(5) "power"
//   [2]=>
//   string(7) "slavery"
// }

// asort example - maintain associative keys
$sorted = $input;
asort($sorted);
var_dump($sorted);

// array(3) {
//     ["war"]=>
//     string(5) "peace"
//     ["ignorance"]=>
//     string(5) "power"
//     ["freedom"]=>
//     string(7) "slavery"
// }

// ksort example - sort by key
$sorted = $input;
ksort($sorted);
var_dump($sorted);

// array(3) {
//     ["freedom"]=>
//     string(7) "slavery"
//     ["ignorance"]=>
//     string(5) "power"
//     ["war"]=>
//     string(5) "peace"
// }

// uasort example - use user function to sort
$sorted = $input;
uasort($sorted, function($a, $b) {
    $aLen = strlen($a);
    $bLen = strlen($b);
    if ($aLen == $bLen) return 0;
    return ($aLen > $bLen ? 1 : -1);
});
var_dump($sorted);

// array(3) {
//     ["war"]=>
//     string(5) "peace"
//     ["ignorance"]=>
//     string(5) "power"
//     ["freedom"]=>
//     string(7) "slavery"
// }
