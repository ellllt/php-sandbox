<?php

namespace tdd;

require '/var/www/html/tdd/ExpressionInterface.php';

use tdd\ExpressionInterface;

class Money implements ExpressionInterface
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

    public static function dollar(int $amount): self
    {
        return new self($amount, "USD");
    }

    public static function franc(int $amount): self
    {
        return new self($amount, "CRF");
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public  function times(int $multiplier): self
    {
        return new self($this->amount * $multiplier, $this->currency);
    }

    public  function plus(self $addend): ExpressionInterface
    {
        return new self($this->amount + $addend->getAmount(), $this->currency);
    }
}
