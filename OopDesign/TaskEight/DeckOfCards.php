<?php

namespace OopDesign\TaskTen\TaskEight;

use Tightenco\Collect\Support\Collection;

class DeckOfCards
{
    private $cards;
    
    public function __construct(array $cards)
    {
        $this->cards = $cards;
    }


    public function getShuffled()
    {
        $collection = Collection::empty();
        for($i = 0; $i < 4; $i++) {
            $collection = $collection->merge($this->cards);
        }
        return $collection->shuffle()->all();
    }
}