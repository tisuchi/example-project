<?php

namespace App\Http\Repositories;

use App\Http\Services\TransactionService;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionRepository
{
    protected $transactionService;

    public function __construct()
    {
        $this->transactionService = new TransactionService();
    }

    /**
     * Store transaction data.
     *
     * @param Request $request
     * @param $walletId
     * @return string
     */
    public function store(Request $request, $walletId)
    {
        $amount = $this->transactionService->formatAmount($request->amount);

        // update wallet amount.
        $computeAmount = $this->transactionService->computedAmount($request, $walletId);

        if (!$computeAmount){
            return 'insufficient';
        }

        // Add the transaction record.
        return Transaction::create([
            'wallet_id' => $walletId,
            'amount' => $amount,
            'transaction_type_id' => $request->transaction_type_id,
        ]);
    }
}
