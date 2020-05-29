<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Symptom;
use Faker\Generator as Faker;

$factory->define(Symptom::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'name_marathi' => $faker->word,
        'risk' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
