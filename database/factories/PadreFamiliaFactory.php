<?php

use Faker\Generator as Faker;
use App\Padre_familia;

$factory->define(Padre_familia::class, function (Faker $faker) {
    return [
        	'name' => $faker->firstName,
            'apellidoP' => $faker->lastName,
            'apellidoM' => $faker->lastName,
            'email' => $faker->unique()->safeEmail,
            'password' =>bcrypt('secret') ,
            'edad' => $faker->numberBetween(20,60),
            'curp' => str_random(18),
            'telefono_fijo' =>'246-460-0026',
            'telefono_cel' => '248-177-0762',
            'profesion' => $faker->word,
            'ocupacion' => 'Construcción e ingeniería civil',
            'escolaridad' => $faker->randomElement($array = array('Primaria','Secundaria' , 'Preparatoria', 'Universidad')),
            'estado_civil' => $faker->randomElement($array = array('Soltero(a)','Casado(a)')),
            'remember_token' => str_random(10)                        
    ];
});
