<?php

namespace ShoppingCart\Application\Repositories;

use App\Core\ShoppingCart\Domain\Entities\Cpf;
use App\Core\ShoppingCart\Domain\Entities\User;
use App\ShoppingCart\Models\User as UserModel;
use App\ShoppingCart\Models\UserAddress as UserAddressModel;
use App\Core\ShoppingCart\Domain\ValueObject\Role;
use App\Core\ShoppingCart\Domain\ValueObject\Status;
use App\Core\ShoppingCart\Application\Repositories\UserRepository;
use App\Core\ShoppingCart\Application\Repositories\UserAddressRepository;
use App\Core\ShoppingCart\Domain\Entities\UserAddress;
use AppTest\ShoppingCartTestCase;

class UserRepositoryTest extends ShoppingCartTestCase
{  

    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        UserModel::where('email', 'fernando@email.com')->forceDelete();
        UserModel::where('email', 'fernando1@email.com')->forceDelete();
    }
    
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
        
        $userModel = UserModel::where('email', 'fernando@email.com')->get()->first();

        $this->assertNotNull($userModel);
    }

    public function testCreateNewUserWithAddress()
    {
        $userRepository = new UserRepository();
        $user = new User(
            'Fernando',
            'fernando1@email.com',
            new Cpf('05707573046'),
            new Role(Role::ROLE_ADMIN),
            new Status(Status::STATUS_ENABLE)
        );
        $userRepository->create($user);

        $userModel = UserModel::where('email', 'fernando1@email.com')->get()->first();
        $this->assertNotNull($userModel);

        $userAddressEntity = new UserAddress(
            'Brasilia',
            'DF',
            'Samambaia Sul',
            '72306-613',
            'APT 200',
            'Quadra QR 308 Conjunto 13',
            '13',
            'Na esquina do fi de vó',
            $userModel->id
        );

        $userAddressRepository =  new UserAddressRepository();
        $userAddressRepository->create($userAddressEntity);

        $userAddress = UserAddressModel::where('id_user', $userModel->id)->get()->first();

        $this->assertNotNull($userAddress);

    }
}
