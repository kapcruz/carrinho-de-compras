<?php

namespace AppTest\ShoppingCart\Domain\Entities;

use PHPUnit\Framework\TestCase;
use App\Core\ShoppingCart\Domain\Entities\Product;
use App\Core\ShoppingCart\Domain\Entities\ShoppingCart;

class ShoppingCartTest extends TestCase
{
    public function testIfItemIsAdded()
    {
        $product = new Product();
        $shoppingCart = new ShoppingCart();

        $shoppingCart->add($product);
        self::assertCount(1, $shoppingCart->getItems());
    }
    
    public function testIfItemIsRemoved()
    {
        $product = new Product();
        $product->setCode('01');

        $shoppingCart = new ShoppingCart();
        
        $shoppingCart->add($product);
        $shoppingCart->remove($product->getCode());

        self::assertEmpty($shoppingCart->getItems());
    }

    public function testIfTotalPriceIsCorrect()
    {
        $priceProduct1 = 5.51;
        $product1 = new Product();
        $product1->setPrice($priceProduct1);
        
        $priceProduct2 = 13.00;
        $product2 = new Product();
        $product2->setPrice($priceProduct2);

        $correctPrice = $priceProduct1 + $priceProduct2;

        $shoppingCart = new ShoppingCart();
        $shoppingCart->add($product1);        
        $shoppingCart->add($product2);
        
        $total = $shoppingCart->getTotalPrice();
        self::assertEquals($correctPrice, $total);
    }
}
