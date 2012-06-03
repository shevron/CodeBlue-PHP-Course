<?php

$defaults = array("Name"    => "John Doe",
                  "Address" => "Unknown");

$params = array("Name"  => "Bilbo Baggins",
                "Hobby" => array("Traveling",
                                 "Collecting Jewelry"));

var_dump(array_merge($defaults, $params));

// array(3) {
//     ["Name"]=>
//     string(13) "Bilbo Baggins"
//     ["Address"]=>
//     string(7) "Unknown"
//     ["Hobby"]=>
//     array(2) {
//         [0]=>
//         string(10) "Traveling"
//         [1]=>
//         string(18) "Collecting Jewelry"
//     }
// }