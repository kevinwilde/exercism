<?php

function encode(string $input) : string
{
    $s = '';
    $input_len = strlen($input);
    $count = 1;
    for ($i = 0; $i < $input_len; $i++) {
        if ($i+1 < $input_len && $input[$i] === $input[$i+1]) {
            $count++;
        } else {
            $s .= ($count > 1 ? $count : '') . $input[$i];
            $count = 1;
        }
    }
    return $s;
}

function decode(string $input) : string
{
    $s = '';
    $i = 0;
    while ($i < strlen($input)) {
        $j = 0;
        while (ctype_digit($input[$i+$j]))
            $j++;
        if ($j > 0) {
            $num = (int)substr($input, $i, $j);
            $s .= str_repeat($input[$i+$j], $num);
        } else {
            $s .= $input[$i];
        }
        $i += $j+1;
    }
    return $s;
}
