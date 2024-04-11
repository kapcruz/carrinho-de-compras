<?php

namespace App\Core\ShoppingCart\Domain\Entities;

use InvalidArgumentException;

class User 
{
    private Cpf $cpf;
    
    private string $name;
    private string $email;
    private string $phone;
    private string $cell_phone;
    private int $role;
    private int $status;

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
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf(Cpf $cpf)
    {
        $this->cpf = $cpf;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function getCellPhone()
    {
        return $this->cell_phone;
    }

    public function setCellPhone(string $cell_phone)
    {
        $this->cell_phone = $cell_phone;
    }
}
