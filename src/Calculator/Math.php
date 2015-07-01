<?php

namespace Calculator;


class Math
{
    private $tokenizer, $dictionary;

    public function __construct(Tokenizer $tokenizer, Dictionary $dictionary)
    {
        $this->tokenizer = $tokenizer;
        $this->dictionary = $dictionary;
    }

    public function expression($str)
    {
        $input = new Stack();
        $output = new Stack();

        foreach ($this->tokenizer->tokenize($str) as $token) {
            $part = Dictionary::fromString($token);

            $part->isOperator()
                ? $input->push($part)
                : $output->push($part);
        }

        while ($operator = $input->pop()) {
            $output->push($operator);
        }

        // Ran out of time, this'll only work with addition
        $op = $output->pop();
        $val = $op->operate($output);

        return $val;
    }
}