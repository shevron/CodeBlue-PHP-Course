<?php

// Creating an indexed array
$colors = array('red', 'blue', 'green', 'purple');

// Accessing an item in an array
echo $colors[1]; // What will this print?

// Setting a value of an array item
$colors[4] = 'white';

// Appending an item to an array
$colors[] = 'magenta';

// Creating an associative array
$countryCodes = array('iq' => 'Iraq',
                      'ir' => 'Iran',
                      'il' => 'Israel');

echo $countryCodes['il'];

// Multi-dimensional arrays
$board = array(
    array('X', ' ', 'O'),
    array('O', 'X', ' '),
    array('O', ' ', 'X')
);

// Accessing a multi-dimensional array item
var_dump($board[1]); // an array of 3 items
var_dump($board[1][0]); // the string 'O'
