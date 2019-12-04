<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'image_url' => $faker->url,
    ];
});

$factory->afterCreating(Video::class, function ($video, $faker) {
    $video->likes()->saveMany(factory(App\Like::class,  mt_rand(1, 5))->make());
});
