<?php

namespace tdd;

use tdd\Money;

class Dollar extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;

    }
    public function times(int $multiplier): Money
    {
        return new self($this->amount * $multiplier);
    }
}

