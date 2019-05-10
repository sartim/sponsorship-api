<?php

use App\Child;
use Faker\Generator as Faker;

$factory->define(Child::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->dateTime,
        'gender_id' => $faker->randomDigitNotNull
    ];
});
