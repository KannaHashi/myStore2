<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_title', 'product_slug', 'product_image', 'product_price'
    ];

    protected $table = 'products';

    use HasFactory;
}
