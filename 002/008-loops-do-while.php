<?php

/**
 * A do-while loop
 */

// Read until we get an empty line
do {
    // Read line from input
    $line = fgets(STDIN);
    // Convert line to uppercase
    echo strtoupper($line);
} while ($line && $line != "\n");