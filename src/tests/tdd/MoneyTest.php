<?php
require '/var/www/html/tdd/Dollar.php';

use PHPUnit\Framework\TestCase;
use tdd\Dollar;

class MoneyTest extends TestCase
{
    public function testMoney(): void
    {
        $five = new Dollar(5);
        $this->assertEquals(new Dollar(10), $five->times(2));
        $this->assertEquals(new Dollar(15), $five->times(3));
    }

    public function testEquality(): void
    {
        $five = new Dollar(5);
        $this->assertTrue($five->equals(new Dollar(5)));
        $this->assertFalse($five->equals(new Dollar(6)));
    }
}
 
