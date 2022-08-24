<?php

require_once "../../vendor/autoload.php";

use Oop\Nine\Rational;

$rat1 = new Rational(3, 9);

var_dump($rat1->getNumer()); // 3

var_dump($rat1->getDenom()); // 9



$rat2 = new Rational(10, 3);



$rat3 = $rat1->add($rat2); // Абстракция для рационального числа 99/27

var_dump($rat3->getNumer()); // 99

var_dump($rat3->getDenom()); // 27



$rat4 = $rat1->sub($rat2); // Абстракция для рационального числа -81/27

var_dump($rat4->getNumer()); // -81

var_dump($rat4->getDenom()); // 27