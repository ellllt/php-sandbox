<?php
require '/var/www/html/tdd/Dollar.php';

use PHPUnit\Framework\TestCase;
use tdd\Dollar;

class MoneyTest extends TestCase
{
     /**
     * @test
     */
    public function MoneyTest(): void
    {
        $five = new Dollar(5);
        $product = $five->times(2);
        $this->assertSame(10, $product->getAmount());
        $product = $five->times(3);
        $this->assertSame(15, $product->getAmount());
    }
}
 
