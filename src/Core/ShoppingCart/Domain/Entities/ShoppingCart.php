<?php

namespace App\Core\ShoppingCart\Domain\Entities;

use stdClass;

class ShoppingCart
{
    private array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add(Product $product)
    {
        $this->items[] = $product;
    }

    public function remove(string $code)
    {
        $this->items = array_filter($this->items, function ($item) use ($code) {
            return $item->getCode() != $code;
        });
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getItem($code)
    {
        $items = $this->getItems();
        
        foreach ($items as $item) {
            if ($item->getCode() == $code) {
                return $item;
            }
        }
        return false;
    }

    public function getTotalPrice()
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getPrice() * $item->getQuantity();
        }

        return round($total, 2);
    }

    public function removeAll()
    {
        $this->items = [];
    }

    public function increaseQuantityItemByCode($code)
    {
        $item = $this->getItem($code);
        $currentQuantity = $item->getQuantity();
        $this->remove($code);
        $item->setQuantity($currentQuantity+1);
        $this->add($item);
    }

    public function decreaseQuantityItemByCode($code)
    {
        $item = $this->getItem($code);
        $currentQuantity = $item->getQuantity();
        $this->remove($code);
        $item->setQuantity($currentQuantity-1);
        $this->add($item);
    }
}
