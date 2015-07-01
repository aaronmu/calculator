<?php

namespace Calculator\Operator;

use Calculator\Operator;
use Calculator\Stack;

class Addition implements Operator
{
    public function __toString()
    {
        return '';
    }

    public function getPrecedence()
    {
        return 2;
    }

    public function isLeftAssociative()
    {
        return true;
    }

    public function isRightAssociative()
    {
        return false;
    }

    public function operate(Stack $stack)
    {
        return $stack->pop()->operate($stack) + $stack->pop()->operate($stack);
    }
}