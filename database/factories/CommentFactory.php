<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
        return [
            'text' => $faker->text,
            'user_id' => random_int(1,100),
        ];
});
