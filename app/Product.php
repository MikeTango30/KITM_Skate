<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'product_title',
        'description',
        'total',
        'price',
        'img',
        'active'
    ];
}
