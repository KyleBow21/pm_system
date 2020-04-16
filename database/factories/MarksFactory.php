<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Marks;
use Faker\Generator as Faker;

$factory->define(Marks::class, function (Faker $faker) {
    return [
        'mark_score' => $faker->numberBetween(0,100),
        'project_id' => function() {
        return App\Project::inRandomOrder()->first()->id;
    }
    ];
});
