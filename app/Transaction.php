<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'wallet_id',
        'amount',
        'transaction_type_id',
    ];

    /**
     * A transaction belongs to a wallet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wallet()
    {
        return $this->belongsTo(Wallet::class)->withDefault();
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }
}
