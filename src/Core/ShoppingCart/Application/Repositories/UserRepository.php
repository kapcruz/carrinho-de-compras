<?php

namespace Core\ShoppingCart\Application\Repositories;

use App\Core\ShoppingCart\Domain\Entities\Cpf;
use App\Core\ShoppingCart\Domain\Entities\User;
use App\Core\ShoppingCart\Domain\ValueObject\Role;
use App\Core\ShoppingCart\Domain\ValueObject\Status;
use App\ShoppingCart\Models\User as UserModel;
use Core\ShoppingCart\Domain\RepositoryInterfaces\UserReposirotyInterface;

class UserRepository implements UserReposirotyInterface
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function create(User $user)
    {
        $userModel = $this->userModel;
        $userModel->name = $user->getName();
        $userModel->email = $user->getEmail();
        $userModel->phone = $user->getPhone();
        $userModel->cell_phone = $user->getCellPhone();
        $userModel->cpf = $user->getCpf();
        $userModel->role = $user->getRole();
        $userModel->status = $user->getStatus();
        $userModel->save();
    }

    public function update(User $user)
    {
        $userModel = $this->userModel->find($user->getId());
        if ($userModel) {
            $userModel->name = $user->getName();
            $userModel->email = $user->getEmail();
            $userModel->phone = $user->getPhone();
            $userModel->cell_phone = $user->getCellPhone();
            $userModel->cpf = $user->getCpf();
            $userModel->role = $user->getRole();
            $userModel->status = $user->getStatus();
            $userModel->save();
        }
    }
    public function delete(int $id)
    {
        $this->userModel
            ->find($id)
            ->delete();
    }
    public function findById(int $id): ?User
    {
        $userModel = $this->userModel->find($id);
        if ($userModel) {

            return new User(
                $userModel->name,
                $userModel->email,
                new Cpf($userModel->cpf),
                new Role($userModel->role),
                new Status($userModel->status)
            );
        }
        return null;
    }
}
