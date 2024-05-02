<?php

namespace AppTest\ShoppingCart\Domain\Entities;

use App\Core\ShoppingCart\Domain\Entities\Product;
use InvalidArgumentException;
use TypeError;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testNameNotNull()
    {
        $product = $this->createProduct();

        $this->expectException(InvalidArgumentException::class);

        $product->setName("");
    }

    public function testNameMoreThen2Caracteres()
    {
        $product = $this->createProduct();

        $this->expectException(InvalidArgumentException::class);

        $product->setName("A");
    }

    public function testSlugDoesNotAllowSpecialCharacters(){
        $product = $this->createProduct();
        $product->setName("Televisão Samsung 39' polegadas");
        $slug = $product->getSlug();
        $validSlug = preg_match('/^[a-z0-9]+(-?[a-z0-9]+)*$/i', $slug);
        $this->assertEquals(true, $validSlug);
    }
    

    public function testNegativePriceNotAllow()
    {
        $product = $this->createProduct();

        $this->expectException(InvalidArgumentException::class);

        $price = -1.0;

        $product->setPrice($price);
    }

    public function testIfPriceIsStringNotAllow()
    {
        $product = $this->createProduct();

        $this->expectException(TypeError::class);

        $product->setPrice('Testando');
    }
    

    public function testNegativeQuantityNotAllow()
    {
        $product = $this->createProduct();

        $this->expectException(InvalidArgumentException::class);

        $quantity = -1.0;

        $product->setQuantity($quantity);
    }

    public function testIfQuantityIsStringNotAllow()
    {
        $product = $this->createProduct();

        $this->expectException(TypeError::class);

        $product->setQuantity('Testando');
    }

    public function testIfImageExtensionIsInvalid()
    {
        $product = $this->createProduct();

        $this->expectException(InvalidArgumentException::class);
        
        $product->setImage('teste.pdf');
    }

    public function testIfCodeIsEmpty()
    {
        $product = $this->createProduct();

        $this->expectException(InvalidArgumentException::class);
        
        $product->setCode('');
    }

    public function testIfCodeHasSpecialCaracter()
    {
        $product = $this->createProduct();

        $this->expectException(InvalidArgumentException::class);
        
        $product->setCode('asd123#');
    }

    private function createProduct()
    {
        return New Product('Fulano', 1.5, 'teste3.pdf', 3, 'abcd12');         
    }
}
