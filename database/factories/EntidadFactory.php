<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entidad;
use Faker\Generator as Faker;

$factory->define(Entidad::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->numberBetween(1, 32),
        'name' => $faker->state,
        'abbrev' => strtoupper($faker->lexify('???')),
        'country' => 'MX'
    ];
});
