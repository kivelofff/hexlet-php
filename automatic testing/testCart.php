<?php
/**
 * Напишите тесты для корзины интернет-магазина. Интерфейс:

addItem($good, $count) – добавляет в корзину товары и их количество. Товар – это ассоциативный массив с двумя ключами: name (имя) и price (стоимость).
getItems() – возвращает список товаров в формате [[ good, count ], [good, count ], ...].
getCost() – возвращает стоимость корзины. Стоимость корзины высчитывается как сумма всех добавленных товаров с учётом их количества.
getCount() – возвращает количество товаров в корзине.

$cart = new Cart();

$cart->addItem(['name' => 'car', 'price' => 100], 3);

$cart->addItem(['name' => 'tv', 'price' => 10], 5);

count($cart->getItems()) // 2

$cart->getCount() // 8

$cart->getCost() // 350
 */
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Implementations\Cart as Cart;

class testCart extends TestCase
{
    public function testCart(): void
    {
        // BEGIN (write your solution here)
        $cart = new Cart();
        $cart->addItem(['name' => 'vodka', 'price' => 200], 10);
        $cart->addItem(['good' => 'zakuska', 'price' => 100], 1);
        $this->assertEquals([['good' => ['name' => 'vodka', 'price' => 200], 'count' => 10],
            ['good' => ['good' => 'zakuska', 'price' => 100], 'count' => 1]], $cart->getItems());
        $this->assertEquals(11, $cart->getCount());
        $this->assertEquals(2100, $cart->getCost());
        // END
    }
}