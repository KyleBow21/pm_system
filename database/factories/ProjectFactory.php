<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'project_name' => "PROJ".$faker->randomDigit,
        'project_year' => $faker->year,
        'project_type' => 'Technical',
        'project_description' => $faker->text(200),
        'user_id' => function() {
            return App\User::inRandomOrder()->first()->id;
        },
        'module_id' => function() {
            return App\Module::inRandomOrder()->first()->id;
        }
    ];
});
