<?php

namespace AppTest\ShoppingCart\Domain\Entities;

use App\Core\ShoppingCart\Domain\Entities\Product;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testNameNotNull()
    {
        $product = New Product();

        $this->expectException(InvalidArgumentException::class);

        $product->setName("");
    }

    public function testNameMoreThen2Caracteres()
    {
        $product = New Product();

        $this->expectException(InvalidArgumentException::class);

        $product->setName("A");
    }

}
