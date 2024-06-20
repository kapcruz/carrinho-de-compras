<?php
namespace App\ShoppingCart\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends \Illuminate\Database\Eloquent\Model {

    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        "name",
        "price",
        "quantity",
        "slug",
        "code",
        "image"
    ];
}

