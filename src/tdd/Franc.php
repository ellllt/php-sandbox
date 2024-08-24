<?php

namespace tdd;

use tdd\Money;

class franc extends Money
{
    private string $currency;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
        $this->currency = "CRF";
    }

    public function times(int $multiplier): Money
    {
        return new self($this->amount * $multiplier);
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
