<?php

require_once __DIR__ . '/functions.php';

$array = range(1, 1000);
shuffle($array);
var_dump(
    $key = binarySearch(777, $array),
    $array[$key]
);
var_dump(binarySearch(1001, $array));
