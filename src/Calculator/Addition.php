<?php

namespace Calculator;

class Addition implements Operator
{
    public function operate(Stack $stack)
    {
        return $stack->pop()->operate($stack) + $stack->pop()->operate($stack);
    }
}