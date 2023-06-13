<?php

namespace RyanChandler\Mathexpr\Exceptions;

use Exception;
use RyanChandler\Mathexpr\Token;

final class UnexpectedTokenException extends Exception
{
    public static function make(Token $token): self
    {
        return new self(sprintf('Unexpected token %s (%s)', $token->literal, $token->type->name));
    }
}
