<?php

namespace App\Http\Repositories;

use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletRepository
{
    public function store(Request $request)
    {
        return Wallet::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'type_id' => $request->type_id
        ]);
    }
}
