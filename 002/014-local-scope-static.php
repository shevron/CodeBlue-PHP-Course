<?php

/**
 * Local-scope static variables
 */

function get_unique_id()
{
    static $idEnumerator = null;

    if ($idEnumerator === null) {
        $idEnumerator = 0;
    }

    return $idEnumerator++;
}

echo get_unique_id() . "\n"; // Output: 0
echo get_unique_id() . "\n"; // Output: 1
echo get_unique_id() . "\n"; // Output: 2
