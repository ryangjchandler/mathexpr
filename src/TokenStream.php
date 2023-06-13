<?php

namespace RyanChandler\Mathexpr;

use Iterator;
use RyanChandler\Mathexpr\Exceptions\ExpectedTokenException;

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

    public function is(TokenType $type): bool
    {
        return $this->current()->type === $type;
    }

    public function expect(TokenType $type): void
    {
        if (! $this->valid() || $this->current()->type !== $type) {
            throw ExpectedTokenException::make($type, $this->valid() ? $this->current()->type : null);
        }
    }
}
