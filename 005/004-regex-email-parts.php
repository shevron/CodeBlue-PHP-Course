<?php

/**
 * Find all capitalized words in file
 */

$pattern = '/^(\w+)@(([a-z]+\.)*[a-z]+)$/';

if (preg_match($pattern, $_GET['email'], $match)) {
    echo "Got an email address! Domain is " .
         $match[2] . ", user is " . $match[1];
} else {
    echo "Not an email address...";
}
