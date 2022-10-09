<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\siteContacto;
use Faker\Generator as Faker;

$factory->define(siteContacto::class, function (Faker $faker) {
    return [
        'nome'=> $faker->name,
        'telefone'=> $faker->phoneNumber,
        'email'=>$faker->unique()->email,
        'motivo'=>$faker->numberBetween(0,3),
        'mensagem'=>$faker->text(200)
    ];
});
