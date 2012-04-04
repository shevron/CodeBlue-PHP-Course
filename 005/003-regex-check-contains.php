<?php

/**
 * Check if a string contains a character
 */

$pattern = '/[^\w]Shahar\s/';

if (preg_match($pattern, $_GET['name'])) {
    echo "Your name is Shahar too?";
}