<?php

// Using DateTime objects
$now = new DateTime();
echo $now->format("Y-m-d H:i:s");

$nextWeek = new DateTime("+1 week");

// Or better:
$nextWeek = new DateTime();
$nextWeek->add(new DateInterval("P1W"));

// Accurately create DateTime object from string
$yearStart = DateTime::createFromFormat("Y-m-d H:i:s",
    "2012-01-01 00:00:00");

