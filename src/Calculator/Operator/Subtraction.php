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
}