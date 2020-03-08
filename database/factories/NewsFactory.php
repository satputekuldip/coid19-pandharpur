<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {

    return [
        'title' => $faker->title,
        'body' => $faker->text(500),
        'featured_image' => $faker->image('public/storage/news_images',640,480),
        'video' => null,
        'link' => null,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => null
    ];
});
