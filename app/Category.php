<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_title'
    ];

    public function product() {

        return $this->hasMany(Product::class);
    }
}
