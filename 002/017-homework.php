<?php

/**
 * Your homework:
 *
 * - Write a new calendar program: one that prints out 12 monthly calendars
 *   (one per month)
 * - Ensure correct number of days on each month (assume 28 days in February)
 * - Above each calendar print out the month name (not number!)
 * - For now assume all months start on Sunday
 * - The first row on each calendar must contain day titles (each weekday is
 *   a column)
 * - Day cells must contain the day number (1 – 31)
 * - Assume a global array named $holidays is provided (see example below),
 *   containing holidays by month number (1..12) and day number (1..31)
 * - Make sure holidays have a special colored background, and that the holiday
 *   name appears on the table cell
 * - Define and use at least two functions
 * - Separate functions into a separate file included from the main file
 *   generating the HTML
 * - You should be able to perform this task by looking at the previous week's
 *   homework and using the material covered today in class.
 */

$holidays = array(
    2 => array(
        2 => 'Groundhog Day'
    ),

    3 => array(
        14 => 'Pi Day'
    ),

    5 => array(
        1  => 'Labour Day',
        6  => 'No Pants Day',
        25 => 'Towel Day'
    ),

    9 => array(
        19 => 'International Talk like a Pirate Day'
    ),

    10 => array(

    ),

    11 => array(
        19 => 'International Men\'s Day'
    ),

    12 => array(
        5  => 'Ninja Day',
        23 => 'Festivus'
    )
);

$months = array(
    1 => 'January', 'February', 'March', 'April', 'May', 'June',
         'July', 'August', 'September', 'October', 'November', 'December'
);

require_once 'includes/homework-funcs.php';

?>
<!DOCTYPE HTML>
<html>
<head>
    <style type="text/css">
        table { width: 600px; border: 1px solid black; border-collapse: collapse; }
        table td.holiday { background-color: #ccc; }
        table td { padding: 3px; border: 1px solid black; vertical-align: top; }
        table td span { display: block; padding: 5px; }

    </style>
</head>
<body>
<?php

foreach($months as $month => $monthName) {
    echo "<h1>$monthName</h1>";
    print_month_calendar($month);
}

?>
</body>
</html>