<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EntryPoint;
use Faker\Generator as Faker;

$factory->define(EntryPoint::class, function (Faker $faker) {

    return [
        'state_id' => $faker->word,
        'district_id' => $faker->word,
        'tahasil_id' => $faker->word,
        'name' => $faker->word,
        'name_marathi' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
