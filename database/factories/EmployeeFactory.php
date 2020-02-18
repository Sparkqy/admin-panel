<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Administrator;
use App\Models\Employee;
use App\Models\Position;
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

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'salary' => $faker->randomFloat(3, 0, 500.000),
        'profile_image' => Employee::NO_PROFILE_IMAGE_PATH,
        'date_of_employment' => $faker->date(),
        'created_at' => $faker->dateTime(),
    ];
});
