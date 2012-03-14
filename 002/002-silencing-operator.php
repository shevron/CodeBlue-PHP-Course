<?php

/**
 * Using the error silencing operator
 */

$filename = "non-existing-file.txt";

if (! ($data = @file_get_contents($filename))) {
    echo "Error reading data from file: $filename\n";
    exit(1);

} else {
    echo $data;
}