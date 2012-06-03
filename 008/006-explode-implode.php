<?php

// Break a string into an array
$str = "Alpha,Beta,Gamma,Delta";
var_dump(explode(',', $str));

// Join an array into a string
$hobbits = array("Frodo", "Sam", "Merry", "Pippin");
echo "<ul><li>" . implode("</li><li>", $hobbits) .
     "</li></ul>";