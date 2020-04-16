<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Scheme;
use Faker\Generator as Faker;

$factory->define(Scheme::class, function (Faker $faker) {
    return [
        'scheme_name'=> $faker->randomElement(['Advanced Software Technology', 'Computer Science']),
        'module_id' => function() {
            return App\Module::inRandomOrder()->first()->id;
        }
    ];
});
