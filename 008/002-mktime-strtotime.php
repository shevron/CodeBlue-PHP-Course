<?php

// Create the timestamp of June 25th at 11:30am this year
$hour = 11;
$minute = 30;
$seconds = 0;
$month = 6;
$day = 25;

var_dump(mktime($hour, $minute, $seconds,
                $month, $day));

// The same, using strtotime
var_dump(strtotime("June 25th 11:30am"));

// More strtotime examples
var_dump(strtotime("last Friday"));
var_dump(strtotime("+25 minutes"));
var_dump(strtotime("-3 months"));
var_dump(strtotime("first day of October 1985 noon"));