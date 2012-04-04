<?php

/**
 * Reading data from a local file
 */

// Open file for reading
$handle = fopen(__DIR__ . '/data/lines.txt', 'r');
if (! $handle) {
    echo "Unable to open file!\n";
    exit(1);
}

echo "<ol>";
while ($line = fgets($handle)) { // fgets - read until end of line
    $line = trim($line);
    echo "<li>" . htmlspecialchars($line) . "</li>";
}
echo "</ol>";

fclose($handle);