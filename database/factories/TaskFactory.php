<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tasks;
use Faker\Generator as Faker;

$factory->define(Tasks::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'email' => $faker->safeEmail,
        'mobile_number' => $faker->e164PhoneNumber,
        'body' => $faker->paragraph,
    ];
});
