<?php

class Game
{
    const NUM_ROUNDS = 10;
    const NUM_PINS = 10;
    private const POSSIBLE_BONUS_FRAMES = 2;

    private $frames;
    private $curRound;

    public function __construct()
    {
        $maxFrames = self::NUM_ROUNDS + self::POSSIBLE_BONUS_FRAMES;
        for ($_ = 0; $_ < $maxFrames; $_++) {
            $this->frames[] = new Frame();
        }
        $this->curRound = 0;
    }

    public function roll(int $pins) : void
    {
        if ($pins < 0 || $pins > self::NUM_PINS) {
            throw new Exception("Invalid number of pins");
        } elseif (!$this->isValidRound()) {
            throw new Exception("Game already over");
        } elseif ($this->frames[$this->curRound]->roll1 === NULL) {
            $this->rollFirstBall($pins);
        } else {
            $this->rollSecondBall($pins);
        }
    }

    public function score() : int
    {
        return array_sum(array_map(function($f) {
            if ($f->score === NULL) {
                throw new Exception("Game not over yet");
            }
            return $f->score;
        },
        array_slice($this->frames, 0, 10)));
    }

    private function isStrike(Frame $f) : bool
    {
        return $f->roll1 == 10;
    }

    private function isSpare(Frame $f) : bool
    {
        return ($f->roll1 + $f->roll2 == 10) && ($f->roll1 != 10);
    }

    private function isValidRound() : bool
    {
        if ($this->curRound < self::NUM_ROUNDS) {
            return true;
        } elseif ($this->curRound == self::NUM_ROUNDS) {
            // first bonus round
            return ($this->isSpare($this->frames[self::NUM_ROUNDS-1])
                    || $this->isStrike($this->frames[self::NUM_ROUNDS-1]));
        } elseif ($this->curRound == self::NUM_ROUNDS+1) {
            // second bonus round
            return ($this->isStrike($this->frames[self::NUM_ROUNDS-1])
                    && $this->isStrike($this->frames[self::NUM_ROUNDS]));
        }
    }

    private function rollFirstBall(int $pins) : void
    {
        $curFrame = $this->frames[$this->curRound];
        $curFrame->roll1 = $pins;
        if ($this->curRound >= 2 && $this->isStrike($this->frames[$this->curRound-1]) && $this->isStrike($this->frames[$this->curRound-2])) {
            $this->frames[$this->curRound-2]->score = 2*self::NUM_PINS + $pins;
        } elseif ($this->curRound >= 1 && $this->isSpare($this->frames[$this->curRound-1])) {
            $this->frames[$this->curRound-1]->score = self::NUM_PINS + $pins;
        }
        if ($this->isStrike($curFrame)) {
            $this->curRound++;
        }
    }

    private function rollSecondBall(int $pins) : void
    {
        $curFrame = $this->frames[$this->curRound];
        $curFrame->roll2 = $pins;
        $sumOfRolls = $curFrame->roll1 + $curFrame->roll2;
        if ($sumOfRolls > self::NUM_PINS) {
            throw new Exception("Can't knock over more than " . self::NUM_PINS . " pins");
        } elseif ($sumOfRolls < self::NUM_PINS) {
            $curFrame->score = $sumOfRolls;
        }
        if ($this->curRound >= 1 && $this->isStrike($this->frames[$this->curRound-1])) {
            $this->frames[$this->curRound-1]->score = self::NUM_PINS + $sumOfRolls;
        }
        $this->curRound++;
    }
}

class Frame
{
    public function __construct()
    {
        $this->roll1 = NULL;
        $this->roll2 = NULL;
        $this->score = NULL;
    }
}
