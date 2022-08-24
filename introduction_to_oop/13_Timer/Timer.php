<?php

namespace Oop\Thirteen;

class Timer
{
    public const SEC_PER_MIN = 60;

    // BEGIN (write your solution here)
    public const SEC_PER_HOUR = 3600;
    private $secondsCount;
    
    public function __construct($secondsCount, $minutesCount = 0, $hoursCount = 0)
    {
        $this->secondsCount = 
            $secondsCount +
            $minutesCount * self::SEC_PER_MIN +
            $hoursCount * self::SEC_PER_HOUR;
    }
    // END

    public function getLeftSeconds()
    {
        return $this->secondsCount;
    }

    public function tick()
    {
        $this->secondsCount--;
    }   
}
