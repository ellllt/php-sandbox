<?php

namespace tdd;

use tdd\ExpressionInterface;
use tdd\Money;
use tdd\Bank;

class Sum implements ExpressionInterface
{
    protected ExpressionInterface $augend;
    protected ExpressionInterface $addend;

    public function __construct(ExpressionInterface $augend, ExpressionInterface $addend)
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

    public function times(int $multiplier): ExpressionInterface
    {
        return new self($this->augend->times($multiplier), $this->addend->times($multiplier));
    }

    public function plus(ExpressionInterface $addend): ExpressionInterface
    {
        return new self($this, $addend);
    }

    public function reduce(Bank $bank, String $to): Money
    {
        $amount = $this->augend->reduce($bank, $to)->getAmount() + $this->addend->reduce($bank, $to)->getAmount();
        return new Money($amount, $to);
    }
}
