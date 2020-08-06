<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'token', 'email_verified_at', 'provider_name', 'provider_id', 'first_time_loging',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the email verification link
     *
     * @return string
     */
    public function emailVerifyLink()
    {
        return route('verify.email', $this->token);
    }

    /**
     * O2M
     * A user has many wallets
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    /**
     * Check a user has at least one wallet or not.
     * Return true if has wallet, otherwise false.
     *
     * @return bool
     */
    public function hasWallet()
    {
        $wallets = $this->wallets();

        if ($wallets->count() < 1){
            return false;
        }

        return true;
    }

    /**
     * Get the total amount from all wallets of a user.
     *
     * @return mixed
     */
    public function total()
    {
        return $this->wallets->sum('total');
    }
}
