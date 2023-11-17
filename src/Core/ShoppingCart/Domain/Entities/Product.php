<?php

namespace App\Core\ShoppingCart\Domain\Entities;

class Product
{
    private string $name;
    private float $price;
    private string $slug;
    private string $image;
    private int $quantity;

    public function __construct(
        string $name,
        float $price,
        string $slug,
        string $image,
        int $quantity
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->slug = $slug;
        $this->image = $image;
        $this->quantity = $quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'price' => $this->getPrice(),
        ];
    }
}
