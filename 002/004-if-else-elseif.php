<?php

/**
 * Example of using if-else-elseif
 */

$a = "This is a string";
$b = 0;

// If / else blocks
if ($a || $b) {
    echo "This part runs";
} else {
    echo "This part does not run";
}

// Using elseif
if ($a) {
    echo '$a is true, $b may be true or false';
} elseif ($b) {
    echo '$b is true but $a is false';
} else {
    echo 'neither $a nor $b are true';
}

$condition = false;

// One liners (use with care!)
if ($condition)
    echo "This part runs sometimes";
    echo "This part runs always";
