<?php

namespace Calculator;

interface ExpressionPart
{
    public function operate(Stack $stack);
}