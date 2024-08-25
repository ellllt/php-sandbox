<?php

namespace tdd;

use tdd\ExpressionInterface;
use tdd\Money;
use tdd\Bank;

class Sum implements ExpressionInterface
{
    protected Money $augend;
    protected Money $addend;

    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function getAugend(): Money
    {
        return $this->augend;
    }

    public function getAddend(): Money
    {
        return $this->addend;
    }

    public function reduce(Bank $bank, String $to): Money
    {
        $amount = $this->augend->getAmount() + $this->addend->getAmount();
        return new Money($amount, $to);
    }
}
