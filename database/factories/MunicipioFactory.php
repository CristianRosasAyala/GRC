<?php

use Faker\Generator as Faker;

$factory->define(App\Municipio::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->numberBetween(1, 10000),
        'name' => $faker->state,
        'estado_id' => $faker->state,
        'number' => $faker->state,
    ];
});
