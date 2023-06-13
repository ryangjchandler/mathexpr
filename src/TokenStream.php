<?php

namespace RyanChandler\Mathexpr;

use Iterator;

class TokenStream implements Iterator
{
    protected int $i = 0;

    public function __construct(
        protected array $items = [],
    ) {
    }

    public function current(): Token
    {
        return $this->items[$this->i];
    }

    public function key(): mixed
    {
        return $this->i;
    }

    public function next(): void
    {
        $this->i += 1;
    }

    public function valid(): bool
    {
        return isset($this->items[$this->i]);
    }

    public function rewind(): void
    {
        $this->i = 0;
    }

    public function peek(): ?Token
    {
        return $this->items[$this->i + 1] ?? null;
    }
}
