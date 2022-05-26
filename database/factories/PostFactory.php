<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// use App\User;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->words(rand(1, 5), true);
    // $title = $faker->unique()->words(rand(1, 5), true);
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'category_id' => Category::inRandomOrder()->first()->id,
        'title' => $title,
        'body' => $faker->text(rand(500, 1000)),
        'slug' => Post::generateSlug($title)
    ];
});
