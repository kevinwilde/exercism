<?php

function from(DateTime $date) : DateTime
{
    $date2 = clone $date;
    $date2->add(DateInterval::createFromDateString('1000000000 seconds'));
    return $date2;
}