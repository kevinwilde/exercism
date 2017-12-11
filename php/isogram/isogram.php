<?php

function isIsogram(string $s) : bool
{
    $s = preg_split('//u', mb_strtolower($s), -1, PREG_SPLIT_NO_EMPTY);
    $s = array_filter($s, function($c) {
        return preg_match('/^\p{L}$/u', $c);
    });
    return count($s) === count(array_unique($s));
}