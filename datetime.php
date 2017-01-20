<?php

// first line of PHP
$defaultTimeZone = 'UTC';
if (date_default_timezone_get() != $defaultTimeZone) date_default_timezone_set($defaultTimeZone);

// somewhere in the code
function _date($format = "r", $timestamp = false, $timezone = false) {
    $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime(($timestamp != false ? date("r", (int) $timestamp) : date("r")), $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    return date($format, ($timestamp != false ? (int) $timestamp : $myDateTime->format('U')) + $offset);
}

function actual_stamp() {
    return _date("d.m.Y | G:i:s", false, 'Europe/Bratislava');
}

echo 'Bratislava Date/Time: ' . _date("d.m.Y | G:i:s", false, 'Europe/Bratislava') . '<br>';

echo '<pre>';
print_r(actual_stamp());
echo '</pre>';
?>