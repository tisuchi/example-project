<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TransactionType;
use Faker\Generator as Faker;

$factory->define(TransactionType::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'details' => $faker->sentence,
    ];
});
