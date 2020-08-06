<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'type_id',
        'total',
    ];

    /**
     * A wallet is belongsTo a walletType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function walletType()
    {
        return $this->belongsTo(WalletType::class, 'type_id')->withDefault();
    }

    /**
     * o2m
     * A wallet has many trnasactions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class)->latest();
    }
}
