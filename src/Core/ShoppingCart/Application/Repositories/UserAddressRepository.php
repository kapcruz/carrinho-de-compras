<?php

namespace App\Core\ShoppingCart\Application\Repositories;

use App\Core\ShoppingCart\Domain\Entities\UserAddress;
use App\ShoppingCart\Models\UserAddress as userAddressModel;
use App\Core\ShoppingCart\Domain\RepositoryInterfaces\UserAddressRepositoryInterface;

class UserAddressRepository implements UserAddressRepositoryInterface
{
    private userAddressModel $userAddressModel;

    public function __construct()
    {
        $this->userAddressModel = new userAddressModel();
    }

    public function create(userAddressModel $address)
    {
        print_r($address);
        exit();
      /*   $userAddressModel = $this->userAddressModel;
        $userAddressModel->id_user = $user->getName();
        $userAddressModel->save(); */
    }


}
