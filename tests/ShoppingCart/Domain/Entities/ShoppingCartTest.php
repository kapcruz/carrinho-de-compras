<?php

namespace AppTest\ShoppingCart\Domain\Entities;

use PHPUnit\Framework\TestCase;
use App\Core\ShoppingCart\Domain\Entities\Product;
use App\Core\ShoppingCart\Domain\Entities\ShoppingCart;

class ShoppingCartTest extends TestCase
{
    public function testIfItemIsAdded()
    {
        $product = $this->createProduct();
        $shoppingCart = new ShoppingCart();

        $shoppingCart->add($product);
        self::assertCount(1, $shoppingCart->getItems());
    }

    public function testIfItemIsRemoved()
    {
        $product = $this->createProduct();
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
        $product1 = new Product('Produto 1', 5.51, 'produto1.png', 1, 1234);
        $product2 = new Product('Produto 2', 13.00, 'produto2.png', 1, 5678);

        $shoppingCart = new ShoppingCart();
        $shoppingCart->add($product1);
        $shoppingCart->add($product2);

        return $shoppingCart;
    }

    private function createProduct()
    {
        return New Product('Fulano', 1.5, 'teste3.pdf', 3, 'abcd12');         
    }
}
