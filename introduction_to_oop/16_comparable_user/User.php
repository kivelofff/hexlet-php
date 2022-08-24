<?php

namespace Oop\Sixteens;

/**
 * Реализуйте класс User, который создает пользователей. Конструктор класса принимает на вход два параметра: идентификатор и имя.

Реализуйте интерфейс ComparableInterface для класса User. Сравнение пользователей происходит на основе их идентификатора.

<?php



$user1 = new User(4, 'tolya');

$user2 = new User(1, 'petya');



$user1->compareTo($user2); // false
 */
class User implements ComparableInterface
{
    private $id;
    private $name;

    /**
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    public function compareTo(User $user)
    {
        return $this->id === $user->getId();
    }
}