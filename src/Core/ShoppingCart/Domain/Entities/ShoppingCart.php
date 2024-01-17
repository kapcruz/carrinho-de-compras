<?php

namespace App\Core\ShoppingCart\Domain\Entities;


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

    public function getTotalPrice()
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }

        return $total;
    }
}
