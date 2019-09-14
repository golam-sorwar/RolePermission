<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(15),
        'description' => $faker->text(300),
        'urlToImage' => $faker->imageUrl(350,200)
    ];
});
