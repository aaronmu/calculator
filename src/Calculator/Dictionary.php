<?php

namespace Calculator;

class Dictionary
{
    private $factories;

    public function getExpressionPart($str)
    {
        foreach ($this->factories as $factory) {
            $ep = $factory($str);
            if ($ep instanceof ExpressionPart) {
                return $ep;
            }
        }

        throw UnknownExpressionPart::fromPart($str);
    }

    public function registerTest(callable $test, callable $factory)
    {
        $this->factories[] = function($str) use ($test, $factory) {
            return $test($str)
                ? $factory($str)
                : null;
        };
    }
}