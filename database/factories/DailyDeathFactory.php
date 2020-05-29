<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DailyDeath;
use Faker\Generator as Faker;

$factory->define(DailyDeath::class, function (Faker $faker) {

    return [
        'recorded_date' => $faker->word,
        'deaths' => $faker->word,
        'change_in_day' => $faker->word,
        'change_in_day_percent' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
