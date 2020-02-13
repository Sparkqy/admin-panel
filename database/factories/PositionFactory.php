<?php

use App\Models\Position;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'admin_created_id' => rand(1, 50000),
    ];
});
