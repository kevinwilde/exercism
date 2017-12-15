<?php

class Series
{
    private $series;

    public function __construct($s)
    {
        if (is_int($s))
            $s = (string)$s;

        if (!empty($s) && !ctype_digit($s))
            throw new InvalidArgumentException();

        $this->series = $s;
    }

    public function largestProduct(int $n) : int
    {
        if ($n < 0 || $n > strlen($this->series))
            throw new InvalidArgumentException();

        if ($n === 0)
            return 1;

        $toInt = function($e) { return (int)$e; };
        $nums = array_map($toInt, str_split($this->series));
        $maxProd = 0;
        for ($i = 0; $i <= strlen($this->series)-$n; $i++) {
            $curProd = array_product(array_slice($nums, $i, $n));
            $maxProd = max(array($maxProd, $curProd));
        }
        return $maxProd;
    }
}