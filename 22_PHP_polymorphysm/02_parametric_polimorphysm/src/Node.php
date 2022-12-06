<?php

namespace Polymorphysm\ParamPolymorphysm\Src;

class Node
{
    public function __construct($value, Node $node = null)
    {
        $this->next = $node;
        $this->value = $value;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function getValue()
    {
        return $this->value;
    }
}

