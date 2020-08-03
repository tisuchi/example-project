<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use App\Wallet;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'wallet_id' => factory(Wallet::class)->create()->id,
        'amount' => 100,
        'transaction_type_id' => factory(TransactionType::class)->create()->id,
    ];
});
