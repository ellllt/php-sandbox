<?php

namespace tdd;

class Pair
{
    private string $from;
    private string $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function equals(object $object): bool
    {
        return $this->from === $object->getFrom() && $this->to === $object->getTo();
    }

    public function hashCode(): int
    {
        return 0;
    }

    public function __toString(): string
    {
        return $this->from . '-' . $this->to;
    }
}
