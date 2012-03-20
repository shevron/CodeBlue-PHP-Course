<?php

/**
 * Print out an HTML Weekly Calendar
 *
 * This script prints out an HTML page that can be used as a weekly calendar.
 * It demonstrates some of the basic building blocks of PHP: variables,
 * operators, arrays, loops and more.
 */

// Array of weekdays. 'TRUE' value means it's a working day
$weekDays = array('Sunday', 'Monday', 'Tuesday', 'Wednesday',
                  'Thursday', 'Friday', 'Saturday');

// When does the day start and end?
$dayStarts = 10;
$dayEnds   = 20;

// What appointments do I have during the week?
$appointments = array(
    'Monday' => array(
        12 => 'Lunch with Barak',
        17 => 'Meet secret campaign donors'
    ),

    'Tuesday' => array(
        19 => 'Cabinet Meeting: Decide about Iran strike',
    ),

    'Thursday' => array(
        13 => 'Fly home; buy Sara perfume in the Duty Free'
    )
);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Your Weekly Schedule</title>
        <link rel="stylesheet" type="text/css" href="assets/calendar.css" />
    </head>
    <body>
        <h1>Your Weekly Schedule</h1>
        <table id="schedule">
            <tr class="table-head">
                <th>&nbsp;</th>
<?php foreach($weekDays as $day) { ?>
                <th class="day-title">
                    <?php echo $day ?>
                </th>
<?php } ?>
            </tr>
<?php for($hour = $dayStarts; $hour <= $dayEnds; $hour++) {?>
            <tr<?php if ($hour % 2) echo ' class="odd-row"'; ?>>
                <th class="hour-title"><?php printf("%02d:00", $hour); ?></th>
<?php

$hourSchedule = build_schedule_row($hour, $appointments);
foreach($hourSchedule as $dayId => $data) {
    if ($data) {
        $class = "has-appointment";
        $data = htmlspecialchars($data);
    } else {
        $class = "no-appointments";
        $data = '&nbsp;';
    }

    if ($dayId >= 5) $class .=" weekend";

    echo "<td class=\"$class\">$data</td>";
}

?>
            </tr>
<?php } ?>
        </table>
    </body>
</html>

<?php

/**
 * Functions go here
 */

/**
 * This function builds an array descibing the schedule for a specific hour
 * throughout the week
 *
 * @param  string $day
 * @param  string $weekDays
 * @param  array  $appointments
 * @return array
 */
function build_schedule_row($hour, $appointments)
{
    global $weekDays;

    $schedule = array();
    foreach($weekDays as $day) {
        if (isset($appointments[$day]) && isset($appointments[$day][$hour])) {
            $schedule[] = $appointments[$day][$hour];
        } else {
            $schedule[] = null;
        }
    }

    return $schedule;
}
