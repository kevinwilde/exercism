<?php

function detectAnagrams(string $word, array $candidates) : array
{
    $anagramChecker = anagramOf(mb_strtolower($word));
    return array_values(array_filter($candidates,
        function(string $w) use ($anagramChecker) : bool {
            return $anagramChecker(mb_strtolower($w));
        }
    ));
}

function anagramOf(string $word) : closure
{
    return function(string $w) use ($word) : bool {
        return $w != $word && count_chars($w) == count_chars($word);
    };
}
