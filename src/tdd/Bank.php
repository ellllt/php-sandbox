<?php

namespace tdd;
require '/var/www/html/tdd/Pair.php';

use tdd\ExpressionInterface;
use tdd\Pair;

class Bank
{
    private array $rates = [];

    public function reduce(ExpressionInterface $source, string $to): Money
    {
        return $source->reduce($this, $to);
    }

    public function addRate(string $from, string $to, int $rate): void
    {
        $this->rates[(string) new Pair($from, $to)] = $rate;
    }

    public function rate(string $from, string $to): int
    {
        if ($from === $to) {
            return 1;
        }

        return $this->rates[(string) new Pair($from, $to)];
    }
}
