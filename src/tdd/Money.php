<?php

namespace tdd;

class Money
{
    protected int $amount;

    protected function getAmount(): int
    {
        return $this->amount;
    }

    public function equals(Money $Money): bool
    {
        return $this->amount === $Money->getAmount();
    }
}
