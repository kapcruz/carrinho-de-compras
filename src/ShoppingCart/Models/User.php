<?php
namespace App\ShoppingCart\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \Illuminate\Database\Eloquent\Model {

    use SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        "name"
        "email"
        "phone"
        "cell_phone"
        "cpf"
        "role"
        "status"
    ];
}

