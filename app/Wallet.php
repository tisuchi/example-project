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

    public function walletType()
    {
        return $this->belongsTo(WalletType::class, 'type_id')->withDefault();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->latest();
    }
}
