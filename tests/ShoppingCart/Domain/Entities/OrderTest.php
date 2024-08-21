<?php

namespace AppTest\ShoppingCart\Domain\Entities;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\Core\ShoppingCart\Domain\Entities\Order;

class OrderTest extends TestCase
{
    public function testCodeNotNull()
    {
        $order = $this->createOrder();

        $this->expectException(InvalidArgumentException::class);
        $order->setCode("");
    }

    public function testTotalNotNull()
    {
        $order = $this->createOrder();

        $this->expectException(InvalidArgumentException::class);
        $order->setTotalPrice("");
    }

    public function testTotalNotNegative()
    {
        $order = $this->createOrder();

        $this->expectException(InvalidArgumentException::class);
        $order->setTotalPrice(-1);
    }

    private function createOrder()
    {
        $order = new Order(1);

        return $order;
    }
}
