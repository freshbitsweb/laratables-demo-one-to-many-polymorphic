<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$urlArray = [
    'https://cdn.pixabay.com/photo/2017/01/30/16/11/sunset-2021266_960_720.jpg',
    'https://cdn.pixabay.com/photo/2017/09/29/22/55/panorama-2800783_960_720.jpg',
    'https://cdn.pixabay.com/photo/2018/01/31/06/51/waters-3120408_960_720.jpg',
    'https://cdn.pixabay.com/photo/2019/08/14/18/12/landscape-4406387_960_720.jpg',
    'https://cdn.pixabay.com/photo/2016/08/26/17/33/landscape-1622739_960_720.jpg'
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
