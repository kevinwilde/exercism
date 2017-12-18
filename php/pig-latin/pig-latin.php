<?php

function translate(string $input): string {
    $words = explode(' ', $input);
    $translated_words = array_map(function($w) {return translate_word($w);}, $words);
    return implode(' ', $translated_words);
}

function translate_word(string $word): string {
    if (consonant_sound(substr($word, 0, 3)))
        return substr($word, 3) . substr($word, 0, 3) . 'ay';
    elseif (consonant_sound(substr($word, 0, 2)))
        return substr($word, 2) . substr($word, 0, 2) . 'ay';
    elseif (x_or_y_then_consonant($word))
        return $word . 'ay';
    elseif (is_vowel($word[0]))
        return $word . 'ay';
    else
        return substr($word, 1) . $word[0] . 'ay';
}

function consonant_sound(string $s): bool {
    return in_array($s, ['bl', 'br', 'ch', 'cl', 'cr', 'dr', 'gl', 'gr', 'pl',
        'pr', 'qu', 'sc', 'sch', 'sl', 'squ', 'st', 'str', 'th', 'thr']);
}

function is_vowel(string $c): bool {
    return in_array($c, ['a', 'e', 'i', 'o', 'u']);
}

function x_or_y_then_consonant(string $word): bool {
    return strlen($word) > 1 && in_array($word[0], ['x', 'y']) && !is_vowel($word[1]);
}