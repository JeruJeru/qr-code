<?php

// show all errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

date_default_timezone_set('Europe/Bratislava');

//require_once '_inc/vendor/autoload.php';

// global functions
require_once 'functions-generating.php';