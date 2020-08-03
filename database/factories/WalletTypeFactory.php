<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WalletType;
use Faker\Generator as Faker;

$factory->define(WalletType::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'details' => $faker->sentence
    ];
});
