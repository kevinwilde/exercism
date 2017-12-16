<?php

class Series
{
    private $series;

    public function __construct($s)
    {
        if (is_int($s))
            $s = (string)$s;

        if (empty($s)) {
            $this->series = array();
        } elseif (ctype_digit($s)) {
            $toInt = function($e) { return (int)$e; };
            $this->series = array_map($toInt, str_split($s));
        } else {
            throw new InvalidArgumentException();
        }
    }

    public function largestProduct(int $n) : int
    {
        if ($n < 0 || $n > count($this->series))
            throw new InvalidArgumentException();

        if ($n === 0)
            return 1;

        $maxProd = 0;
        for ($i = 0; $i <= count($this->series)-$n; $i++) {
            $curProd = array_product(array_slice($this->series, $i, $n));
            $maxProd = max(array($maxProd, $curProd));
        }
        return $maxProd;
    }
}