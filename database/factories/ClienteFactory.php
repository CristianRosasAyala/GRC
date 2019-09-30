<?php

use Faker\Generator as Faker;
use App\Cliente;

$factory->define(Cliente::class, function (Faker $faker) {
    $fechaAleatoria = $faker->date;
    
    return [
        'codigo'  => $faker->unique()->postcode,
        'razonSocial' => $faker->company(2), 
        'cif' => $faker-> unique()->randomNumber($nbDigits = NULL, $strict = false), 
        'direccion' => $faker->address(3), 
        'municipio' => $faker->citySuffix(2), 
        'provincia' => $faker->city(1), 
        'fechainiciocontrato' => $fechaAleatoria, 
        'fechafincontrato' => $faker->date($format ='Y-m-d', $max = '+2 years'),  //dateTimeBetween($startDate = $fechaAleatoria, $endDate = '+2 years', $timezone = null), 
        'numeroreconocimientoscontratados'=> $faker->numberBetween(0,500), 
        'activo'=> $faker->boolean,
        'numeroreconocimientosutilizados' => $faker->numberBetween(0,500)
    ];
});
