<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Administrator;
use Faker\Generator as Faker;

$factory->define(Administrator::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'profile_image' => '/uploads/profile-images/no-avatar.png',
        'role' => $faker->randomElement([Administrator::ADMIN_ROLE, Administrator::MANAGER_ROLE]),
        'created_at' => $faker->dateTime(),
    ];
});
