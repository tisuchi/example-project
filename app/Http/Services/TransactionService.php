<?php

namespace App\Http\Services;

use App\Wallet;

class TransactionService
{
    /**
     * Return position amount, event if a negetive amount has been provided.
     *
     * @param $amount
     * @return string|string[]
     */
    public function formatAmount($amount)
    {
        return str_replace('-', '', $amount);
    }

    /**
     * Compute amount based on the top up type. It can be credit or debit.
     * Based on the type, this method will  call the respective method.
     *
     * @param $data
     * @param $walletId
     * @return mixed
     */
    public function computedAmount($data, $walletId)
    {
        $type = $this->getTransactionType($data);

        $methodName = $type . 'ToTotal';

        return $this->{$methodName}($walletId, $data->amount);
    }

    /**
     * Add amount to the total amount of a wallet.
     *
     * @param $walletId
     * @param $amount
     * @return int
     */
    public function addToTotal($walletId, $amount)
    {
        $wallet = $this->getWallet($walletId);

        $wallet->update([
            'total' => $wallet->total + $amount
        ]);

        return $wallet;
    }

    /**
     * Subtract amount from a wallet's total amount.
     * Will show insufficiate error if not have
     * enough amount to subtract.
     *
     * @param $walletId
     * @param $amount
     * @return int
     */
    public function subToTotal($walletId, $amount)
    {
        $wallet = $this->getWallet($walletId);

        if ($wallet->total >= $amount){
            $wallet->update([
                'total' => $wallet->total - $amount
            ]);

            return $wallet;
        }

        return 0;
    }

    /**
     * Get a specific wallet by ID.
     * Return 0 if no wallet found
     * otherwise return object.
     *
     * @param $walletId
     * @return int
     */
    public function getWallet($walletId)
    {
        $wallet = Wallet::where('id', $walletId)->first();

        if (! $wallet){
            return 0;
        }

        return $wallet;
    }

    /**
     * Based on the user's selection in the form either credit or debit
     * it retuns approprioate keyword for respective method.
     *
     * @param $data
     * @return string
     */
    public function getTransactionType($data)
    {
        if ($data->transaction_type_id == 1){
            return 'add';
        }

        return 'sub';
    }
}
