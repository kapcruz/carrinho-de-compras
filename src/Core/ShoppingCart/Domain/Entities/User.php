<?php

namespace App\Core\ShoppingCart\Domain\Entities;

use InvalidArgumentException;

use App\Core\ShoppingCart\Domain\ValueObject\Role;
use App\Core\ShoppingCart\Domain\ValueObject\Status;

class User
{
    private Cpf $cpf;

    private int $id;
    private string $name;
    private string $email;
    private Role $role;
    private Status $status;
    private array $address;
    private string $phone = '';
    private string $cell_phone = '';

    public function __construct(string $name, string $email, Cpf $cpf, Role $role, Status $status)
    {
        $this->name = $name;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->role = $role;
        $this->status = $status;
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
        if(!$role->isAdmin() || !$role->isUser() || empty($role->getValue()))
        {
            throw new \InvalidArgumentException("Papel inválido ou inexistente.");
        }
        
        $this->role = $role;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(Status $status)
    {
        if(!$status->isEnable() || !$status->isDisable() || empty($status->getValue()))
        {
            throw new \InvalidArgumentException("Status inválido ou inexistente.");
        }
        
        $this->status = $status;
        return $this;
    }


}
