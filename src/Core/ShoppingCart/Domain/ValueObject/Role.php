<?php

namespace App\Core\ShoppingCart\Domain\ValueObject;


class Role
{
    const ADMIN = 'Administrador';
    const USER = 'Usuário';

    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;

    private int $role;

    public function __construct(int $role)
    {
        $this->role = $role;
    }

    public function getValue():int
    {
        return $this->role;
    }

    public function setRole(int $role):int
    {
        $this->role = $role;
        return $this;
    }

    public function isAdmin():bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUser():bool
    {
        return $this->role === self::ROLE_USER;
    }

    public function nameByValue(int $role):?string
    {
        if($role === self::ROLE_ADMIN) {
            return self::ADMIN;
        }

        if($role === self::ROLE_USER) {
            return self::USER;
        }
        
        return null;
    }

}
