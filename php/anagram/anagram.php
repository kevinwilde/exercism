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
    $word_char_count = count_chars($word);
    return function(string $w) use ($word, $word_char_count) : bool {
        return $w != $word && count_chars($w) == $word_char_count;
    };
}
