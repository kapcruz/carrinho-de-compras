<?php

namespace App\Core\ShoppingCart\Domain\Entities;

use InvalidArgumentException;

class UserAddress
{
    private User $user;

    private string $city;
    private string $state;
    private string $district;
    private string $zipCode;
    private string $complement;
    private string $address;
    private string $number;
    private string $reference;

    public function __construct(
        User $user,
        string $city,
        string $state,
        string $district,
        string $zipCode,
        string $complement,
        string $address,
        string $number,
        string $reference
    ) {
        $this->user = $user;
        $this->city = $city;
        $this->state = $state;
        $this->district = $district;
        $this->zipCode = $zipCode;
        $this->complement = $complement;
        $this->address = $address;
        $this->number = $number;
        $this->reference = $reference;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        if (empty($user)) {
            throw new InvalidArgumentException('O usuário é obrigatório.');
        }
        
        return $this->user = $user;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        if (empty($city)) {
            throw new InvalidArgumentException('A cidade é obrigatória.');
        }

        return $this->city = $city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState(string $state)
    {
        if (empty($state)) {
            throw new InvalidArgumentException('O estado é obrigatório.');
        }

        return $this->state = $state;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function setDistrict(string $district)
    {
        if (empty($district)) {
            throw new InvalidArgumentException('O bairro é obrigatório.');
        }

        return $this->district = $district;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode)
    {
        if (empty($zipCode)) {
            throw new InvalidArgumentException('O CEP é obrigatório.');
        }

        return $this->zipCode = $zipCode;
    }

    public function getComplement()
    {
        return $this->complement;
    }

    public function setComplement(string $complement)
    {
        return $this->complement = $complement;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress(string $address)
    {

        if (empty($address)) {
            throw new InvalidArgumentException('O endereço é obrigatório.');
        }

        return $this->address = $address;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber(string $number)
    {
        return $this->number = $number;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference(string $reference)
    {
        return $this->reference = $reference;
    }
}
