<?php

require_once "../../vendor/autoload.php";

use Oop\Thirteen\Timer;

$timer1 = new Timer(10);

var_dump($timer1->getLeftSeconds()); // 10

$timer1->tick();

var_dump($timer1->getLeftSeconds()); // 9



$timer2 = new Timer(8, 20, 8);

var_dump($timer2->getLeftSeconds()); // 30008
