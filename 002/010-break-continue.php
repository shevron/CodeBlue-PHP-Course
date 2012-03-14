<?php

// Break example
$values = array('a', 'b', 'c', 'f', 'g', 'h', 'k', 'd');
$search = 'g';

$match = null;
foreach($values as $index => $value) {
    if ($value == $search) {
        $match = $index;
        break;
    }
}

if ($match) {
    echo "The value was matched at index $match";
}

// Continue example
// Assume is_prime_number() exists...
for ($i = 0; $i < 1000; $i++) {
    if (! is_prime_number($i)) continue;
    echo "Found a prime number: $i\n";
}