<?php

namespace RyanChandler\Mathexpr;

use RyanChandler\Lexical\Lexers\RuntimeLexer;
use RyanChandler\Mathexpr\Engines\Engine;
use RyanChandler\Mathexpr\Engines\TreeWalk;

class Evaluator
{
    protected RuntimeLexer $lexer;

    protected Parser $parser;

    protected Engine $engine;

    public function __construct()
    {
        $this->lexer = Lexer::create();
        $this->parser = new Parser();
        $this->engine = new TreeWalk();
    }

    public function eval(string $expression)
    {
        $tokens = $this->lexer->tokenise($expression);

        if ($tokens === []) {
            return null;
        }

        $node = $this->parser->parse($tokens);

        return $this->engine->process($node);
    }
}
