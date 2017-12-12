<?php

function raindrops(int $n) : string
{
    $res = '';
    if ($n % 3 === 0)
        $res .= 'Pling';
    if ($n % 5 === 0)
        $res .= 'Plang';
    if ($n % 7 === 0)
        $res .= 'Plong';
    if (empty($res))
        return $n;
    return $res;
}