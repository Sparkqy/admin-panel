<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Currency;
use Faker\Generator as Faker;

$factory->define(Currency::class, function (Faker $faker) {
    return [
        [
            'code' => 'USD',
            'symbol' => '$',
            'is_main' => 1,
            'rate' => 1,
            'created_at' => now()->toDateString(),
        ],
        [
            'code' => 'EUR',
            'symbol' => '€',
            'is_main' => 0,
            'rate' => 1.12,
            'created_at' => now()->toDateString(),
        ],
    ];
});
