<?php

namespace tdd;

require '/var/www/html/tdd/ExpressionInterface.php';
require '/var/www/html/tdd/Sum.php';

use tdd\ExpressionInterface;
use tdd\Sum;

class Money implements ExpressionInterface
{
    protected int $amount;
    protected string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function equals(Money $money): bool
    {
        return $this->amount === $money->getAmount()
            && $this->currency === $money->getCurrency();
    }

    public static function dollar(int $amount): self
    {
        return new self($amount, "USD");
    }

    public static function franc(int $amount): self
    {
        return new self($amount, "CHF");
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public  function times(int $multiplier): self
    {
        return new self($this->amount * $multiplier, $this->currency);
    }

    public  function plus(self $addend): ExpressionInterface
    {
        return new Sum($this, $addend);
    }

    public function reduce(String $to): Money
    {
        return $this;
    }
}
