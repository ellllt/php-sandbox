<?php

namespace tdd;

use tdd\Bank;

interface ExpressionInterface
{
    public function plus(self $addend): self;
    public function reduce(Bank $bank, string $to): Money;
}
