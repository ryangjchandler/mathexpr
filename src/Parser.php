<?php

namespace RyanChandler\Mathexpr;

use RyanChandler\Mathexpr\Exceptions\UnexpectedEndOfExpressionException;
use RyanChandler\Mathexpr\Exceptions\UnexpectedTokenException;

final class Parser
{
    protected TokenStream $tokens;

    public function parse(array $tokens): array
    {
        $this->tokens = new TokenStream($tokens);

        return $this->node();
    }

    private function node(Precedence $precedence = Precedence::Lowest): array
    {
        $token = $this->tokens->current();

        if ($token->type === TokenType::Integer) {
            $this->tokens->next();

            $lhs = [NodeType::Integer, intval($token->literal, 0)];
        } elseif ($token->type === TokenType::Float) {
            $this->tokens->next();

            $lhs = [NodeType::Float, floatval($token->literal)];
        } elseif ($token->type === TokenType::LeftParen) {
            $this->tokens->next();

            $lhs = $this->node();

            $this->tokens->expect(TokenType::RightParen);
        } else {
            throw UnexpectedTokenException::make($token);
        }

        if (! $this->tokens->valid()) {
            return $lhs;
        }

        while (true) {
            if (! $this->tokens->valid()) {
                break;
            }

            $op = $this->tokens->current();

            if ($op->type->isInfix()) {
                $this->tokens->next();

                $rpred = Precedence::forTokenType($op->type);

                if ($rpred->lt($precedence)) {
                    break;
                }

                $this->assertNotEndOfExpression();

                $rhs = $this->node($rpred);
                $lhs = [NodeType::fromTokenType($op->type), $lhs, $rhs];

                continue;
            }

            break;
        }

        return $lhs;
    }

    protected function assertNotEndOfExpression(): void
    {
        if (! $this->tokens->valid()) {
            throw UnexpectedEndOfExpressionException::make();
        }
    }
}
