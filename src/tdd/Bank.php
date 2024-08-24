<?php

namespace tdd;


use tdd\ExpressionInterface;

class Bank
{
    public function reduce(ExpressionInterface $source, String $to): Money
    {
        return $source->reduce($to);
    }
}
