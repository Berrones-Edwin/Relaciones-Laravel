<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->sentence,
        'user_id' => rand(1,5),
        'category_id' => rand(1,4),
    ];
});
