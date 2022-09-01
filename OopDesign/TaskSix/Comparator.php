<?php

namespace OopDesign\TaskTen\TaskSix;

use Ds\Stack;

class Comparator
{
    public function compare($seq1, $seq2)
    {
        $stack1 = new Stack();
        $stack2 = new Stack();
        
        for ($i = 0; $i < strlen($seq1); $i++) {
            $curr = $seq1[$i];
            if ($curr === '#') {
                if (!$stack1->isEmpty()) {
                    $stack1->pop();
                }
            } else {
                $stack1->push($curr);
            }
        }

        for ($i = 0; $i < strlen($seq2); $i++) {
            $curr = $seq2[$i];
            if ($curr === '#') {
                if (!$stack2->isEmpty()) {
                    $stack2->pop();
                }
            } else {
                $stack2->push($curr);
            }
        }
        
        return $stack1->toArray() === $stack2->toArray();
    }
}