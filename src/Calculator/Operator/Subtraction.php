<?php

namespace Calculator\Operator;

use Calculator\Operator;
use Calculator\Stack;

class Subtraction implements Operator
{
    public function __toString()
    {
        return '';
    }

    public function operate(Stack $stack)
    {
        $right = $stack->pop()->operate($stack);
        $left = $stack->pop()->operate($stack);

        return $left - $right;
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
}