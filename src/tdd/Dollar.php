<?php

namespace tdd;

class Dollar {

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
}
