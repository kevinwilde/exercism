<?php

class Bob
{
    public function respondTo(string $s) : string
    {
        $s = trim($s);
        if (strlen($s) === 0)
            return "Fine. Be that way!";
        elseif (strtoupper($s) === $s && preg_match("/[A-Z]/", $s))
            return "Whoa, chill out!";
        elseif (substr($s, -1) === '?')
            return "Sure.";
        return "Whatever.";
    }
}