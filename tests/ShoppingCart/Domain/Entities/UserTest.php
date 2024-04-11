<?php

namespace AppTest\ShoppingCart\Domain\Entities;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\Core\ShoppingCart\Domain\Entities\User;

class UserTest extends TestCase
{
    public function testNameNotEmpty()
    {
        $user = New User();

        $this->expectException(InvalidArgumentException::class);
        $user->setName("");
    }

    public function testEmailNotNull()
    {
        $user = New User();

        $this->expectException(InvalidArgumentException::class);
        $user->setEmail("");
    }

    public function testEmailInvalid()
    {
        $user = New User();

        $this->expectException(InvalidArgumentException::class);
        $user->setEmail("testeemail_invalido.com");
    }

    public function testEmailIsValid()
    {
        $user = New User();

        $this->expectNotToPerformAssertions();
        $user->setEmail("testeemail_valido@teste.com");
    }
}
