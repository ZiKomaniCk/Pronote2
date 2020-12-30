<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promotion;
use Faker\Generator as Faker;

$factory->define(Promotion::class, function (Faker $faker) {
    return [
        "name" => $faker->randomElement(['B1' ,'B2', 'B3', 'M1', 'M2']),
        "speciality" => $faker->randomElement(['Informatique' ,'Design', 'Animation', 'Audiovisuel', 'Marketing'])
    ];
});
