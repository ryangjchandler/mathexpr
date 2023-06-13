<?php

namespace RyanChandler\Mathexpr\Exceptions;

use Exception;

final class InvalidVariableException extends Exception
{
    public static function make(string $variable): self
    {
        return new self(sprintf('Attempt to access invalid or undefined variable %s', $variable));
    }
}
