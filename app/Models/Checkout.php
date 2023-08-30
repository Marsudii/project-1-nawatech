<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkouts';
    protected $fillable = [
        'user_id',
        'product_id',
        'total',
        'qty',
        'status',
        'payment'
    ];

    //checkouts join to table user based on id
    public function joinUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //checkouts join to table user based on id_product
    public function joinProducts()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_product');
    }
}
