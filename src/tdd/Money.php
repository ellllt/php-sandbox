<?php

namespace tdd;

use tdd\Dollar;
use tdd\Franc;

Abstract class Money
{
    protected int $amount;
    abstract protected function times(int $multiplier): self;
    abstract protected function currency(): string;

    protected function getAmount(): int
    {
        return $this->amount;
    }

    public function equals(Money $money): bool
    {
        return $this->amount === $money->getAmount() && get_class($this) === get_class($money);
    }

    public static function dollar(int $amount): Dollar
    {
        return new Dollar($amount);
    }

    public static function franc(int $amount): Franc
    {
        return new Franc($amount);
    }
}
