<?php

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
