<?php

use App\Wallet;
use Illuminate\Support\Facades\Auth;

if(! function_exists('walletTypes')){
    function walletTypes(){
        return \App\WalletType::get();
    }
}

if(! function_exists('transationTypes')){
    function transationTypes(){
        return \App\TransactionType::get();
    }
}

if(! function_exists('isWalletOwner')){
    function isWalletOwner($wallet){
        if(Auth::user()->id != $wallet->user_id){
            abort(403);
        }

        return true;
    }
}
