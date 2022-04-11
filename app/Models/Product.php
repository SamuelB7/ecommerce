<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $with = ['category'];

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'quantity',
        'price'
    ];

    protected $visible = [
        'id',
        'name',
        'description',
        'category_id',
        'quantity',
        'price'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
