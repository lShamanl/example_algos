<?php

/**
 * O(n log n)
 * @param mixed $needle
 * @param array $haystack
 * @param int $start
 * @param int|null $end
 * @param bool|null $haystackIsSorted
 * @return int|string|null
 */
function binarySearch(
    mixed $needle,
    array &$haystack,
    int   $start = 0,
    ?int  $end = null,
    ?bool $haystackIsSorted = false,
): int|string|null {
    if (count($haystack) === 0) {
        return null;
    }
    if ($haystackIsSorted) {
        $sortedHaystack = $haystack;
    } else {
        $sortedHaystack = quickSort($haystack);
    }

    if (!isset($end)) {
        $end = count($sortedHaystack) - 1;
    }
    if ($start > $end) {
        return null;
    }
    $middle = (int) (($start + $end) / 2);

    if ($needle === $sortedHaystack[$middle]) {
        return $middle;
    }
    if ($needle < $sortedHaystack[$middle]) {
        return binarySearch($needle, $sortedHaystack, $start, $middle - 1, true);
    }

    if ($needle > $sortedHaystack[$middle]) {
        return binarySearch($needle, $sortedHaystack, $middle + 1, $end, true);
    }

    return null;
}

/**
 * O(N)
 * @param mixed $needle
 * @param array $haystack
 * @param bool $strict
 * @return int|string|null
 */
function linearSearch(mixed $needle, array $haystack, bool $strict = true): int|string|null
{
    foreach ($haystack as $key => $value) {
        if ($strict) {
            if ($value === $needle) {
                return $key;
            }
            continue;
        }
        if ($value == $needle) {
            return $key;
        }
    }

    return null;
}

/**
 * O(n log n)
 * @param array $array
 * @return array
 */
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
