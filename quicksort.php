<?php

require_once __DIR__ . '/functions.php';

$array = range(1, 1000);
shuffle($array);
$array = quickSort($array);
