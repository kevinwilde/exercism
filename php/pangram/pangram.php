<?php

function isPangram(string $input) : bool
{
    $lower_chars = str_split(strtolower($input));
    $alpha = array_fill_keys(range('a', 'z'), false);

    foreach ($lower_chars as $c)
        if (array_key_exists($c, $alpha))
            $alpha[$c] = true;

    return array_search(false, $alpha) === false;
}