<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Attendance;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {

    return [
        'patient_id' => $faker->word,
        'checked_at' => $faker->date('Y-m-d H:i:s'),
        'symptoms' => $faker->text,
        'remarks' => $faker->text,
        'complete_quarantine_days' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
