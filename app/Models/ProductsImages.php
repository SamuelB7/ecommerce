<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsImages extends Model
{
    use HasFactory;

    protected $table = 'products_images';

    protected $fillable = [
        'image',
        'product_id'
    ];

    protected $visible = [
        'image',
        'product_id'
    ];
}
