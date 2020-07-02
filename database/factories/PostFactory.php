<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
        return [
            'description' => $faker->text,
            'user_id' => random_int(1,100),
        ];
});
