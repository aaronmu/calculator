<?php

namespace Calculator;

class Number implements ExpressionPart
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function operate(Stack $stack)
    {
        return $this->value;
    }
}