<?php

namespace tdd;

interface ExpressionInterface
{
    public function reduce(String $to): Money;
}
