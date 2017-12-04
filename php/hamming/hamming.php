<?php

function distance(string $a, string $b) : int
{
    $len = strlen($a);
    if (strlen($b) != $len)
        throw new InvalidArgumentException('DNA strands must be of equal length.');

    $dist = 0;
    for ($i = 0; $i < $len; $i++)
        if ($a[$i] != $b[$i])
            $dist++;
    return $dist;
}
