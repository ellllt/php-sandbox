<?php

namespace tdd;

use tdd\Money;

class franc extends Money
{
    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount, $currency);
    }
}
