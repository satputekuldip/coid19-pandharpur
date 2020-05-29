<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\QuarantinePatient;
use Faker\Generator as Faker;

$factory->define(QuarantinePatient::class, function (Faker $faker) {

    return [
        'patient_id' => $faker->word,
        'quarantine_address_id' => $faker->word,
        'covid_status' => $faker->word,
        'present_at_quarantine' => $faker->word,
        'remark' => $faker->text,
        'quarantined_at' => $faker->word,
        'known_positive_at' => $faker->word,
        'known_negative_at' => $faker->word,
        'recovered_at' => $faker->word,
        'died_at' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
