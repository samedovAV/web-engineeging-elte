<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name'          => $faker->lastName,
        'description'   => $faker->optional()->sentence(),
        'bg_url'        => $faker->optional()->passthrough('https://source.unsplash.com/collection/1548469/320x170?sig=' . Str::random(10)),
    ];
});
