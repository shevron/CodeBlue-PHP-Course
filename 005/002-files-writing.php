<?php

// Opening a file in 'w' mode will delete any
// existing content. Open in 'a' mode to append

// Read all file into an array of lines
$data = file(__DIR__ . '/data/lines.txt');

$outFile = sys_get_temp_dir() . '/output.txt';
$output = fopen($outFile, 'w');
for ($i = count($data) - 1; $i >= 0; $i--) {
    $line = strrev(trim($data[$i])) . "\n";
    fwrite($output, $line);
}

// For readability purposes let's dump it to output
header("Content-type: text/plain");
readfile($outFile);