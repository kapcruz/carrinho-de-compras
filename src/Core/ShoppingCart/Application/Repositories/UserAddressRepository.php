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

    public function create(UserAddress $address)
    {
        $userAddressModel = $this->userAddressModel;
        $userAddressModel->id_user = $address->getidUser();
        $userAddressModel->city = $address->getCity();
        $userAddressModel->state = $address->getState();
        $userAddressModel->district = $address->getDistrict();
        $userAddressModel->zip_code = $address->getZipCode();
        $userAddressModel->address = $address->getAddress();
        $userAddressModel->complement = $address->getComplement();
        $userAddressModel->number = $address->getNumber();
        $userAddressModel->reference = $address->getReference();
        $userAddressModel->save();
    }


}
