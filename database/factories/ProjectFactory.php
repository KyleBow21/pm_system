<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;
$autoIncrement = autoIncrement();
$factory->define(Project::class, function (Faker $faker) use ($autoIncrement){
    $autoIncrement->next();
    return [

        'project_name' => "PROJ".$autoIncrement->current(),
        'project_year' => $faker->year,
        'project_type' => $faker->randomElement(['Technical', 'Research']),
        'project_description' => $faker->text(200),
        'user_id' => function() {
            return App\User::inRandomOrder()->first()->id;
        },
        'module_id' => function() {
            return App\Module::inRandomOrder()->first()->id;
        }
    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 10; $i++) {
        yield $i;
    }
}
