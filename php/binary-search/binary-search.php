<?php

function find(int $n, array $a) : int
{
    $left = 0;
    $right = count($a) - 1;
    while ($left <= $right) {
        $mid = intdiv($left + $right, 2);
        if ($a[$mid] == $n) {
            return $mid;
        } elseif ($a[$mid] < $n) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }
    return -1;
}