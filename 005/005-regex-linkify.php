<?php

/**
 * Linkify URLs
 */

$input = file_get_contents(__DIR__ . '/data/links.txt');

// Linkify URLs
$search = '#(https?://\S+)#';
$htmlFile = preg_replace($search,
                         '<a href="\1">\1</a>',
                         $input);

echo nl2br($htmlFile);