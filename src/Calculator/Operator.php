<?php

namespace Calculator;

interface Operator extends ExpressionPart
{
    public function getPrecedence();
    public function isLeftAssociative();
    public function isRightAssociative();
}