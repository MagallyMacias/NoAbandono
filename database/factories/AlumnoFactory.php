<?php

use Faker\Generator as Faker;
use App\Alumno;

$factory->define(App\Alumno::class, function (Faker $faker) {
    
    return [        		
            'nia' => $faker->unique()->randomNumber,
            'name' => $faker->firstName,
            'edad' => $faker->numberBetween(15,30),
            'apellidoP' => $faker->lastName,
            'apellidoM' => $faker->lastName,
            'fechaN' => $faker->date($format = 'Y-m-d', $max = 'now'), // El "now" quiere decir que sera el año maximo que va a capturar
            'genero' => $faker->randomElement($array = array('H','M')),
            'phone' => '248-177-07-62',
            'email' => $faker->unique()->safeEmail,
            'password' =>Hash::make('secret'),
            'remember_token' => str_random(10),             
            'grupo_id' =>1,          
            //'grupo_id' =>$faker->numberBetween(1,5) //Habra 5 grupos           
    ];
});
