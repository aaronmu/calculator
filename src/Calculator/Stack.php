<?php

namespace Calculator;

class Stack
{
    protected $elements = [];

    public function push($element)
    {
        $this->elements[] = $element;
    }

    public function pop()
    {
        return array_pop($this->elements);
    }

    public function poke()
    {
        return end($this->elements);
    }

}