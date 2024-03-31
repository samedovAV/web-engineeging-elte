<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Track;
use Faker\Generator as Faker;

$factory->define(Track::class, function (Faker $faker) {
    return [
        'name'          => $faker->word,
        'filename'      => null, // $faker->optional()->file('', '/tmp'),
        'color'         => $faker->hexColor,
    ];
});
