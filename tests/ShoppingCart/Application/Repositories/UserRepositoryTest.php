<?php

namespace ShoppingCart\Application\Repositories;

use App\Core\ShoppingCart\Domain\Entities\Cpf;
use App\Core\ShoppingCart\Domain\Entities\User;
use App\Core\ShoppingCart\Domain\ValueObject\Role;
use App\Core\ShoppingCart\Domain\ValueObject\Status;
use App\Core\ShoppingCart\Application\Repositories\UserRepository;
use AppTest\ShoppingCartTestCase;

class UserRepositoryTest extends ShoppingCartTestCase
{
    public function testCreateNewUser()
    {
        $userRepository = new UserRepository();
        $user = new User(
            'Fernando',
            'fernando@email.com',
            new Cpf('05707573046'),
            new Role(Role::ROLE_ADMIN),
            new Status(Status::STATUS_ENABLE)
        );
        $userRepository->create($user);
    }
}
