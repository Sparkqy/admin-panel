<?php

use App\Models\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'salary' => $faker->randomFloat(3, 0, 500.000),
        'profile_image' => '/uploads/profile-images/no-avatar.png',
        'position_id' => rand(1, 50),
        'boss_id' => rand(1, 200),
        'date_of_employment' => $faker->date(),
        'admin_created_id' => rand(1, 200),
    ];
});
