<?php
require '/var/www/html/tdd/Money.php';
require '/var/www/html/tdd/Bank.php';

use PHPUnit\Framework\TestCase;
use tdd\Money;
use tdd\Bank;
use tdd\Sum;

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
        $five = Money::franc(5);
        $this->assertFalse($five->equals(Money::dollar(5)));
    }

    public function testCurrency(): void
    {
        $this->assertEquals("USD", Money::dollar(1)->getCurrency());
        $this->assertEquals("CHF", Money::franc(1)->getCurrency());
    }

    public function testSimpleAddition(): void
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(10), $reduced);
    }

    public function testPlusReturnSum(): void
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $this->assertEquals($five, $sum->getAugend());
    }

    public function testReduceSum(): void
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(7), $result);
    }

    public function testReduceMoney(): void
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), "USD");
        $this->assertEquals(Money::dollar(1), $result);
    }

    public function testReduceMoneyDifferentCurrency(): void
    {
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce(Money::franc(2), "USD");
        $this->assertEquals(Money::dollar(1), $result);
    }

    public function testIdentityRate(): void
    {
        $bank = new Bank();
        $this->assertEquals(1, $bank->rate("USD", "USD"));
    }

    public function testMixedAddition(): void
    {
        $five_bucks = Money::dollar(5);
        $ten_francs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce($five_bucks->plus($ten_francs), "USD");
        $this->assertEquals(Money::dollar(10), $result);
    }
}
