<?php

namespace OopDesign\TeskEleven;

use Carbon\Carbon;

class Booking
{
/*    private array $bookings = [];
    
    public function book(string $from, string $to) {
        $fromTime = Carbon::createFromFormat("d-m-Y", $from);
        $toTime = Carbon::createFromFormat("d-m-Y", $to);
        if ($fromTime->gte($toTime)) {
            return false;
        }
        $matches = count(array_filter(
            $this->bookings,
            fn($e) => $this->isBetween($fromTime, $e['from'], $e['to'])
                || $this->isBetween($toTime, $e['from'], $e['to'])
                || ($fromTime->lte($e["from"]) && $toTime->gte($e["to"]))
        ));
        if ($matches === 0) {
            $this->bookings[] = [
                "from" => $fromTime,
                "to" => $toTime
            ];
            return true;
        }
        return false;
    }
    
    private function isBetween(Carbon $date, Carbon $low, Carbon $high)
    {
        return $date->gt($low) && $date->lt($high);
    }*/

    private $dates = [];

    public function book($begin, $end)
    {
        $carbonNewBegin = new Carbon($begin);
        $carbonNewEnd = new Carbon($end);
        if ($this->canBook($carbonNewBegin, $carbonNewEnd)) {
            $this->dates[] = [$carbonNewBegin, $carbonNewEnd];
            return true;
        }

        return false;
    }

    public function canBook($begin, $end)
    {
        if ($begin >= $end) {
            return false;
        }

        foreach ($this->dates as [$bookedBegin, $bookedEnd]) {
            $isIntersected = $begin < $bookedEnd && $end > $bookedBegin;
            if ($isIntersected) {
                return false;
            }
        }
        return true;
    }
}