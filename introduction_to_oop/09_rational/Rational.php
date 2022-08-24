<?php

namespace Oop\Nine;

class Rational
{
    public $numer;
    public $denom;
    
    public function __construct($numer, $denom)
    {
        $this->numer = $numer;
        $this->denom = $denom;
    }

    public function getNumer()
    {
        return $this->numer;
    }
    
    public function getDenom()
    {
        return$this->denom;
    }
    
    public function add(Rational $rational): Rational
    {
        $newNumer = $this->numer * $rational->getDenom() + $this->denom * $rational->getNumer();
        $newDenom = $this->denom * $rational->getDenom();
        return new Rational($newNumer, $newDenom);
    }
    
    public function sub(Rational $rational): Rational
    {
        $newNumer = $this->numer * $rational->getDenom() - $this->denom * $rational->getNumer();
        $newDenom = $this->denom * $rational->getDenom();
        return new Rational($newNumer, $newDenom);
    }
}