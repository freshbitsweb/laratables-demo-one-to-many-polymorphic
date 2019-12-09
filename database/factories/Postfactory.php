<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$urlArray = [
    'https://via.placeholder.com/550x70/00abf0/000000',
    'https://via.placeholder.com/550x70/00abf0/000000',
    'https://via.placeholder.com/550x70/00abf0/000000',
    'https://via.placeholder.com/550x70/00abf0/000000',
    'https://via.placeholder.com/550x70/00abf0/000000'
];

$factory->define(Post::class, function (Faker $faker) use($urlArray) {
    return [
            'title' => $title = $faker->sentence($nbWords = 1, $variableNbWords = true),
            'image_url' => $urlArray[array_rand($urlArray)]."/?text=$title",
        ];
});

$factory->afterCreating(Post::class, function ($post, $faker) {
    $post->likes()->saveMany(factory(App\Like::class,  mt_rand(1, 5))->make());
});
