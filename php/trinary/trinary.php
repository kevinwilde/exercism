<?php

function toDecimal(string $triNum) : int
{
    $total = 0;
    foreach (array_reverse(str_split($triNum)) as $i => $digit) {
        if (!in_array($digit, [0,1,2]))
            return 0;
        $total += $digit * 3**$i;
    }
    return $total;
}
