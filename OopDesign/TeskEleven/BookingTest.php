<?php

namespace OopDesign\TeskEleven;

use PHPUnit\Framework\TestCase;

class BookingTest extends TestCase
{
    public function testBooking()
    {
        $booking = new Booking();

        $result0 = $booking->book('10-11-2008', '05-11-2008');
        $this->assertFalse($result0);

        $result1 = $booking->book('11-11-2008', '13-11-2008');
        $this->assertTrue($result1);

        $result2 = $booking->book('12-11-2008', '12-11-2008');
        $this->assertFalse($result2);

        $result3 = $booking->book('10-11-2008', '12-11-2008');
        $this->assertFalse($result3);

        $result4 = $booking->book('12-11-2008', '14-11-2008');
        $this->assertFalse($result4);

        $result5 = $booking->book('10-11-2008', '11-11-2008');
        $this->assertTrue($result5);

        $result55 = $booking->book('12-11-2008', '13-11-2008');
        $this->assertFalse($result55);

        $result6 = $booking->book('13-11-2008', '13-11-2008');
        $this->assertFalse($result6);

        $result7 = $booking->book('13-11-2008', '14-11-2008');
        $this->assertTrue($result7);

        $result8 = $booking->book('08-11-2008', '18-11-2008');
        $this->assertFalse($result8);

        $result9 = $booking->book('08-05-2008', '18-05-2008');
        $this->assertTrue($result9);

        $result10 = $booking->book('09-05-2008', '10-05-2008');
        $this->assertFalse($result10);

        $result11 = $booking->book('08-05-2008', '20-05-2008');
        $this->assertFalse($result11);

        $result12 = $booking->book('07-05-2008', '18-05-2008');
        $this->assertFalse($result12);

        $result13 = $booking->book('08-05-2008', '18-05-2008');
        $this->assertFalse($result13);

        $result14 = $booking->book('08-05-2008', '18-11-2008');
        $this->assertFalse($result14);
    }
}
