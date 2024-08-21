<?php

namespace App\Core\ShoppingCart\Domain\Entities;

use Exception;

class Order
{
    private int $id;
    private string $code = '';
    private float $totalPrice = 0;
    private string $delivery_address = '';
    private string $status = '';
    private User $user;

    public function __construct(int $id = 0)
    {
        $this->id = $id;
    }

    public function setCode(string $code)
    {
        if (empty($code)) {
            throw new \InvalidArgumentException("O código do pedido é obrigatório");
        }
     
        $this->code = $code;
        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setTotalPrice(string $totalPrice)
    {
        if (empty($totalPrice)) {
            throw new \InvalidArgumentException("O total do pedido é obrigatório");
        }

        if ($totalPrice < 0) {
            throw new \InvalidArgumentException("O total do pedido não pode ser negativo");
        }
     
        $this->totalPrice = $totalPrice;
        return $this;
    }

    public function getTotalPrice(): string
    {
        return $this->totalPrice;
    }
}
