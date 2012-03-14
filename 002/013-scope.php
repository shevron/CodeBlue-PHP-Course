<?php

/**
 * Understanding scope
 */

// This is a global scope variable
$counter = 1;

function increment($counter)
{
    // This is a local scope variable
    return $counter++;
}

for($i = 0; $i < 3; $i++) {
    echo increment($counter);
}

function increment_global()
{
    // Declare $counter as a global scope var
    global $counter;
    return $counter++;
}

for($i = 0; $i < 3; $i++) {
    echo increment_global();
}