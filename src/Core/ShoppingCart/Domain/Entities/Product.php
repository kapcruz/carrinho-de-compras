<?php

namespace App\Core\ShoppingCart\Domain\Entities;

use Exception;

class Product
{
    private string $name;
    private float $price;
    private string $slug;
    private string $image;
    private int $quantity;

    // public function __construct(
    //     string $name = "",
    //     float $price,
    //     string $slug,
    //     string $image,
    //     int $quantity
    // ) {
    //     $this->name = $name;
    //     $this->price = $price;
    //     $this->slug = $slug;
    //     $this->image = $image;
    //     $this->quantity = $quantity;
    // }

    public function setName(string $name)
    {
        if(empty($name)) {
            throw new \InvalidArgumentException("Nome não pode ser nulo");
        }

        if(strlen($name) < 2) {
            throw new \InvalidArgumentException("Nome do produto deve conter mais de dois caracteres");
        }

        $this->name = $name;
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
