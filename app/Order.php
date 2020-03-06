<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_info',
        'items',
        'total',
        'state_id',
        'active'
    ];

    public function state() {

        return $this->hasOne(OrderState::class);
    }
}
