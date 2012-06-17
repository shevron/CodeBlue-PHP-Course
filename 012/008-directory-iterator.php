<?php

/**
 * Using DirectoryIterator to iterate over files in a directory
 */

$thisDir = new DirectoryIterator(__DIR__);

foreach($thisDir as $file) {
    echo "{$file->getFilename()} last modified at " .
         date("Y-m-d H:i:s", $file->getMTime()) . "\n";
}