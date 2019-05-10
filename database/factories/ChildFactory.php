<?php

use App\Child;
use Faker\Generator as Faker;

$factory->define(Child::class, function (Faker $faker) {
    return [
        'first_name' => $faker->first_name,
        'last_name' => $faker->last_name,
        'date_of_birth' => $faker->date_of_birth,
        'gender_id' => $faker->gender_id
    ];
});
