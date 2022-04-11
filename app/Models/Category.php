<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $with = ['products'];

    protected $fillable = [
        'name'
    ];

    protected $visible = [
        'name'
    ];

    public function products() {
        return $this->hasMany(Product::class, 'category_id');
    }
}
