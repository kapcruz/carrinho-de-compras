<?php

namespace AppTest\ShoppingCart\Domain\Entities;

use App\Core\ShoppingCart\Domain\Entities\User;
use App\Core\ShoppingCart\Domain\Entities\Cpf;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\Core\ShoppingCart\Domain\Entities\UserAddress;

class UserAddressTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        $this->user = $this->createUser();
        parent::setUp();
    }

    public function testCityIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $userAddress = $this->createUserAddress();
        $userAddress->setCity('');
    }

    public function testStateIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $userAddress = $this->createUserAddress();
        $userAddress->setState('');
    }

    public function testDistrictIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $userAddress = $this->createUserAddress();
        $userAddress->setDistrict('');
    }

    public function testZipCodeIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $userAddress = $this->createUserAddress();
        $userAddress->setZipCode('');
    }

    public function testAddressIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $userAddress = $this->createUserAddress();
        $userAddress->setAddress('');
    }

    private function createUserAddress() {

        $user = $this->user;
        $city = 'Brasília';
        $state = "DF";
        $address = 'Quadra SHCES Quadra 1301 Bloco B';
        $zipCode = '70658327';
        $district = 'Cruzeiro Novo';
        $complement = '';
        $reference = '';
        $number = '';

        $userAddress = new UserAddress($user, $city, $state, $district, $zipCode, $complement, $address, $number, $reference);

        return $userAddress;

    }

    private function createUser()
    {

        $name = 'Analise F Carvalho';
        $email = "analise@gmail.com";
        $cpf = new Cpf('04533422055');
        $user = new User($name, $email, $cpf);

        return $user;
    }



}
