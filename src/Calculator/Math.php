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
        $operators = new Stack();
        $output = new Stack();

        foreach ($this->tokenizer->tokenize($str) as $token) {
            $o1 = $this->dictionary->getExpressionPart($token);

            if ($o1 instanceof Operator) {
                if (($o2 = $operators->poke()) && $o2 instanceof Operator) {
                    if(
                        ($o1->isLeftAssociative() && $o1->getPrecedence() <= $o2->getPrecedence()) ||
                        ($o1->isRightAssociative() && $o1->getPrecedence() < $o2)
                    ) {
                        $output->push($operators->pop());
                    }
                }
                $operators->push($o1);
            } else {
                $output->push($o1);
            }
        }

        while ($operator = $operators->pop()) {
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