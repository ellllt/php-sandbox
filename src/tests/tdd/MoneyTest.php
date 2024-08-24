<?php
require '/var/www/html/tdd/Money.php';
require '/var/www/html/tdd/Bank.php';

use PHPUnit\Framework\TestCase;
use tdd\Money;
use tdd\Bank;

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
        $this->assertFalse($five->equals(Money::dollar(5)));
    }

    public function testCurrency(): void
    {
        $this->assertEquals("USD", Money::dollar(1)->currency());
        $this->assertEquals("CRF", Money::franc(1)->currency());
    }

    public function testSimpleAddition(): void
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(10), $reduced);
    }
}
 
