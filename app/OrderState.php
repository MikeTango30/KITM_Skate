<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model
{
    protected $fillable = [
        'state'
    ];

    public function order() {

        return $this->hasMany(Order::class);
    }
}
