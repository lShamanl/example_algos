<?php

require_once __DIR__ . '/functions.php';

$array = range(1, 1000);
shuffle($array);
var_dump(
    $key = linearSearch(777, $array),
    $array[$key]
);
var_dump(linearSearch(1001, $array));
