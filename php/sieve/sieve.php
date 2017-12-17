<?php

function sieve(int $n) : array
{
    if ($n < 2)
        return [];

    $primes = range(2, $n);
    $i = 0;
    while ($i < count($primes)) {
        $j = $i+1;
        while ($j < count($primes)) {
            if ($primes[$j] % $primes[$i] == 0)
                array_splice($primes, $j, 1);
            else
                $j++;
        }
        $i++;
    }

    return $primes;
}