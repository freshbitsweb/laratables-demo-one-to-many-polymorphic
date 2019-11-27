<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$urlArray = [
    'https://cdn.pixabay.com/photo/2016/09/14/22/40/landscape-1670702_960_720.jpg',
    'https://www.maxpixel.net/static/photo/1x/Landscape-Nature-Natural-Ski-Mountain-Mammoth-2282027.jpg',
    'https://cdn.pixabay.com/photo/2018/01/31/06/51/waters-3120408_960_720.jpg',
    'https://www.maxpixel.net/static/photo/1x/Lake-Mountain-Park-Grass-Natural-Beach-Forest-2783999.jpg',
    'https://www.maxpixel.net/static/photo/1x/Stone-Desert-Nature-Rocks-Wall-Landmark-Natural-1304148.jpg'
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
