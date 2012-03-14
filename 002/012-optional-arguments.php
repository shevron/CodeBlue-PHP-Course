<?php

/**
 * Defining and calling functions with optional arguments
 */

function print_line($output, $suffix = PHP_EOL, $prefix = '')
{
    echo $prefix . $output . $suffix;
}

// Will print "Hello<br />"
print_line("Hello", "<br />");

// Will print "Hello\n"
print_line("Hello");

// Will print "<li>Hello</li>"
print_line("Hello", "</li>", "<li>");