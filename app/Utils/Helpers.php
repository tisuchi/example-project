<?php

if(! function_exists('walletTypes')){
    function walletTypes(){
        return \App\WalletType::get();
    }
}
