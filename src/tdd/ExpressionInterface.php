<?php

namespace tdd;

use tdd\Bank;

interface ExpressionInterface
{
    public function reduce(Bank $bank, string $to): Money;
}
