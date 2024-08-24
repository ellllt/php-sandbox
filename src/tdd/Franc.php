<?php

namespace tdd;

use tdd\Money;

class franc extends Money
{
    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount, $currency);
    }

    public function times(int $multiplier): Money
    {
        return Money::franc($this->amount * $multiplier, "");
    }
}
