<?php

function flatten(array $a) : array
{
    $res = [];
    array_walk_recursive($a, function($val, $key) use (&$res) {
        if ($val !== null) {
            array_push($res, $val);
        }
    });
    return $res;
}