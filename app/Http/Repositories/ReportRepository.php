<?php

namespace App\Http\Repositories;

use App\Wallet;

class ReportRepository
{
    /**
     * Return all the wallets of a user
     *
     * @return mixed
     */
    public function index()
    {
        return auth()->user()->wallets;
    }

    /**
     * Return tranasction details of a wallet
     *
     * @param $walletId
     * @return mixed
     */
    public function show($walletId)
    {
        return Wallet::where('id', $walletId)->with('transactions.transactionType')->firstOrFail();
    }
}
