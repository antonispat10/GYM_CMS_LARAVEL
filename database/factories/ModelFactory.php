<?php

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {

    return [
        'user_id' => 4,
        'title' => $faker->sentence(7, 11),
        'body' => $faker->sentence(7, 11),
        'photo' => "images/posts/gym.jpg",
    ];
});