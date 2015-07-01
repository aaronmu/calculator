<?php

namespace Calculator;

class Addition implements ExpressionPart
{
    public function operate(Stack $stack)
    {
        return $stack->pop()->operate($stack) + $stack->pop()->operate($stack);
    }

    public function isOperator()
    {
        return true;
    }
}