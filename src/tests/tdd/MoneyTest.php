<?php
require '/var/www/html/tdd/Money.php';
require '/var/www/html/tdd/Dollar.php';
require '/var/www/html/tdd/Franc.php';

use PHPUnit\Framework\TestCase;
use tdd\Dollar;
use tdd\Franc;
use tdd\Money;

class MoneyTest extends TestCase
{
    public function testMultiplication(): void
    {
        $five = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquality(): void
    {
        $five = Money::dollar(5);
        $this->assertTrue($five->equals(Money::dollar(5)));
        $this->assertFalse($five->equals(Money::dollar(6)));
        $five = Money::Franc(5);
        $this->assertTrue($five->equals(Money::Franc(5)));
        $this->assertFalse($five->equals(Money::Franc(6)));
        $this->assertFalse($five->equals(Money::dollar(5)));
    }

    public function testFrancMultiplication(): void
    {
        $five = Money::Franc(5);
        $this->assertEquals(Money::Franc(10), $five->times(2));
        $this->assertEquals(Money::Franc(15), $five->times(3));
    }

    public function testCurrency(): void
    {
        $this->assertEquals("USD", Money::dollar(1)->currency());
        $this->assertEquals("CRF", Money::franc(1)->currency());
    }
}
 
