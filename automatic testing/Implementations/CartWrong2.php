<?php

namespace App\Implementations;

class CartWrong2
{
    private $items = [];

    public function addItem($good, $count)
    {
        $this->items[] = ['good' => $good, 'count' => $count];
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getCount()
    {
        return count($this->items);
    }

    public function getCost()
    {
        return array_reduce($this->items, fn ($acc, $item) => $acc + $item['good']['price'] * $item['count']);
    }
}
