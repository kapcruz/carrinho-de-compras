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

    public function testSlugDoesNotAllowSpecialCharacters(){
        $product = New Product();
        $product->setName("Televisão Samsung 39' polegadas");
        $slug = $product->getSlug();
        $validSlug = preg_match('/^[a-z0-9]+(-?[a-z0-9]+)*$/i', $slug);
        $this->assertEquals(true, $validSlug);
    }
}
