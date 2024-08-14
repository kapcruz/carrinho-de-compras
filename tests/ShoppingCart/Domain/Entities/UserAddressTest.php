<?php

namespace AppTest\ShoppingCart\Domain\Entities;

use App\Core\ShoppingCart\Domain\Entities\User;
use App\Core\ShoppingCart\Domain\Entities\Cpf;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\Core\ShoppingCart\Domain\Entities\UserAddress;
use AppTest\Helpers\UserHelper;

class UserAddressTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCityIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $user = UserHelper::createUserData();
        $userAddress = $this->createUserAddress($user->getId());
        $userAddress->setCity('');
    }

    public function testStateIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $user = UserHelper::createUserData();
        $userAddress = $this->createUserAddress($user->getId());
        $userAddress->setState('');
    }

    public function testDistrictIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $user = UserHelper::createUserData();
        $userAddress = $this->createUserAddress($user->getId());
        $userAddress->setDistrict('');
    }

    public function testZipCodeIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $user = UserHelper::createUserData();
        $userAddress = $this->createUserAddress($user->getId());
        $userAddress->setZipCode('');
    }

    public function testAddressIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $user = UserHelper::createUserData();
        $userAddress = $this->createUserAddress($user->getId());
        $userAddress->setAddress('');
    }

    public function testUserIdIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $user = UserHelper::createUserData();
        $userAddress = $this->createUserAddress($user->getId());
        $userAddress->setIdUser(0);
    }

    private function createUserAddress(int $idUser)
    {

        $city = 'Brasília';
        $state = "DF";
        $address = 'Quadra SHCES Quadra 1301 Bloco B';
        $zipCode = '70658327';
        $district = 'Cruzeiro Novo';
        $complement = '';
        $reference = '';
        $number = '';

        $userAddress = new UserAddress($city, $state, $district, $zipCode, $complement, $address, $number, $reference, $idUser);

        return $userAddress;
    }
}
