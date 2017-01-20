<?php

/*
 * funkcia na generovanie timestamp-u
 */

function _date($format = "r", $timestamp = false, $timezone = false) {
    // first line of PHP
    $defaultTimeZone = 'UTC';
    if (date_default_timezone_get() != $defaultTimeZone)
        date_default_timezone_set($defaultTimeZone);

    $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime(($timestamp != false ? date("r", (int) $timestamp) : date("r")), $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    return date($format, ($timestamp != false ? (int) $timestamp : $myDateTime->format('U')) + $offset);
}

function actual_stamp() {
    return _date("Ymd-His", false, 'Europe/Bratislava');
}
