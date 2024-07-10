<?php

namespace ShoppingCart\Application\Repositories;

use App\Core\ShoppingCart\Domain\Entities\Cpf;
use App\Core\ShoppingCart\Domain\Entities\User;
use App\Core\ShoppingCart\Domain\ValueObject\Role;
use App\Core\ShoppingCart\Domain\ValueObject\Status;
use Core\ShoppingCart\Application\Repositories\UserRepository;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    public function testCreateNewUser()
    {
        $userRepository = new UserRepository();
        $user = new User(
            'Fernando',
            'fernando@email.com',
            new Cpf('05707573046'),
            new Role(Role::ADMIN),
            new Status(Status::ENABLE)
        );
        $userRepository->create($user);
    }
}
