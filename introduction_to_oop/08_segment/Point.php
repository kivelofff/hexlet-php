<?php

namespace Oop\Eight;

class Point
{
    public $x;
    public $y;

    /**
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }


}