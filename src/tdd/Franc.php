<?php

namespace tdd;

class Franc {

    private int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;

    }
    public function times(int $multiplier): self
    {
        return new self($this->amount * $multiplier);
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function equals(Franc $franc): bool
    {
        return $this->amount === $franc->getAmount();
    }
}
