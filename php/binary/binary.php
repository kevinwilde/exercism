<?php

function parse_binary(string $binary) : int
{
    $total = 0;
    foreach (array_reverse(str_split($binary)) as $i => $digit) {
        if (!in_array($digit, ['0','1']))
            throw new InvalidArgumentException("Argument must be a binary number");
        $total += $digit * 2**$i;
    }
    return $total;
}
