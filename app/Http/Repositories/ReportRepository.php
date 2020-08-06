<?php

namespace App\Http\Repositories;

use App\Wallet;

class ReportRepository
{
    public function index()
    {
        return auth()->user()->wallets;
    }

    public function show($walletId)
    {
        return Wallet::where('id', $walletId)->with('transactions.transactionType')->first();
    }
}
