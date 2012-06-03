<?php

// Read data from STDIN until we get an empty line
$lines = array();
do {
    $line = trim(fgets(STDIN));
    if ($line) $lines[] = $line;
} while ($line);

// Print all lines again
while (! empty($lines)) {
    echo array_shift($lines) . "\n";
}
