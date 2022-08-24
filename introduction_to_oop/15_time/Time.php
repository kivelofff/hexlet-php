<?php

namespace Oop\Fifteenth;

/**
 * Класс Time предназначен для создания объекта-времени. Его конструктор принимает на вход количество часов и минут в виде двух отдельных параметров.

<?php



$time = new Time(10, 15);

echo $time; // => 10:15

src/Time.php

Добавьте в класс Time статический метод fromString, который позволяет создавать инстансы Time на основе времени переданного строкой формата часы:минуты.

<?php



$time = Time::fromString('10:23');

$this->assertEquals('10:23', $time); // автоматически вызывается __toString

Подсказки

Вам может понадобится функция explode()

 */

class Time
{
    private $h;
    private $m;

    // BEGIN (write your solution here)
    public static function fromString(string $time)
    {
        $timeArray = explode(":", $time);
        return new self($timeArray[0], $timeArray[1]);
    }
    // END

    public function __construct($h, $m)
    {
        $this->h = $h;
        $this->m = $m;
    }

    public function __toString()
    {
        return "{$this->h}:{$this->m}";
    }
}
