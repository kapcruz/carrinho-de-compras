<?php
namespace App\ShoppingCart\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends \Illuminate\Database\Eloquent\Model {

    use SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        "city",
        "state",
        "district",
        "zip_code",
        "address",
        "complement",
        "number",
        "reference",
    ];
}

