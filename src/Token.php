<?php

namespace RyanChandler\Mathexpr;

final class Token
{
    public function __construct(
        public readonly TokenType $type,
        public readonly string $literal,
    ) {}
}
