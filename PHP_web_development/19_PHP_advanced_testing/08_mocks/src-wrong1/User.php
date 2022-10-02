<?php

namespace App\Variant;

class User implements \App\ActiveRecord
{
    private $connection;
    private $firstName;
    private $lastName;

    public function __construct(\App\DbInterface $dbconnection)
    {
        $this->connection = $dbconnection;
    }

    public function setFirstName($first)
    {
        $this->firstName = $first;
    }

    public function setLastName($last)
    {
        $this->lastName = $last;
    }

    public function save()
    {
        $sql = "insert into users ('{$this->firstName}', '{$this->lastName}')";
        $this->connection->query($sql);
    }
}

