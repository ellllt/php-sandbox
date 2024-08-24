<?php

namespace tdd;

use tdd\Dollar;
use tdd\Franc;

class Money
{
    protected int $amount;
    protected string $currency;

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
        return $this->amount === $money->getAmount()
            && $this->currency() === $money->currency();
    }

    public static function dollar(int $amount): Money
    {
        return new Money($amount, "USD");
    }

    public static function franc(int $amount): Money
    {
        return new Money($amount, "CRF");
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public  function times(int $multiplier): self
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }
}
