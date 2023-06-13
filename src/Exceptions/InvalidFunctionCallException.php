<?php

namespace RyanChandler\Mathexpr\Exceptions;

use Exception;

final class InvalidFunctionCallException extends Exception
{
    public static function make(string $function): self
    {
        return new self(sprintf('Call to invalid or unrecognised function %s', $function));
    }
}
