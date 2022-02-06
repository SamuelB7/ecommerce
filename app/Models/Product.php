<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Products';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price'
    ];

    protected $visible = [
        'name',
        'description',
        'category_id',
        'price'
    ];


}
