<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        "lastname" => $faker->lastName,
        "firstname" => $faker->firstName,
        "email" => $faker->email
    ];
});
