<?php

require_once "../../vendor/autoload.php";

use Oop\Eleven\User;

$user = new User('Ivan');

$address = new User\Address('Russia', 'Moscow', 'Lenina');

$user->addAddress($address);



$user2 = new User('Mila');

$user2->addAddress($address);



// Изменение происходит сразу у обоих пользователей

// Такое поведение неожиданно и ломает систему

$address->setCountry('USA');

var_dump($user->getAddresses());
var_dump($user2->getAddresses());