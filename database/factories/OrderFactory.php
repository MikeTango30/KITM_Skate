<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        "user_info" => json_encode(["name" => $faker->name]),
        "items" => json_encode(["item" => $faker->colorName." ".$faker->city." Board"]),
        "total" => 1,
        "state_id" => $faker->numberBetween(1, 3)
    ];
});
