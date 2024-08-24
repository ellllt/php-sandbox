<?php

namespace tdd;

class Money
{
    protected int $amount;

    protected function getAmount(): int
    {
        return $this->amount;
    }

    public function equals(Money $money): bool
    {
        return $this->amount === $money->getAmount() && get_class($this) === get_class($money);
    }
}
