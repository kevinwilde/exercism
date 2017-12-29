<?php

function brackets_match(string $s) : bool
{
    return BracketMatcher::brackets_match($s);
}

class BracketMatcher
{
    private static $matches = array('(' => ')', '{' => '}', '[' => ']');

    public static function brackets_match(string $s) : bool
    {
        $stack = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (self::is_open_bracket($s[$i])) {
                array_push($stack, $s[$i]);
            } elseif (self::is_closed_bracket($s[$i])) {
                if (!(count($stack) > 0 && self::match(array_pop($stack), $s[$i]))) {
                    return false;
                }
            }
        }
        return count($stack) == 0;
    }

    private static function match(string $open, string $close) : bool
    {
        return array_key_exists($open, self::$matches) && self::$matches[$open] == $close;
    }

    private static function is_open_bracket(string $c) : bool
    {
        return in_array($c, array_keys(self::$matches));
    }

    private static function is_closed_bracket(string $c) : bool
    {
        return in_array($c, array_values(self::$matches));
    }
}