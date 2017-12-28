<?php

class Clock
{
    private $hours;
    private $mins;

    public function __construct(int $hours = 0, int $mins = 0)
    {
        $this->hours = ($hours + floor($mins / 60)) % 24;
        if ($this->hours < 0)
            $this->hours += 24;

        $this->mins = $mins % 60;
        if ($mins < 0)
            $this->mins += 60;
    }

    public function __toString() : string
    {
        return sprintf("%02d:%02d", $this->hours, $this->mins);
    }

    public function add(int $mins) : Clock
    {
        return new Clock($this->hours, $this->mins + $mins);
    }

    public function sub(int $mins) : Clock
    {
        return $this->add(-$mins);
    }
}