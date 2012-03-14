<?php

/**
 * A for loop
 */

// Build a million member array
$oneToMillion = array();
for ($i = 0; $i < 1000000; $i++) {
    $oneToMillion[] = $i;
}

// Count backwards from 10 to 0
for ($i = 10; $i >= 0; $i--) {
    echo "$i...\n";
    sleep(1);
}