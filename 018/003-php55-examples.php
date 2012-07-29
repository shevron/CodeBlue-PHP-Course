<?php

/**
 * These do not really work...
 *
 * Examples taken from http://nikic.github.com/2012/07/10/What-PHP-5-5-might-look-like.html
 */


/**
 * array_column
 */

// Instead of doing this:
$userNames = array();
foreach ($users as $user) {
    $userNames[] = $user['name'];
}

// You can do this:
$userNames = array_column($users, 'name');

/**
 * Constant Dereferencing
 */

function randomHexString($length) {
    $str = '';
    for ($i = 0; $i < $length; ++$i) {
        $str .= "0123456789abcdef"[rand(0, 15)]; // direct dereference of string
    }
}

function randomBool() {
    return [false, true][rand(0, 1)]; // direct dereference of array
}

/**
 * Fully Qualified Class Names
 */
use Zend\Http\Transport\SocketTransport;

// does not work, because this will try to use the global SocketTransport class
$reflection = new ReflectionClass('SocketTransport');

// this works because FooBar::class is resolved to 'Zend\Http\Transport\SocketTransport'
$reflection = new ReflectionClass(SocketTransport::class);


/**
 * Scalar Type Hinting
 */
function factorial(int $number) {
    // ...
}

// Will work
factorial(8);
factorial("8");
factorial(8.0);

// Will not work
factorial("Shmone");
factorial([1, 2]);
factorial(true);


/**
 * Getters & Setters
 */

class TimePeriod
{
    private $seconds;

    public $hours {
        get { return $this->seconds / 3600; }
        set { $this->seconds = $value * 3600; }
    }
}

$time = new TimePeriod();
$time->hours = 4;
var_dump($time->hours);

/**
 * Generators
 */

// Remember the FileLines iterator?
function *file_lines($file)
{
    $fp = fopen($file, 'r');
    while (! feof($fp)) {
        yield fgets($fp);
    }
    fclose($fp);
}

foreach (file_lines(__FILE__) as $line) {
    // ...
}
