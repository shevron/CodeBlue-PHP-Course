<?php

/**
 * A 'while' loop
 */

while (check_condition()) {
    echo "Condition is still true";
}

// A for-equivalent while loop
$count = 10;
while ($count >= 0) {
    echo "$count...\n";
    sleep(1);
    $count--;
}