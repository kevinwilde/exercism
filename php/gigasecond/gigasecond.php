<?php

function from(DateTime $date) : DateTime
{
    $interval = DateInterval::createFromDateString('1000000000 seconds');
    return (clone $date)->add($interval);
}