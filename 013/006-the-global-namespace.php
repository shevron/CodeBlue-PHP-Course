<?php

namespace MyApp;

if (! $cool) {
    // This will look for \MyApp\Exception
    throw new Exception("This is not cool!");
}

if (! $nice) {
    // This will work as expected
    throw new \Exception("This is not nice!");
}

function remove_vowels($text)
{
    // This will work even without a leading slash
    return preg_replace('/[aeiou]/i', '', $text);
}