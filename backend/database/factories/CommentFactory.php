<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'post_id' => function() {
            return factory(App\Post::class)->create()->id;
        },
        'comment' => $faker->sentence(),
    ];
});