<?php
// O(N)

$array = range(1, 1000);
shuffle($array);
var_dump(
    $key = linearSearch(777, $array),
    $array[$key]
);
var_dump(linearSearch(1001, $array));

function linearSearch(mixed $needle, array $haystack): string|null
{
    foreach ($haystack as $key => $value) {
        if ($value === $needle) {
            return $key;
        }
    }

    return null;
}
