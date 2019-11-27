<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'url' => $faker->url,
    ];
});

$factory->afterCreating(Post::class, function ($post, $faker) {
    $post->likes()->saveMany(factory(App\Like::class,  mt_rand(1, 5))->make());
});
