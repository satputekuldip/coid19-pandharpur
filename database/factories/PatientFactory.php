<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {

    return [
        'full_name' => $faker->word,
        'gender' => $faker->word,
        'age' => $faker->randomDigitNotNull,
        'mobile' => $faker->word,
        'state_id' => $faker->word,
        'state' => $faker->word,
        'district_id' => $faker->word,
        'district' => $faker->word,
        'tahasil_id' => $faker->word,
        'tahasil' => $faker->word,
        'pincode' => $faker->word,
        'current_address' => $faker->word,
        'permission_to_enter' => $faker->word,
        'have_medical_certificate' => $faker->word,
        'entry_point_id' => $faker->word,
        'entry_point' => $faker->word,
        'health_condition' => $faker->word,
        'covid_status' => $faker->word,
        'present_at_quarantine' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
