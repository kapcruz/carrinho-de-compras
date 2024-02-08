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
        $correctPrice = 18.51;
        $total = $this->createShoppingCart()->getTotalPrice();
        self::assertEquals($correctPrice, $total);
    }

    public function testRemoveAllItems()
    {
        $shoppingCart = $this->createShoppingCart();
        $shoppingCart->removeAll();
        $totalItems = count($shoppingCart->getItems());
        $this->assertEquals(0, $totalItems);
    }

    public function testIncreaseQuantityItem()
    {
        $shoppingCart = $this->createShoppingCart();
        $code = 1234;
        $expectedTotalPrice = 24.02;
        $shoppingCart->increaseQuantityItemByCode($code);
        $totalPrice = $shoppingCart->getTotalPrice();
        $this->assertEquals($expectedTotalPrice, $totalPrice);
    }

    public function testDecreaseQuantityItem()
    {
        $shoppingCart = $this->createShoppingCart();
        $code = 1234;
        $expectedTotalPrice = 18.51;
        $shoppingCart->increaseQuantityItemByCode($code);
        $shoppingCart->decreaseQuantityItemByCode($code);
        $totalPrice = $shoppingCart->getTotalPrice();
        $this->assertEquals($expectedTotalPrice, $totalPrice);
    }

    private function createShoppingCart()
    {
        $priceProduct1 = 5.51;
        $product1 = new Product();
        $product1->setName('Produto 1');
        $product1->setImage('produto1.png');
        $product1->setPrice($priceProduct1);
        $product1->setQuantity(1);
        $product1->setCode(1234);

        $priceProduct2 = 13.00;
        $product2 = new Product();
        $product2->setName('Produto 1');
        $product2->setImage('produto2.png');
        $product2->setPrice($priceProduct2);
        $product2->setQuantity(1);
        $product2->setCode(5678);

        $shoppingCart = new ShoppingCart();
        $shoppingCart->add($product1);
        $shoppingCart->add($product2);

        return $shoppingCart;
    }
}
