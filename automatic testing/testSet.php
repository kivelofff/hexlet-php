<?php
/**
 * Напишите тесты для функции set(array $coll, array $path, $value) возвращающей ассоциативный массив, в котором она изменяет (или добавляет) значение по указанному пути. Функция изменяет переданный массив.

<?php



$coll = [

'a' => [

'b' => [

'c' => 3

]

]

];



set($coll, ['a', 'b', 'c'], 4);

print_r($coll);

//=> [

//=>     "a" => [

//=>         "b" => [

//=>             "c" => 4,

//=>         ],

//=>     ],

//=> ]



set($coll, ['x', 'y', 'z'], 5);

print_r($coll); // => 5

//=> [

//=>     "a" => [

//=>         "b" => [

//=>             "c" => 4,

//=>          ],

//=>     ],

//=>     "x" => [

//=>         "y" => [

//=>             "z" => 5,

//=>         ],

//=>     ],

//=> ]

Подсказки

Переиспользуйте объект данных
Тесты не должны зависеть друг от друга
Помните о том, что не верная реализация функции set() может возвращать массив с неправильной структурой

 */
namespace App\Tests;

use PHPUnit\Framework\TestCase;

$functionName = "wrong3";

require_once __DIR__ . "/Implementations/set.$functionName.php";

use function App\Implementations\set;

class testSet extends TestCase
{
    //BEGIN (write your solution here)
    private $coll;

    public function setUp(): void
    {
        $this->coll = [
            "lev1" => ["lev2" => ["lev3" => "val"]]
        ];
    }

    public function testAdd()
    {
        $expected = $this->coll;
        $expected["lev11"] = ["lev21" => "val2"];
        $this->assertEquals($expected, set($this->coll, ["lev11", "lev21"], "val2"));
    }

    public function testChange()
    {
        $expected = ["lev1" => ["lev2" => ["lev3" => "abra"]]];
        $this->assertEquals($expected, set($this->coll, ["lev1", "lev2", "lev3"], "abra"));
    }

    public function testEmpty()
    {
        $expected = $this->coll;
        $this->assertEquals($expected, set($this->coll, [], "something"));
    }

    public function testSimilarPath()
    {
        $expected = $this->coll;
        $expected["lev1"]["lev21"] = "val2";
        $this->assertEquals($expected, set($this->coll, ["lev1", "lev21"], "val2"));
    }
    //END
}
