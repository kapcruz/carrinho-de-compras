<?php

namespace App\Core\ShoppingCart\Domain\RepositoryInterfaces;

use App\Core\ShoppingCart\Domain\Entities\UserAddress;

interface UserAddressRepositoryInterface
{
    public function create(UserAddress $user);
}
