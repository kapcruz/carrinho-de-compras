<?php

namespace App\Core\ShoppingCart\Domain\Entities;

use InvalidArgumentException;

class UserAddress
{
    private string $city;
    private string $state;
    private string $district;
    private string $zipCode;
    private string $complement;
    private string $address;
    private string $number;
    private string $reference;
    private int $id;
    private int $idUser;


    public function __construct(
        string $city,
        string $state,
        string $district,
        string $zipCode,
        string $complement,
        string $address,
        string $number,
        string $reference,
        int $idUser,
        int $id = 0
    ) {
        $this->city = $city;
        $this->state = $state;
        $this->district = $district;
        $this->zipCode = $zipCode;
        $this->complement = $complement;
        $this->address = $address;
        $this->number = $number;
        $this->reference = $reference;
        $this->idUser = $idUser;
        $this->id = $id;
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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }
}
