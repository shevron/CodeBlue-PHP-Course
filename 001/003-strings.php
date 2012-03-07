<?php

// Escaping with single quotes
echo 'My name is \'Shahar\'';
echo 'My name is "Shahar"';
echo 'In Windows you use C:\\';

// Double quote escape sequences
$name = "Shahar";
echo "My name is '$name'";
echo "My name is \"$name\"";
echo "My name is '\$name'";

// More double quote escape sequences
echo "My name is $name\nThis is in a new line";
echo "\tThis is preceded by a tab\r\n";
echo "This ends with a ...?";
echo PHP_EOL;

// There are more escape sequences but
// \n, \r and \t are the common ones

// Heredoc
$war = 'Peace';
$freedom = 'Slavery';
$ignorance = 'Strength';

echo <<<ENDOFTEXT
War is $war,
    Freedom is $freedom,
        Ignorance is $ignorance

ENDOFTEXT;

// Nowdoc (since PHP 5.3)
echo <<<'ENDOFTEXT'
War is $war,
    Freedom is $freedom,
        Ignorance is $ignorance

ENDOFTEXT;
