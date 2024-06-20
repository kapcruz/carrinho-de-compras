<?php

namespace App\Core\ShoppingCart\Domain\Entities;

use InvalidArgumentException;

use App\Core\ShoppingCart\Domain\ValueObject\Role;

class User
{
    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;

    private Cpf $cpf;

    private int $id;
    private string $name;
    private string $email;
    private string $phone;
    private string $cell_phone;
    private Role $role;
    private int $status;
    private array $address;

    public function __construct(string $name, string $email, Cpf $cpf, Role $role)
    {
        $this->name = $name;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->role = $role;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        if (empty($name)) {
            throw new InvalidArgumentException('O nome é obrigatório.');
        }

        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        if (empty($email)) {
            throw new InvalidArgumentException('O e-mail é obrigatório.');
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException('O e-mail é obrigatório.');
        }

        $this->email = $email;
        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf(Cpf $cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getCellPhone()
    {
        return $this->cell_phone;
    }

    public function setCellPhone(string $cell_phone)
    {
        $this->cell_phone = $cell_phone;
        return $this;
    }

    public function setAddress(array $address)
    {
        $this->address = $address;
        return $this;
    }

    public function getAddress(): array
    {
        return $this->address;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole(Role $role)
    {
        if(empty($role->getValue()))
        {
            throw new \InvalidArgumentException("O papel inválido ou inexistente.");
        }
        
        $this->role = $role;
        return $this;
    }

}
