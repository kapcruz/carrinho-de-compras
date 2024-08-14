<?php

namespace AppTest\Helpers;

use App\Core\ShoppingCart\Domain\Entities\Cpf;
use App\Core\ShoppingCart\Domain\Entities\User;
use App\Core\ShoppingCart\Domain\ValueObject\Role;
use App\Core\ShoppingCart\Domain\ValueObject\Status;
use App\ShoppingCart\Models\User as UserModel;

class UserHelper
{
    public static function createUserEntity()
    {
        $name = 'Robert Garcia';
        $email = 'robert_garcia@email.com'; 
        $cpf = new Cpf('64761343028');
        $role = new Role(1);
        $status = new Status(1);
        $user = new User($name, $email, $cpf, $role, $status);
        return $user;
    }

    public static function createUserData()
    {
        $user = self::createUserEntity();
        UserModel::where('email', $user->getEmail())->forceDelete();
        $userModel = new UserModel();
        $userModel->name = $user->getName();
        $userModel->email = $user->getEmail();
        $userModel->phone = $user->getPhone();
        $userModel->cell_phone = $user->getCellPhone();
        $userModel->cpf = $user->getCpf()->getCpf();
        $userModel->role = $user->getRole()->getValue();
        $userModel->status = $user->getStatus()->getValue();
        $userModel->save();
        $user->setId($userModel->id);
        return $user;
    }
}
