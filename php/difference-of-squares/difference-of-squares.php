<?php

function squareOfSums(int $n) : int
{
    return array_sum(range(1, $n)) ** 2;
}

function sumOfSquares(int $n) : int
{
    return array_sum(array_map(function($e){return $e**2;}, range(1, $n)));
}

function difference(int $n) : int
{
    return squareOfSums($n) - sumOfSquares($n);
}