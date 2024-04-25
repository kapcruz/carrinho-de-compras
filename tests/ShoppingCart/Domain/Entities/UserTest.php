<?php

namespace AppTest\ShoppingCart\Domain\Entities;

use App\Core\ShoppingCart\Domain\Entities\Cpf;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\Core\ShoppingCart\Domain\Entities\User;

class UserTest extends TestCase
{

    

    private User $user;

    public function setUp(): void
    {
        $this->user = $this->createUser();
        parent::setUp();
    }

    public function testNameNotEmpty()
    {

        $this->expectException(InvalidArgumentException::class);
        $this->user->setName("");
    }

    public function testEmailNotNull()
    {

        $this->expectException(InvalidArgumentException::class);
        $this->user->setEmail("");
    }

    public function testEmailInvalid()
    {

        $this->expectException(InvalidArgumentException::class);
        $this->user->setEmail("testeemail_invalido.com");
    }

    public function testEmailIsValid()
    {
        $this->expectNotToPerformAssertions();
        $this->user->setEmail("testeemail_valido@teste.com");
    }

    private function createUser()
    {
        $name = 'Robert Garcia';
        $email = 'robert_garcia@email.com'; 
        $cpf = new Cpf('64761343028');
        $user = new User($name, $email, $cpf);
        return $user;
    }
}
