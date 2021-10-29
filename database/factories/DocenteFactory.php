<?php

use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use App\Docente;

$factory->define(Docente::class, function (Faker $faker) {
    return [
        	'name' => $faker->firstName,
            'apellidoP' => $faker->lastName,
            'apellidoM' => $faker->lastName,
            'edad' => $faker->numberBetween(20,60),
            'email' => $faker->unique()->safeEmail,
            'password' => Hash::make('secret'),
            'telefono_fijo' => '123-123-1234',
            'telefono_cel' => '123-123-1234',
            'remember_token' => str_random(10),
    ];
});
