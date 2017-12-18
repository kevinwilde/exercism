<?php

function wordCount(string $input) : array
{
    $words = preg_split('/[^a-z0-9]/i', strtolower($input), -1, PREG_SPLIT_NO_EMPTY);
    return array_count_values($words);
}