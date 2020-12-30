<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Module;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {
    return [
        "name" => $faker->randomElement(['PHP', 'SQL', 'HTML', 'Reseaux', 'Linux', 'Windows']),
        "description" => $faker->sentence($nbWords = 10,$variableNbwords = true)
    ];
});
