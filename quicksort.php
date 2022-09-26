<?php
//O(n log n)

$array = range(1, 1000);
shuffle($array);
$array = quickSort($array);

function quickSort(array $array): array
{
    $length = count($array);

    if ($length <= 1){
        return $array;
    }
    $left = $right = [];

    for ($i = 1; $i < $length; $i++) {
        if ($array[$i] > $array[0]){
            $right[] = $array[$i];
        } else{
            $left[] = $array[$i];
        }
    }
    $left = quickSort($left);
    $right = quickSort($right);

    return array_merge(
        $left,
        [$array[0]],
        $right
    );
}
