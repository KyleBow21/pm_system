<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Module;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {
    return [
        'module_name' => $faker->randomElement(['CSCM10', 'CSCM04', 'CSCM01']),
        'assignment_id' => function() {
            return App\Assignment::inRandomOrder()->first()->id;
        }
    ];
});
