<?php
namespace App\Implementations;

class RightValidator
{
    private $checks = [];

    public function addCheck($fn)
    {
        // функции-предикаты добавляются в массив
        $this->checks[] = $fn;
    }

    public function isValid($data)
    {
        // проходимся по каждой функции из массива
        foreach ($this->checks as $check) {
            // и проверяем на валидность данные, которые пришли в isValid
            if (!$check($data)) {
                return false;
            }
        }
        return true;
    }
}
