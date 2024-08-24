<?php

namespace tdd;

use tdd\Dollar;
use tdd\Franc;

Abstract class Money
{
    protected int $amount;
    protected string $currency;
    abstract protected function times(int $multiplier): self;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

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
        return new Dollar($amount, "USD");
    }

    public static function franc(int $amount): Franc
    {
        return new Franc($amount, "CRF");
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
