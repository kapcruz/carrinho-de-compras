<?php
namespace App\ShoppingCart\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends \Illuminate\Database\Eloquent\Model {

    use SoftDeletes;

    protected $table = 'user_address';

    protected $fillable = [
        "id_user",
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

