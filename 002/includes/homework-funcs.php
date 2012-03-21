<?php

function get_month_days($monthNum)
{
    static $monthDays = array(2 => 28, 4 => 30, 6 => 30, 9 => 30, 11 => 30);

    if (isset($monthDays[$monthNum])) {
        return $monthDays[$monthNum];
    } else {
        return 31;
    }
}

function print_month_calendar($monthId)
{
    global $holidays;
    static $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    $html  = '<table class="month">';
    $html .= '<tr class="day-titles">';
    foreach($days as $weekday) {
        $html .= "<th>$weekday</th>";
    }
    $html .= '</tr>';

    $daysInMonth = get_month_days($monthId);
    $html .= '<tr>';
    for ($i = 1; $i <= $daysInMonth; $i++) {
        if (isset($holidays[$monthId]) && isset($holidays[$monthId][$i])) {
            $class = 'holiday';
            $holiday = '<span>' . $holidays[$monthId][$i] . '</span>';
        } else {
            $class = '';
            $holiday = '';
        }

        $html .= "<td class=\"$class\">$i $holiday</td>";

        if ($i % 7 == 0) {
            $html .= '</tr><tr>';
        }
    }

    // Fill out missing days in table
    if ($daysInMonth % 7) {
        $html .= '<td class="blank" colspan="' . (7 - $daysInMonth % 7) . '">&nbsp;</td></tr>';
    }

    $html .= "</table>";

    echo $html;
}