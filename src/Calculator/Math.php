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
            $part = $this->dictionary->getExpressionPart($token);

            ($part instanceof Operator)
                ? $input->push($part)
                : $output->push($part);
        }

        while ($operator = $input->pop()) {
            $output->push($operator);
        }

        return $this->render($this->calculate($output));
    }

    private function calculate(Stack $input)
    {
        $output = new Stack();

        while(($operator = $input->pop()) && $operator instanceof Operator) {
            $output->push($operator->operate($input));
        }

        return $output;
    }

    private function render(Stack $input)
    {
        $input = clone $input;

        $str = '';
        while ($o = $input->pop()) {
            $str .= (string) $o;
        }


        return $str;
    }
}