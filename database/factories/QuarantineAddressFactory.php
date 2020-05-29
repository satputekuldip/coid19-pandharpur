<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\QuarantineAddress;
use Faker\Generator as Faker;

$factory->define(QuarantineAddress::class, function (Faker $faker) {

    return [
        'type' => $faker->word,
        'name' => $faker->word,
        'phone' => $faker->word,
        'state_id' => $faker->word,
        'state' => $faker->word,
        'district_id' => $faker->word,
        'district' => $faker->word,
        'tahasil_id' => $faker->word,
        'tahasil' => $faker->word,
        'address' => $faker->word,
        'pincode' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
