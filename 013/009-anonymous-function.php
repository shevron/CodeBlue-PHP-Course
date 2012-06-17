<?php

// An anonymous function
$text = 'Hello, My name is Inigo Montoya';

$replace = function($matches) {
    static $vowels;
    if (! $vowels) $vowels = array('a', 'e', 'i', 'o', 'u');
    return $vowels[array_rand($vowels)];
};

preg_replace_callback('/[aeiou]/i', $replace, $text);