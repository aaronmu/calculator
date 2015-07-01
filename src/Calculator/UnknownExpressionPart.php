<?php

namespace Calculator;

class UnknownExpressionPart extends \InvalidArgumentException
{
    public static function fromPart($part)
    {
        return new self('Unknown expression part ' . $part);
    }
}