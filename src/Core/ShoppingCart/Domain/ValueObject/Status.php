<?php

namespace App\Core\ShoppingCart\Domain\ValueObject;

class Status
{
    const ENABLE = 'Ativo';
    const DISABLE = 'Desativado';

    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 2;

    private int $status;

    public function __construct(int $status)
    {
        $this->status = $status;
    }

    public function getValue():int
    {
        return $this->status;
    }

    public function setStatus(int $status):int
    {
        $this->status = $status;
        return $this;
    }

    public function isEnable():bool
    {
        return $this->status === self::STATUS_ENABLE;
    }

    public function isDisable():bool
    {
        return $this->status === self::STATUS_DISABLE;
    }

    public function nameByValue(int $status):?string
    {
        if($status === self::STATUS_ENABLE) {
            return self::ENABLE;
        }

        if($status === self::STATUS_DISABLE) {
            return self::DISABLE;
        }
        
        return null;
    }

}
