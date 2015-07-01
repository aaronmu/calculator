<?php

namespace Calculator;

interface ExpressionPart
{
    public function __toString();
    public function operate(Stack $stack);
}