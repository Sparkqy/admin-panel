<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Administrator;
use App\Models\Position;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'created_at' => $faker->dateTime(),
    ];
});
