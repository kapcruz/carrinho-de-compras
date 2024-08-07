<?php

namespace App\Core\ShoppingCart\Domain\RepositoryInterfaces;

use App\Core\ShoppingCart\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user);
    public function update(User $user);
    public function delete(int $id);
    public function findById(int $id):?User;

}
