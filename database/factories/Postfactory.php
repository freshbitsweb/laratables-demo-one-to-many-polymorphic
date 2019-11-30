<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$urlArray = [
    'https://via.placeholder.com/700x70/00abf0/000000/?text=Image',
    'https://via.placeholder.com/700x70/00abf0/000000/?text=Image',
    'https://via.placeholder.com/700x70/00abf0/000000/?text=Image',
    'https://via.placeholder.com/700x70/00abf0/000000/?text=Image',
    'https://via.placeholder.com/700x70/00abf0/000000/?text=Image'
];

$factory->define(Post::class, function (Faker $faker) use($urlArray) {
    return [
            'title' => $faker->sentence($nbWords = 1, $variableNbWords = true),
            'url' => $urlArray[array_rand($urlArray)],
        ];
});

$factory->afterCreating(Post::class, function ($post, $faker) {
    $post->likes()->saveMany(factory(App\Like::class,  mt_rand(1, 5))->make());
});
