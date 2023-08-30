<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'name_product',
        'slug_product',
        'image_product',
        'price',
        'qty'
    ];


}
